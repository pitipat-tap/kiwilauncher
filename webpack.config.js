var webpack = require('webpack');
var path = require('path');

var config = {
  entry: {
    hello: path.join(__dirname, 'src', 'hello.js'),
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        include: path.join(__dirname, 'src'),
        loader: 'babel-loader',
        query: {
          presets: ['es2015']
        }
      }
    ]
  },
  output: {
    path: path.join(__dirname, 'dist'),
    filename: "hello.js"
  }
};

module.exports = config;
