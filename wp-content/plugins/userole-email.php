<?php
/**
 * @version 0.1
 */
/*
 Plugin Name: User Role Change Emailer
 Plugin URI: https://gamecorner.ddns.net
 Description: A plugin made to email users when their role is changed. THis currently only supports a change to the role (machine name) pagemod
*/

function user_role_update( $user_id, $new_role ) {
    if ($new_role == 'pagemod') {
        $site_url = get_bloginfo('wpurl');
        $user_info = get_userdata( $user_id );
        $to = $user_info->user_email;
        $subject = "Role changed: ".$site_url."";
        $message = "Hello " .$user_info->display_name . ", your role has changed on ".$site_url.", congratulations you are now a(n) " . $new_role . "! please go see some instructions at: https://gamecorner.ddns.net/forums/topic/page-moderators-read/";
        wp_mail($to, $subject, $message);
    }
}
add_action( 'set_user_role', 'user_role_update', 10, 2);
