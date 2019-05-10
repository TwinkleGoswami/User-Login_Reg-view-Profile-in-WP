<?php
function wpdocs_theme_name_scripts()
{
    wp_enqueue_style('customStyle', get_template_directory_uri() . '/assets/css/customStyle.css');
//    wp_enqueue_style('bootstrap.min', get_template_directory_uri() .'/assets/css/bootstrap.min.css');
    wp_enqueue_style('boot.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css');
    wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/assets/css/jquery-ui.css');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.4.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'customJs', get_template_directory_uri() . '/assets/js/customJs.js');
    wp_enqueue_script( 'validationJs', get_template_directory_uri() . '/assets/js/validation.js');
//    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.js');
    //call ajax
    wp_localize_script( 'customJs', 'frontend_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'redirecturl' => get_home_url()
        )
    );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts');
function add_register()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $address = $_POST['address'];
    $phno = $_POST['phno'];
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $profile = $_FILES['file']['name'];
    if ( !username_exists( $firstname ) && !email_exists($email))
    {
        $user_id = wp_create_user( $firstname, $password, $email );
        if( !is_wp_error($user_id) )
        {
            //user has been created

            $user = new WP_User( $user_id );
            $user->remove_role( 'subscriber' );
            $user->add_role( 'Guest' );

            update_user_meta($user_id,"first_name",$firstname);
            update_user_meta($user_id,"last_name",$lastname);
            update_user_meta($user_id,"_dob",$dob);
            update_user_meta($user_id,"_confirm_password",$cpassword);
            update_user_meta($user_id,"_address",$address);
            update_user_meta($user_id,"_phone_no",$phno);
            update_user_meta($user_id,"_maritial_status",$status);
            update_user_meta($user_id,"_gender",$gender);
            if(isset($_FILES['file']['name'])){
                $imageid=media_handle_upload('file',0);
                update_user_meta($user_id, "_profile", $imageid);
            }
            else{
                update_user_meta($user_id, "_profile", "");
            }
            echo "Registration successfull !...";
            exit;
        }
        else
        {
            echo "Error in Registration";
        }
    }
    wp_die();
}
function add_login()
{

    $firstname=$_POST['firstname'];
    $password=$_POST['password'];
    $info = array();
    $info['user_login'] = $firstname;
    $info['user_password'] = $password;
    $user_signon = wp_signon( $info, false );

    if ( is_wp_error($user_signon) )
    {
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    }
    else
    {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));

    }
    wp_die();
}
function fetchUserData(){
    $userId = $_POST['userId'];
    $userRecord=get_userdata($userId);
    $profileId = $userRecord->_profile;
    $post=get_post($profileId);
    $allData="";
    $allData = array(
        "UserId"    =>$userRecord->ID,
        "first_name" => $userRecord->first_name,
        "last_name"  => $userRecord->last_name,
        "_dob"  => $userRecord->_dob,
        "user_email"  => $userRecord->user_email,
        "_address" => $userRecord->_address,
        "_phone_no" => $userRecord->_phone_no,
        "_maritial_status" => $userRecord->_maritial_status,
        "_gender" => $userRecord->_gender,
        "_profile" => $post->guid
    );
    echo json_encode($allData);
wp_die();
}
function update_register_user(){
    $userid = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phno = $_POST['phno'];
    $status = $_POST['status'];
    $gender = $_POST['gender'];
//    $profile = $_FILES['file']['name'];
    wp_update_user( array(
        'ID' => $userid,
        'first_name' => $firstname,
        'last_name' => $lastname,
        'user_email' => $email,
    ));
    update_user_meta($userid,"_dob",$dob);
    update_user_meta($userid,"_address",$address);
    update_user_meta($userid,"_phone_no",$phno);
    update_user_meta($userid,"_maritial_status",$status);
    update_user_meta($userid,"_gender",$gender);
    echo "Record updated successfully";
    wp_die();
}
function upload_profile(){
    $userid=$_POST['userid'];
    $profile = $_FILES['profile']['name'];
    if(isset($_FILES['profile']['name'])){
        $imageid=media_handle_upload('profile',0);
        $res=update_user_meta($userid,"_profile",$imageid);
        echo "Profile uploaded successfully";
    }
    else{
        update_user_meta($userid,"_profile","");
        echo "Fail to upload";
    }
    wp_die();
}
// Display menu after login or logout
function my_wp_nav_menu($arg = ''){
    if(is_user_logged_in()){
        $arg['menu'] = 'Login menu';
    }
    else
    {
        $arg['menu'] = 'Top Menu';
    }
    return $arg;
}
add_filter('wp_nav_menu_args','my_wp_nav_menu');
// call register function
add_action( 'wp_ajax_nopriv_add_register', 'add_register' );//Front end
add_action( 'wp_ajax_add_register', 'add_register' );

// call login function
add_action( 'wp_ajax_nopriv_add_login', 'add_login' );//Front end
add_action( 'wp_ajax_add_login', 'add_login' );

//fetch edit data in modal function
add_action( 'wp_ajax_nopriv_fetchUserData', 'fetchUserData' );//Front end
add_action( 'wp_ajax_fetchUserData', 'fetchUserData' );

//update register user function
add_action( 'wp_ajax_nopriv_update_register_user', 'update_register_user' );//Front end
add_action( 'wp_ajax_update_register_user', 'update_register_user' );

//upload profile of user function
add_action( 'wp_ajax_nopriv_upload_profile', 'upload_profile' );//Front end
add_action( 'wp_ajax_upload_profile', 'upload_profile' );


//Display none admin panel in user side
add_filter('show_admin_bar','__return_false');

// Remove wp-admin dashboard panel in user side
//function user_no_admin_access()
//{
//    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
//    if (current_user_can( 'Guest' ))
//
//        exit(wp_redirect( $redirect ));
//}
//add_action( 'admin_init', 'user_no_admin_access', 100 );

//Display user avtar images
add_filter('get_avatar', 'user_gravatar_filter', 10, 5);
function user_gravatar_filter($avatar, $id , $size, $default, $alt) {
    if(get_user_meta( $id , '_profile', true ) != "")
    {
        $user_profile_image = get_user_meta($id, '_profile');
        $user_latest_profile_pic = max($user_profile_image);
        $allpost=get_post($user_latest_profile_pic);
        return "<img src='$allpost->guid' style='width:30px; height: 30px'/>";
    }else
    {
         return $avatar;
    }
}
?>