<?php
/**
 * Created by PhpStorm.
 * User: GeniuCode Pointer
 * Date: 2/22/2015
 * Time: 8:11 PM
 */
?>


<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index.html"><img style="height: 50px; width: 50px;" src="images/home/logo.png" alt="" />Portal Keek</a>
                </div>
                <div class="btn-group pull-right">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                <?php echo $vars['ar'] ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#"><?php echo $vars['ar'] ?></a></li>
                                <li><a href="#"><?php echo $vars['en'] ?></a></li>
                            </ul>
                        </div>
<!--                    <div class="btn-group">-->
<!--                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
<!--                            DOLLAR-->
<!--                            <span class="caret"></span>-->
<!--                        </button>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a href="#">Canadian Dollar</a></li>-->
<!--                            <li><a href="#">Pound</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav" >

<!--                        <li><a href="#">Wishlist<i class="fa fa-star"></i></a></li>-->
<!--                        <li><a href="checkout.html">Checkout <i class="fa fa-crosshairs"></i></a></li>-->
<!--                        <li><a href="cart.html">Cart <i class="fa fa-shopping-cart"></i></a></li>-->

                        <li><a href="#" id="logout"><?php echo $vars['logout'] ?> <i class="fa fa-sign-out"></i></a></li>
                        <li><a href="#updateModal" id="get_my_data" role="button" data-toggle="modal"><?php echo $vars['account'] ?> <i class="fa fa-user"></i></a></li>


                    </ul>
                </div>


            </div>
        </div>
    </div>
</div><!--/header-middle-->