<?php
/* Template Name: Register
 Template Post Type: post, page
 */
?>
<?php
get_header();
?>
<form id="validation_register" name="validation_register" class="validation_register" method="post" action="" enctype="multipart/form-data">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <span style="display: none" class="success-reg">
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="success-msg"></strong>
                </div>
            </span>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Registeration here </strong></h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="first_name" errorMessage="Enter value in First name"  id="first_name" class="form-control check-valid" placeholder="First Name" tabindex="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="last_name" errorMessage="Enter value in Last name" id="last_name" class="form-control check-valid " placeholder="Last Name" tabindex="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        <input type="text" name="datepicker" errorMessage="Enter value in DOB" readonly id="datepicker"  placeholder="Enter DOB" class="form-control check-valid" tabindex="3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="email" errorMessage="Enter value in email" email-check="Please Enter valid Email" name="email" id="email" class="form-control check-valid" placeholder="Email Address" tabindex="4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                                        <input type="password" name="password" errorMessage="Enter value in Password" id="password" class="form-control check-valid" placeholder="Password" tabindex="5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                                        <input type="password" errorMessage="Enter value in Confirm Password" check-password="Password are not matching" name="password_confirmation" id="password_confirmation" class="form-control check-valid" placeholder="Confirm Password" tabindex="6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <textarea id="address" name="address" errorMessage="Enter value in Address" class="form-control check-valid" placeholder="Enter Address" tabindex="7"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input type="text" id="phno" name="phno" errorMessage="Enter value in Phone No" class="form-control check-valid" placeholder="Enter Phone No" tabindex="8"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
                                        <select name="Maritialstatus" errorMessage="Select value in Status" id="status" class="form-control check-valid" tabindex="9">
                                            <option value="">Select Maritial status</option>
                                            <option value="Married">Married</option>
                                            <option value="Single">Single</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-adjust"></i></span>
                                        <select name="gender" errorMessage="Select value in Gender" id="gender" class="form-control check-valid" tabindex="10">
                                            <option value="">Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="file btn btn-sm btn-info file-btn check-valid">
                                        Profile
                                        <input type="file" name="profile" id="file-upload"class="check-valid" errorMessage="Choose profile"/>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button" id="Newregister" name="register" class="btn btn-success">Register</button>
                            <hr style="margin-top:10px;margin-bottom:10px;">
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</form>
<?php get_footer(); ?>

