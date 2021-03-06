var Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('public/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create public/build/app.js and public/build/app.css
    .addEntry('app', './assets/js/app.js')
    .addEntry('login', './assets/js/login.js')

    // will copy assets into public folder
    /*.copyFiles({
        from: './assets/login',
        to: 'login/',
    })*/

    // allow sass/scss files to be processed
    //.enableSassLoader()
    .enableSassLoader((options) => {
        options.sourceMap = true;
        options.sassOptions = {
            outputStyle: options.outputStyle,
            sourceComments: !Encore.isProduction(),
        };
        delete options.outputStyle;
    }, {})

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
var config = Encore.getWebpackConfig();

module.exports = config