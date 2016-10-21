var webpack = require('webpack');
var path = require('path');

var config = {
  entry: {
    app: path.join(__dirname, 'public/src', 'app.js'),
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        include: path.join(__dirname, 'public/src'),
        loader: 'babel-loader',
        query: {
          presets: ['es2015','react']
        }
      }
    ]
  },
  output: {
    path: path.join(__dirname, 'public/js-react'),
    filename: "kiwiReact.js"
  }
};

module.exports = config;
