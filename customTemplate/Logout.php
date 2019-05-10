<?php
/* Template Name: Logout
 Template Post Type: post, page
 */
?>
<?php
wp_logout();
wp_redirect(home_url());
?>

