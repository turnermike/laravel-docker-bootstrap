/**
 * get-browser-size.js
 *
 * A string is attached to body:after for the current screensize. These are assigned
 * via _global.scss
 * Posibilities include: phone, mobile, tablet, small-desktop, medium-desktop, large-desktop
 *
 * @return (string) windowSize
 *
 * To use:
 *
 * var getBrowserSize = require('../helpers/get-browser-size.js');
 * var size = getBrowserSize();
 *
 * Or:
 *
 * $(window).on('resize', function() {
 *   windowSize = getBrowserSize();
 *   console.log('windowSize', windowSize);
 * }).trigger('resize');
 *
 */

module.exports = function () {

  if(window.getComputedStyle){

      windowSize = window
          .getComputedStyle(document.body,':after')
          .getPropertyValue('content');
      windowSize = windowSize.replace(/["']/g,'');
  }
  return windowSize;

}