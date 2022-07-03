module.exports = {
  mode: 'production',
  devtool: false,
  entry: [
    './assets/_js/_master.js'
  ],
  output: {
      path: __dirname + '/assets/js',
      filename: 'main.js',
  },
  module: {
    // babel-loaderの設定
    rules: [
      {
        test: /\.js$/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: [
                '@babel/preset-env'
              ]
            }
          }
        ],
        exclude: /node_modules/,
      }
    ]
  },
};