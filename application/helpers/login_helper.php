<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_connected')) {
    function is_connected()
    {
        $CI = get_instance();
        return $CI->session->has_userdata('user');
    }
}

if (!function_exists('not_connected_redirect')) {
    function not_connected_redirect()
    {
        if(!is_connected()){
            redirect(['user', 'login']);
        }
    }
}
