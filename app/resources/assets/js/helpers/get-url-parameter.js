/**
 * get-url-parameter.js
 *
 * Copied from:
 * https://stackoverflow.com/questions/19491336/get-url-parameter-jquery-or-how-to-get-query-string-values-in-js
 *
 * To use:
 *
 * var getURLParameter = require('../helpers/get-url-parameter.js');
 * var name = getURLParameter('name');
 *
 */

module.exports = function (sParam) {

    console.log('get-url-parameter.js');

    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }

};
