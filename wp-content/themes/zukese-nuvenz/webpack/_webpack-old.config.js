
const fs = require('fs');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require("webpack");
const LiveReloadPlugin = require('webpack-livereload-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const globals = require('./src/globals');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");


module.exports = { 
    devServer: {
        hot: false,
        compress: true,
        port: 8080,
        publicPath: 'http://localhost:8080/',
        clientLogLevel: 'none',
        contentBase: (__dirname, './'),
        watchContentBase: true,
        watchOptions: {
            aggregateTimeout: 30,
            poll: 100
        }
    },
    devtool: "source-map", // any "source-map"-like devtool is possible
    module: {
        rules: [
            { test: /\.jpg$/, use: [ "file-loader" ] },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader"
                }
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'style-loader', // inject CSS to page
                    },
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            // you can specify a publicPath here
                            // by default it use publicPath in webpackOptions.output
                            // publicPath: '../'
                        }
                    },
                    {
                        loader: 'css-loader', // translates CSS into CommonJS modules
                    },
                    {
                        loader: 'postcss-loader', // Run post css actions
                        options: {
                            plugins: function () { // post css plugins, can be exported to postcss.config.js
                                return [
                                    require('precss'),
                                    require('autoprefixer')
                                ];
                            }
                        }
                    },
                    {
                        loader: 'sass-loader' // compiles Sass to CSS
                    }
                ]
            },
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader']
                })
            },
            {
                test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                include: '/node_modules',
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'assets/fonts/', // where the fonts will go
                        publicPath: '../' // override the default path
                    }
                }]
            },
            { 
                test: /\.(html|svg)$/,
                include: path.join(__dirname, 'src'),
                use: [
                    {
                        loader: 'handlebars-loader',
                    },
                ]
            },
            {
                test: /\.(png|jpg|gif|svg)$/,
                loader: 'url-loader?limit=8192',
                include: '/src/assets/images',
                options: {
                    // name: '[name].[ext]?[hash]'
                }
            }
            
        ]
    },
    plugins: [].concat(
        new webpack.LoaderOptionsPlugin({
            options: {
                handlebarsLoader: {}
            }
        }),
        // Index
        new HtmlWebpackPlugin({
            template: path.resolve(__dirname, './src/index.html'),
            inject: true,
            filename: './index.html',
            page: require(`./src/pages/home/home.page.data`),
            globals: globals,
            // hash: false,
        }),
        // Todas as páginas
        fs.readdirSync(path.resolve(__dirname, './src/pages')).map( (page) => {
            const pageDir = path.resolve(__dirname, `./src/pages/${page}`);
            let jsonData = {};
            try {
                jsonData = require(`${pageDir}/${page}.page.data`);
            } catch (error) {
                jsonData = {};                
            }

            jsonData = Object.assign({}, {
                'title': page
            }, jsonData);

            return new HtmlWebpackPlugin({
                template: `${pageDir}/${page}.page.html`,
                inject: true,
                page: jsonData,
                globals: globals,
                filename: './' + page + '.page.html',
                // hash: false,
            });
        }),
        [
            new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery"
            }),
            new LiveReloadPlugin({
                appendScriptTag: true,
            }),
            new MiniCssExtractPlugin({
                // Options similar to the same options in webpackOptions.output
                // both options are optional
                filename: "./styles.css",
                chunkFilename: "./style.css"
            }),
            new CopyWebpackPlugin([{
                from: 'src/assets',
                to: 'assets'
            }]),
            // Make sure that the plugin is after any plugins that add images
            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i,
                disable: process.env.NODE_ENV !== 'production', // Disable during development
                pngquant: {
                    quality: '95-100'
                }
            })
        ]
    )
};