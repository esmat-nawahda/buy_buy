<?php
/**
 * Created by PhpStorm.
 * User: GeniuCode Pointer
 * Date: 2/22/2015
 * Time: 8:11 PM
 */
?>
<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-right">
                    <ul  class="nav navbar-nav collapse navbar-collapse text-center ">
                        <li><a href="#/" class="active"><i class="fa fa-home"></i> <?php echo $vars['home'] ?></a></li>
                        <li class="dropdown"><a href="#"><i class="fa fa-table"></i> <?php echo $vars['view'] ?><i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="shop.html"><?php echo $vars['ads']?></a></li>
                                <li><a href="product-details.html"><?php echo $vars['seniors']?></a></li>
                                <li><a href="checkout.html"><?php echo $vars['courses']?></a></li>
                                <li><a href="cart.html"><?php echo $vars['exams']?></a></li>
                                <li><a href="login.html"><?php echo $vars['study_plan']?></a></li>
                                <li><a href="login.html"><?php echo $vars['activities']?></a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#/books/" id="books"><i class="fa fa-download"></i> <?php echo $vars['download_books']?></a>

                        </li>
                        <li><a href="404.html"><i class="fa fa-list-alt"></i> <?php echo $vars['contact_inst'] ?></a></li>
                        <li><a href="#"  id="logout"><i class="fa fa-sign-out"></i> <?php echo $vars['logout'] ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <input type="text" placeholder="<?php echo $vars['search']?>"/>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->