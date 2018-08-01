/**
 * Print an HTML element.
 *
 * This will open a new window and print an HTML element.
 *
 * @param {jQuery object} The element to print.
 *
 * How to use:
 *
 * Place this in the event and change the selector.
 * new PrintElement($('.your-class-name'));
 *
 */

function PrintElement($element) {

    this.element =      $element.clone();                           // clone the element so we can style
    this.elementType =  this.element.prop('nodeName');              // get the element type i.e table, div, etc.

    if(this.elementType.toLowerCase() === 'table'){
        // it's a table element

        // style the printable table
        $(this.element).css({
            'width':            '100%',
            'background':       '#eee',
            'border-collapse':  'collapse',
            'border':           '1px solid #9c9c9c',
            'text-align':       'left'
        })
        // style the headers and data rows
        $('th, td', this.element).css({
            'padding':          '4px',
            'border':           '1px solid #9c9c9c',
        });

    }

    // open new tab and print
    var newWin = window.open('');
    newWin.document.write($(this.element).prop('outerHTML'));
    newWin.print();
    newWin.close();

}

// export the module
module.exports = {
    PrintElement: PrintElement
}