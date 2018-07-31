/**
 * main.js
 *
 */


// import modules
import { foundation } from './lib/foundation-config.js';    // individual foundation scripts can be loaded here

// initialize foundation
$(document).foundation();

// get locale
var locale = $('html').attr('lang');

// custom modue example
var customModuleExample = require('./modules/custom-module.js');
customModuleExample('dudeski!!!');

// basic debugging helper
var initDebugging = require('./modules/debugging.js');
initDebugging();

// search/autocomplete scripts
var initAutocomplete = require('./modules/auto-complete.js');
initAutocomplete(locale);








// exports example
var exportsExample = require('./modules/exports-example.js');

