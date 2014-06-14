/**
 * Returns an array of elements with the given IDs
 */
function getIds() {
    var r = [],
        i = 0;

    for ( ; i < arguments.length; i++ ) {
        r.push( document.getElementById( arguments[i] ) );
    }
    return r;
}