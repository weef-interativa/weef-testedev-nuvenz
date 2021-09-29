const path = require('path');
const webpack = require('webpack');
const stylesConfig = require('./partials/styles');
const pagesConfig = require('./partials/pages');


module.exports = {
  mode: process.env.NODE_ENV || 'development',
  entry: {
    main: [
      './src/app.js'
    ],
  },
  optimization: {
    splitChunks: {
      cacheGroups: {
        vendors: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendors',
          enforce: true,
          chunks: 'all'
        }
      }
    }
  },
  resolve: {
    alias: {
      components: path.resolve(__dirname, '../src/components'),
      pages: path.resolve(__dirname, '../src/pages'),
      assets: path.resolve(__dirname, '../public/assets'),
    }
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        use: {
          loader: "babel-loader",
        }
      },
      // {
      //   test: /\.(svg)$/,
      //   loader: 'file-loader',
      //   // include: '/public/assets/images',
      //   // options: {
      //     // name: '[name].[ext]?[hash]'
      //   // }
      // },
      ...stylesConfig.module.rules,
      ...pagesConfig.module.rules,
      {
        test: /\.(png|jpg|gif)$/,
        loader: 'url-loader?limit=8192',
        include: '/public/assets/images',
        options: {
          // name: '[name].[ext]?[hash]'
        }
      },
    ]
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery"
    }),
    ...stylesConfig.plugins,
    ...pagesConfig.plugins,
  ]
}