<?php
/**
 * Created by PhpStorm.
 * User: GeniuCode Pointer
 * Date: 9/25/2014
 * Time: 6:47 PM
 */
?>
<!-- The container for the list of example images -->
<div id="links"></div>
<br>


<div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" dir="rtl">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2><?php echo $vars['up_account'] ?></h2>
            </div>
            <div class="modal-body">
                <div class="form col-md-12 center-block">


                    <div class="form-group" dir="rtl">
                        <label for="username_up"><?php echo $vars['username'] ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo $vars['username'] ?>" id="username_up">
                    </div>
                    <div class="form-group">
                        <label for="firstname_up"><?php echo $vars['firstname'] ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo $vars['firstname'] ?>" id="firstname_up">
                    </div>
                    <div class="form-group">
                        <label for="lastname_up"><?php echo $vars['lastname'] ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo $vars['lastname'] ?>" id="lastname_up">
                    </div>
                    <div class="form-group">
                        <label for="phone_up"><?php echo $vars['phone'] ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo $vars['phone'] ?>" id="phone_up">
                    </div>
                    <div class="form-group">
                        <label for="bod_up"><?php echo $vars['bod'] ?></label>
                        <input type="date" class="form-control" placeholder="<?php echo $vars['bod'] ?>" id="bod_up">
                    </div>
                    <div class="form-group">
                        <label for="password_up"><?php echo $vars['password'] ?></label>
                        <input type="password" class="form-control" placeholder="<?php echo $vars['password'] ?>" id="password_up">
                    </div>

                    <div class="form-group">
                        <label for="email_up"><?php echo $vars['email'] ?></label>
                        <input type="email" id="email_up" class="form-control" placeholder="<?php echo $vars['email'] ?>" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default get btn-md btn-block" id="account_up"><?php echo $vars['done'] ?></button>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo $vars['cancel'] ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

