"use strict"

// load modules
const webpack = require('webpack');
const path = require('path');
const autoprefixer = require('autoprefixer');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ProgressBarPlugin = require('progress-bar-webpack-plugin');
const FixDefaultImportPlugin = require('webpack-fix-default-import-plugin');
const { getIfUtils, removeEmpty } = require('webpack-config-utils');
const pkg = require('./package.json');

// environment setup
var env = process.env.NODE_ENV;                                       // NODE_ENV variable set in package.json for each run ("scripts") command
const { ifProd, ifNotProd } = getIfUtils(env);                        // define ifProd and ifNotProd functions

// node modules to auto load, rather than use import/require in js files. called via webpack.ProvidePlugin
var jsModules = {
  $: 'jquery',
  jQuery: 'jquery',
  'window.jQuery': 'jquery',
  foundation: 'foundation-sites'
  // truncatise: 'truncatise'
}

// set image/font paths for css
var imagePath = ifProd("'../../../public/images'", "'../../../public/images'");
var fontPath = ifProd("'../../../public/fonts'", "'../../../public/fonts'");

// debug logging
console.log('\n-------------------------- Start Debug Output --------------------------');
console.log('pkg.dependencies: ', pkg.dependencies);
console.log('ifProd: ', ifProd('true', 'false'));
console.log('ifNotProd: ', ifNotProd('true', 'false'));
console.log('imagePath: ', imagePath);
console.log('fontPath: ', fontPath);
console.log('jsModules', jsModules);
console.log('__dirname', __dirname);
console.log('--------------------------- End Debug Output ---------------------------\n');

module.exports = {

  context: path.resolve(__dirname, './'),                           // base dir

  devtool: ifProd('false', 'source-map'),                           // use full source map for prod, cheap and dirty for dev

  cache: false,

  entry: {                                                          // entry points
    app: [
      '../app/resources/assets/js/app.js',
      '../app/resources/assets/scss/app.scss'
    ],
    // vendor: ['jquery', 'sticky-js']
    vendor: Object.keys(pkg.dependencies)                           // load vendor scripts from package.json dependencies
  },

  output: {
    path: path.resolve(__dirname, '../app/public/output'),                      // js output dir
    filename: '[name].js',                                          // js bundled file name
    chunkFilename: '[name]-[chunkhash].js'
  },

  resolve: {
    modules: [
      path.resolve(__dirname, './node_modules'),                    // easily resolve node modules using import
    ]
  },

  externals: {                                                      // dont bundle
    jQuery: 'jQuery',
    foundation: 'Foundation'
  },

  // ------------------------------------
  // Module
  // ------------------------------------
  module: {

    rules: removeEmpty([                                            // removeEmpty() belongs to webpack-config-utils

      // SASS/CSS
      {
        test: /\.scss$/,
        exclude: /node_modules/,
        loader: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader'
            },
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: ifProd(false, true),
                sourceComments: ifProd(false, true),
                plugins: (loader) => [
                  require('autoprefixer')(),
                ]
              }
            },
            {
              loader: 'sass-loader',
              options: {
                includePaths: [path.resolve(__dirname, '../app/resources/assets/scss')],
                sourceMap: ifProd(false, true),
                sourceComments: ifProd(false, true),
                outputStyle: ifProd('compact', 'expanded'),                             // code formating for css (compressed, expanded, nested, compact)
                data: "$image-path: " + imagePath + ";$font-path: " + fontPath + ";"      // pass variables to sass
              }
            }
          ]
        })
      },

      // FONTS (PRODUCTION)
      // Will generate new files and copy to app/public/output/fonts/
      ifProd({
        test: /\.(woff|woff2|ttf|eot|svg)$/,
        include: [path.resolve(__dirname, '../app/public/fonts')],
        exclude: /node_modules/,
        loader: 'file-loader',
        options: {
          name: 'fonts/[name].[ext]',
          limit: 100000
        }
      }),

      // FONTS (DEV)
      // Does not generate new files.
      ifNotProd({
        test: /\.(woff|woff2|ttf|eot|svg)$/,
        include: [path.resolve(__dirname, '../app/public/fonts')],
        exclude: /node_modules/,
        loader: 'url-loader'
      }),

      // IMAGES (PRODUCTION)
      ifProd({
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'images/[name].[ext]',
              limit: 100000
            }
          },
          {
            loader: 'image-webpack-loader',
            options: {
              disable: false,
              bypassOnDebug: true,
              gifsicle: {
                interlaced: false
              },
              optipng: {
                optimizationLevel: 7
              },
              pngquant: {
                quality: '65-90',
                speed: 4
              },
              mozjpeg: {
                progressive: true,
                quality: 65
              }
            }
          }
        ]
      }),

      // IMAGES (DEV)
      ifNotProd({
        test: /\.(png|svg|jpg|gif)$/,
        include: [path.resolve(__dirname, '../app/public/images')],
        exclude: /node_modules/,
        loader: 'url-loader',
        // options: {
        //   name: 'images/[name].[ext]',
        //   // limit: 100000
        // }
      }),

      // JS/ES6
      {
        test: /\.(js(x?)|es6)$/,
        exclude: [
          path.resolve(__dirname, './node-modules')
        ],
        include: [
          path.resolve(__dirname, '../app/resources/assets/js')
        ],
        use: [
          {
            loader: 'babel-loader',
            options:{
              presets: ['es2015']
            }

          }
        ]
      },

      // load laravel translation strings in js
      {
          test: /resources(\\|\/)lang.+\.(php|json)$/,
          loader: 'laravel-localization-loader',
      }

    ])

  },

  // ------------------------------------
  // Plugins
  // ------------------------------------
  plugins: removeEmpty([                                            // removeEmpty() belongs to webpack-config-utils

    ifProd(new ProgressBarPlugin()),                                        // display a progress bar during build

    // https://webpack.js.org/plugins/loader-options-plugin/
    ifProd(new webpack.LoaderOptionsPlugin({
      minimize: true,
      debug: true
    })),

    // automatically load vendor modules, rather than use require in files
    // jsModules object populated at top of file
    new webpack.ProvidePlugin(jsModules),

    // save sass to external css file, rather than embedding in <style> tag
    new ExtractTextPlugin({
      filename: 'app.css',
      allChunks: true,                                              // generate a single css file for whole bundle
    }),

    // Source Maps
    ifNotProd(new webpack.SourceMapDevToolPlugin({
      filename: '[name].js.map',
      exclude: ['vendor.js']
    })),

    // js
    ifProd(new webpack.optimize.UglifyJsPlugin({
      exclude: /node_modules/,
      uglifyOptions: {
        warnings: true
      }
    }))

  ])

};