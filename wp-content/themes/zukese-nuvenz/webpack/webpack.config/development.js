const path = require('path');
const common = require('./common');
const LiveReloadPlugin = require('webpack-livereload-plugin');


module.exports = {
  ...common,
  devtool: "source-map", // any "source-map"-like devtool is possible
  devServer: {
    contentBase: [
      path.join(__dirname, './../public')
    ],
  },
  plugins: [
    ...common.plugins,
    new LiveReloadPlugin({
      appendScriptTag: true,
    }),
  ]
}