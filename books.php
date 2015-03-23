<?php
/**
 * Created by PhpStorm.
 * User: GeniuCode Pointer
 * Date: 2/24/2015
 * Time: 11:07 PM
 */
?>
<?php include_once("language/ar.php");?>



    <div class="features_items"><!--features_items-->

        <h2 class="title text-center"><?php echo $vars['books'] ?></h2>


<center>
        <div class="form-search inline-form" dir="rtl">
            <div class="form-group">
                <input type="email" class="form-control text-center" id="search_box" placeholder="<?php echo $vars['search_title'] ?>">
            </div>
            <button class="btn btn-default" id ="search_click"><i class="fa fa-search"></i><?php echo $vars['search'] ?></button>
        </div>
</center>
        <div>&nbsp;</div>

        <div id="books_list">

        </div>




    </div><!--features_items-->
    <center>
        <div class="pagination-centered center-block">
            <ul class="pagination" id="books_paginator">

            </ul>
        </div>
    </center>




<!--Calendar-->

