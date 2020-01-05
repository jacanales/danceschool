var Encore = require('@symfony/webpack-encore');

Encore
// the project directory where all compiled assets will be stored
    .setOutputPath('public/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create public/build/app.js and public/build/app.css
    .addEntry('app', './assets/js/app.js')
    .addEntry('login', './assets/js/login.js')

    // will copy assets into public folder
    .copyFiles({
        from: './assets/login',
        to: 'public/login/',
    })
    .copy

    // allow sass/scss files to be processed
    .enableSassLoader()

    // allow legacy applications to use $/jQuery as a global variable
    //.autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()
    .enableSingleRuntimeChunk()

// create hashed filenames (e.g. app.abc123.css)
// .enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();