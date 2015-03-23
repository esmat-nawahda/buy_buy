/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

//$(document).ready(function(){
//	$(function () {
//		$.scrollUp({
//	        scrollName: 'scrollUp', // Element ID
//	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
//	        scrollFrom: 'top', // 'top' or 'bottom'
//	        scrollSpeed: 300, // Speed back to top (ms)
//	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
//	        animation: 'fade', // Fade, slide, none
//	        animationSpeed: 200, // Animation in speed (ms)
//	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
//					//scrollTarget: false, // Set a custom target element for scrolling to the top
//	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
//	        scrollTitle: false, // Set a custom <a> title if required.
//	        scrollImg: false, // Set true to use image
//	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
//	        zIndex: 2147483647 // Z-Index for the overlay
//		});
//	});
//});


//logout from the system
$('body').on('click', '#logout', function() {
    swal({
            title: "Are you sure?",
            text: "Logout!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, logout!",
            closeOnConfirm: false },
        function(){
            var data="todo=logout";
            $.ajax({
                type: "POST",
                url: 'server/user.php',
                data: data, // appears as $_GET['id'] @ ur backend side
                success: function (data) {
                    // data is ur summary
                    //                        $('#Edit').html(data);

                    //
                    swal("Done!", "Your have been logout from your account successfully.", "success");
                    window.location="login.php";


                }
            });
        }
    );
});



//login to the system
$('body').on('click', '#login', function() {
    //alert("hh");
    var username=document.getElementById("username_log").value;
    var password=document.getElementById("password_log").value;



    if(username===""||password===""){
        swal("Error!", "Fill the boxes to continue!", "error");
    }
    else{
        var data="username="+username+"&password="+password+"&todo=login";
        //console.log(data);
        $.ajax({
            type: "POST",
            url: 'server/user.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
                var result = (data);
                console.log(data);
                //alert(data);
//                    var result = $.parseJSON(data);
                // data is ur summary
//                        $('#Edit').html(data);
                if(data!=="ERROR") {
                    swal({
                        title: "Login successfully",
                        text: "Welcome Again " + result.User_name,
                        type: "success",
                        timer: 5000
                    });
                    setTimeout(function(){window.location="index.php"},1000);
                }else{
                    swal({
                        title: "Login Failed",
                        text: "Error in username or password",
                        type: "error"
                    });
                }
            }
        });
    }
});



//get my personal information
$('body').on('click', '#get_my_data', function() {
    //alert("hh");


        var data="todo=getMyData";
        //console.log(data);
        $.ajax({
            type: "POST",
            url: 'server/user.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
                var jsonData = JSON.parse(data);
                if(data!=="ERROR") {
                    $("#username_up").val(jsonData.username);
                    $("#password_up").val(jsonData.password);
                    $("#firstname_up").val(jsonData.firstname);
                    $("#lastname_up").val(jsonData.lastname);
                    $("#email_up").val(jsonData.email);
                    $("#phone_up").val(jsonData.phone);
                    $("#bod_up").val(jsonData.bdate);

                }else{
                    swal({
                        title: "Failed",
                        text: "Can't Return Your Personal Information",
                        type: "error"
                    });
                }
            }
        });

});


//set my personal information
$('body').on('click', '#account_up', function() {
    //alert("hh");
    var username=document.getElementById("username_up").value;
    var password=document.getElementById("password_up").value;
    var firstname=document.getElementById("firstname_up").value;
    var lastname=document.getElementById("lastname_up").value;
    var email=document.getElementById("email_up").value;
    var phone=document.getElementById("phone_up").value;
    var bod=document.getElementById("bod_up").value;



    if(username===""||password===""||firstname===""||lastname===""||email===""||phone===""||bod===""){
        swal("Error!", "Fill the boxes to continue!", "error");
    }
    else{
        var data="username="+username+"&password="+password+"&firstname="+firstname+"&lastname="+lastname+"&email="+email+"&phone="+phone+"&bod="+bod+"&todo=update";
        console.log(data);
        $.ajax({
            type: "POST",
            url: 'server/user.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
                //var result = (data);
                //console.log(data);

                if(data!=="ERROR") {
                    swal({
                        title: "Updated successfully",
                        text: "SUCCESS",
                        type: "success"
                    });
                }else{
                    swal({
                        title: "Login Failed",
                        text: "ERROR",
                        type: "error"
                    });
                }
            }
        });
    }
});

//View image in gallery when clicked
$('body').on('click', '.gallery', function(e) {
    $('#galleryModal img').attr('src', $(this).attr('data-img-url'));
});



//get book info
$('body').on('click', '.book_info', function(e) {
    var id=$(this).attr('id');

    var data="id="+id+"&todo=getBookInfo";

    $.ajax({
        type: "POST",
        url: 'server/book.php',
        data: data, // appears as $_GET['id'] @ ur backend side
        success: function (data) {
            var result = JSON.parse(data);
            //console.log(result);

            $("#book_info_title").html(result.title);
            $("#info_content").html(nl2br(result.bdesc));

        }
    });

});



//get all books when paginator clicked
$('body').on('click', '.page_click', function() {

    var page=$(this).attr('id');
    var filter=$('#search_box').val();


    var data="page="+page+"&todo=getBooksByPageNumber";
    if(filter===""){
        data+="&filter="+filter;
    }
    console.log(data);
    $.ajax({
        type: "POST",
        url: 'server/book.php',
        data: data, // appears as $_GET['id'] @ ur backend side
        success: function (data) {
            var result = JSON.parse(data);
            //console.log(result);
            var total='';
            $('#books_list').html("");
            for(var i=0;i<result.length;i++){
                var id=result[i].id,title=result[i].title,bdesc=result[i].bdesc,bfile=result[i].bfile,bimg=result[i].bimg;

                var book_item=buildBookItem(id,title,bdesc,bfile,bimg);
                $('#books_list').append(book_item);

            }

            //set activation
            $('#books_paginator li').each(function(i)
            {
                var id=$(this).attr('id'); // This is your rel value
                if(id===page){
                    $(this).addClass('active');
                }
                else{
                    $(this).removeClass('active');
                }
            });

        }
    });


});



//when search button clicked
$('body').on('click', '#search_click', function() {

    var filter=$('#search_box').val();


    var data="filter="+filter+"&todo=getBooksByTitle";

    console.log(data);
    $.ajax({
        type: "POST",
        url: 'server/book.php',
        data: data, // appears as $_GET['id'] @ ur backend side
        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
            var total='';
            $('#books_list').html("");

            for(var i=0;i<result.length;i++){
                var id=result[i].id,title=result[i].title,bdesc=result[i].bdesc,bfile=result[i].bfile,bimg=result[i].bimg;

                var book_item=buildBookItem(id,title,bdesc,bfile,bimg);
                //alert(book_item);
                $('#books_list').append(book_item);

            }

        }
    });

    //get number of books
    data="todo=getBooksNumber";
    $.ajax({
        type: "POST",
        url: 'server/book.php',
        data: data, // appears as $_GET['id'] @ ur backend side
        success: function (data) {
            var result = JSON.parse(data);
            var numOfBooks=result.numOfBooks;

            var pages;
            $('#books_paginator').html("");
            if(numOfBooks%9==0) pages=numOfBooks/9;
            else pages=numOfBooks/9+1;
            pages=parseInt(pages);

            for(var i=1;i<=pages;i++){
                var paginator=buildPaginationItem(i);
                $('#books_paginator').append(paginator);
            }


        }
    });


});
//Registration to system
$('body').on('click', '#register-submit-btn', function() {
    //alert("hh");
    var username =document.getElementById("username_reg").value;
    var password=document.getElementById("password_reg").value;
    var email=document.getElementById("email_reg").value;
    var firstname=document.getElementById("firstname_reg").value;
    var lastname=document.getElementById("lastname_reg").value;
    var address=document.getElementById("address_reg").value;
    var city=document.getElementById("city_reg").value;
    var country=document.getElementById("country_reg").value;
    var phone =document.getElementById("phone_reg").value;
    if(firstname===""||lastname===""||email===""||address==="" ||city===""||country===""|| password===""||username==="" ){

        swal("Error!", "Fill the boxes to continue!", "error");
    }
    else{
        var data="firstname="+firstname+"&lastname="+lastname+"&email"+email+"&address"+address+"&city"+city+"&country"+country+"&username"+username+"&password"+password+"&todo=register";
        console.log(data);
        $.ajax({
            type: "POST",
            url: 'server/user.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
                var result = (data);
                console.log(data);
                //alert(data);
//                    var result = $.parseJSON(data);
                // data is ur summary
//                        $('#Edit').html(data);
                if(data!=="ERROR") {
                    swal({
                        title: " Addedd New User Successfully ",
                      //  text: "Welcome Again " + result.User_name,
                        type: "success",
                        timer: 5000
                    });
                   // setTimeout(function(){window.location="index.php"},5000);
                }else{
                    swal({
                        title: "Registration Fialed ",
                        text: "Error For Some Details ",
                        type: "Error"
                    });
                }
            }
        });
    }
});

// add new post to the system
$('body').on('click', '#pup_post', function() {
    //alert("hh");
    var title=document.getElementById("title_post").value;
    var content=document.getElementById("content_post").value;
    if(title==="" || content==="" ){

        swal("Error!", "Fill to continue!", "error");
    }
    else{
        var data="title_post="+title+"&content_post="+content+"&todo=addPost";
             console.log(data);
        $.ajax({
            type: "POST",
            url: 'server/post.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
                var result = (data);
                console.log(data);
                //alert(data);
//                    var result = $.parseJSON(data);
                // data is ur summary
//                        $('#Edit').html(data);
                if(data!=="ERROR") {
                    swal({
                        title: " Added Post Sucssufully !@#@ ",
                        //  text: "Welcome Again " + result.User_name,
                        type: "success",
                        timer: 5000
                    });
                    // setTimeout(function(){window.location="index.php"},5000);
                }else{
                    swal({
                        title: "There Is some Error  ",
                        text: "Error For Some Details in your post  ",
                        type: "Error"
                    });
                }
            }
        });
    }
});


// get All Posts

$('body').on('click', '#getCategories', function() {


    var data="todo=getAllCategories";
    console.log(data);
    $.ajax({
        type: "POST",
        url: 'server/post.php',
        data: data, // appears as $_GET['id'] @ ur backend side
        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
            var total='';
            $('#categories').html("");


            for(var i=0;i<result.length;i++){
                var id=result[i].categoryId,catName=result[i].catName;
              // alert(name);

                var html='<li class="page_click';

                html=html+'" id="'+id+'" class="cat_click" ><a href="#/categories/">'+catName+'</a></li>';
                var category_item=html;

               // alert(catName);
                $('#categories').append(category_item);

            }

        }
    });
});


//get book info
$('body').on('click', '.cat_click', function(e) {
    var id=$(this).attr('id');
    var page=0;
    var data="id="+id+"&page="+page+"&todo=getPostsByCatId";

    $.ajax({
        type: "POST",
        url: 'server/post.php',
        data: data, // appears as $_GET['id'] @ ur backend side
        success: function (data) {
            var result = JSON.parse(data);
            //console.log(result);
            var html="";
            for(var i=0;i<result.length;i++){
                var cat_id=result[i].id,title=result[i].title,bdesc=result[i].bdesc,bfile=result[i].bfile,bimg=result[i].bimg;

                var post_item=buildPostItem(id,title,bdesc,bfile,bimg);
                html+=post_item;

            }

            $("#main_container").html(html);

        }
    });

});




