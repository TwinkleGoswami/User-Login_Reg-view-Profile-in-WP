<?php
/* Template Name: Display
 Template Post Type: post, page
 */
?>
<?php
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <br/><br/>
            <?php //wp_loginout();?>
            <br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        $current_user = wp_get_current_user();
                        $profileId=$current_user->_profile;
                        $post=get_post($profileId);
                        $image=$post->guid;
                        ?>
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $image;?>" class="img-circle img-responsive"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>First Name:</td>
                                    <td class="text-capital"><?php echo $current_user->first_name ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td class="text-capital"><?php echo $current_user->last_name ?></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><?php echo $current_user->_dob ?></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Email Id</td>
                                    <td><?php echo $current_user->user_email ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $current_user->_address ?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td><?php echo $current_user->_phone_no ?></td>
                                </tr>
                                <tr>
                                    <td>Maritial status</td>
                                    <td><?php echo $current_user->_maritial_status ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $current_user->_gender ?></td>
                                </tr>
                                </tbody>
                            </table>
<!--                            <a type="button" href="#userModal" data-toggle="modal" id="editUser" name="editUser" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>-->
                            <a class="btn btn-primary edit" id="editUser" name="editUser"data-key="<?php echo $current_user->ID ?>" type="button" data-toggle="modal"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a>
                        </div>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="userValidation" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <img alt="User Pic" id="userprofile" name="userprofile" data-key="<?php echo $current_user->ID ?>" class="img-square img-responsive profilemodal img-design" data-toggle="modal" data-toggle="tooltip">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="hidden" id="userid" name="userid" class="form-control"  value="">
                                    <input type="text" id="firstname" name="firstname" errorMessage="Enter value in Firstname" placeholder="Enter Firstname" class="form-control check-valid" tabindex="1">

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="lastname" name="lastname" errorMessage="Enter value in Lastname" placeholder="Enter Lastname" class="form-control check-valid" tabindex="2" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="text" id="datepicker" name="datepicker" errorMessage="Enter value in dob" placeholder="Enter dob"  readonly class="form-control check-valid" tabindex="3" >
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Email Id</label>
                                    <input type="email" id="email" name="email" errorMessage="Enter value in Email" placeholder="Enter Email" class="form-control check-valid" tabindex="4" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea id="address" name="address" errorMessage="Enter value in address" placeholder="Enter Address" class="form-control check-valid" tabindex="7"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone no:</label>
                                    <input type="text" id="phno" name="phno" errorMessage="Enter value in Phone name" placeholder="Enter Phone No" class="form-control check-valid" tabindex="8">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Maritial Status</label>
                                    <select name="status" id="status" errorMessage="Select value in status" class="form-control check-valid" tabindex="9">
                                        <option value="">Select Status</option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" errorMessage="Select value in Gender" class="form-control check-valid" tabindex="10">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" id="updateEmp" name="update" class="btn btn-success">Update</button>
                    </div>
            </div>
        </div>
    </div>
    <div id="profileModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Choose Profile
                </div>
                <div class="modal-body">
                    <form class="userValidation" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <div class="file btn btn-sm btn-info file-btn">
                                        Choose Profile
                                        <input type="file" name="profile" id="file-upload"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updateuser" name="updateProfile" class="btn btn-primary btn-sm">Ok</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
