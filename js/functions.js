/**
 * Created by GeniuCode Pointer on 2/25/2015.
 */
function trimString(str){
    var length = 30;
    var trimmedString = str.substring(0, length)+"...";
    return trimmedString
}

function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}


