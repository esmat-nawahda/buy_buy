/**
 * Created by GeniuCode Pointer on 2/24/2015.
 */
//    When a href clicked
$('a').click(function(e){

    var href = this.href;  // get href from link
    e.preventDefault();  // don't follow the link
    //alert(href);
    document.location = href;  // redirect browser to link

});


///Modules
var homeModule = {
    goHome: function() {
        $('#main_container').load('views/body.php').show();
        $('#main_slider').show();
    }
};

var categoriesModule = {
    fetch: function() {
        $('#main_container').load('books.php?id=' + this.id).show();
        $('#main_slider').hide();
    },
    fetchAll: function() {
        $('#main_container').load('.php').show();
        $('#main_slider').hide();
    }
};


