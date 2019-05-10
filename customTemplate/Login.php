<?php
/* Template Name: Login
 Template Post Type: post, page
 */
?>
<?php
get_header();
?>
<form id="login_form" name="login_form" class="validation_login" method="post" action="">
    <div class="container loginform">
        <div class="col-md-5 col-md-offset-1">
            <span style="display: none" id="unsuccess-msg">
                 <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong class="error-msg"></strong>
                 </div>
            </span>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Login</strong></h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" errorMessage="Enter value in username" name="firstname" id="firstname" class="form-control check-valid" placeholder="Enter Username" tabindex="4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                                        <input type="password" name="password" errorMessage="Enter value in Password" id="password" class="form-control check-valid" placeholder="Password" tabindex="5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="button" id="login" name="login" class="btn btn-primary">Login</button>
                                <hr style="margin-top:10px;margin-bottom:10px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</form>
<?php get_footer(); ?>

