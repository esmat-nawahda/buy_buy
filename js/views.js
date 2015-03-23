/**
 * Created by GeniuCode Pointer on 2/25/2015.
 */


function buildCategoryItem(id,catName){
  // alert(name);

    var html='<li class="page_click';


    html=html+'" id="'+id+'" ><a href="#/categories/">'+catName+'</a></li>';

    return html;
}



