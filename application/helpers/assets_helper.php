<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
    function asset_url($asset = '')
    {
        return base_url('assets/' . $asset);
    }
}

if (!function_exists('css_url()')) {
    function css_url($css = '')
    {
        return asset_url('css/' . $css);
    }
}
