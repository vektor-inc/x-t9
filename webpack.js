module.exports = {
  mode: 'production',
  devtool: false,
  entry: {
    main: './assets/_js/_master.js',
    'editor-layout': './assets/_js/_editor-layout.js',
  },
  output: {
      path: __dirname + '/assets/js',
      filename: '[name].js',
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
