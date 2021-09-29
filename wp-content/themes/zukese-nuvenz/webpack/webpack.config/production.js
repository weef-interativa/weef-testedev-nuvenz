const path = require('path');
const common = require('./common');
const rimraf = require('rimraf');

const CopyWebpackPlugin = require('copy-webpack-plugin');

rimraf.sync('./dist');

module.exports = {
  ...common,
  output: {
    path: path.resolve('./dist'),
  },
  plugins: [
    ...common.plugins,
    new CopyWebpackPlugin([{
      from: 'public/',
      to: '.'
    }]),
  ]
};