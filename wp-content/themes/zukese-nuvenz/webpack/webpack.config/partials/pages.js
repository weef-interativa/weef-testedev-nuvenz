const HtmlWebpackPlugin = require('html-webpack-plugin');
const fs = require('fs');
const path = require('path');
const globals = require('../../src/globals');
const webpack = require('webpack');

const indexPage = 'home';
const basicPlugins = [
  new webpack.LoaderOptionsPlugin({
      options: {
        handlebarsLoader: {
          inlineRequires: false,
          knownHelpers: {

          }
        }
      }
    }),
    // Index
    new HtmlWebpackPlugin({
      template: path.resolve(__dirname, '../../src/index.html'),
      inject: true,
      filename: 'index.html',
      page: require(`../../src/pages/${indexPage}/${indexPage}.page.data`),
      globals: globals,
      // hash: false,
    }),
];

function pluginByPagePathArray(pagePath, index) {
  const page = pagePath.shift();
  const pageDir = path.resolve(__dirname, `../../src/pages/${page}`);
  const pagePathStr = pagePath.join('.');

  let jsonData = {};
  try {
    jsonData = require(`${pageDir}/${page}.${pagePathStr}.data`);
  } catch (error) {
    jsonData = {};
  }

  jsonData = Object.assign({}, {
    'title': page
  }, jsonData);

  let outputFilePath = `${page}${ index ? '': `/${pagePathStr.replace(/\./gim, '/')}`}/index.html`;
  outputFilePath = `${page + (index ? '' : '.')}${pagePathStr.replace('page', '')}.html`;

  let pluginSettings = {
    template: `${pageDir}/${page}.${pagePathStr}.html`,
    // inject: true,
    page: jsonData,
    globals: globals,
    filename: outputFilePath,
  };
  return new HtmlWebpackPlugin(pluginSettings);
}

let mainPages = fs.readdirSync(path.resolve(__dirname, '../../src/pages'));
let pagesPlugins = mainPages
  .filter((page) => globals.pages.indexOf(page) > -1)
  .reduce((acc, page) => {
    const pageDir = path.resolve(__dirname, `../../src/pages/${page}`);
    const subPages = fs.readdirSync(pageDir)
      .filter( file => file.match(/(\.html)$/))
      .map(file => {
        let subPage = file.replace(`${page}.`, '').replace('.html', '');
        let subPagePath = [page, ...subPage.split('.')];
        return pluginByPagePathArray(subPagePath, subPage === 'page');
      });

    return [
      ...acc,
      ...subPages
    ];
  }, []);

// console.log( pagesPlugins );

// process.exit();
module.exports = {
  module: {
    rules: [
      {
        test: /\.(html)$/,
        use: [
          {
            loader: 'handlebars-loader', 
          }
        ]
      }, 
    ]
  },
  plugins: [
    ...basicPlugins,
    ...pagesPlugins
  ]
}