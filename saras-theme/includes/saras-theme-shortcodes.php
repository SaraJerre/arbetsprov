<?php
/* showing images using the shortcode "logo", which
loads an image from /uploads/ directory based on the input name. 
[logo] will upload the default cropped-logo.png */
function image_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'name' => 'cropped-logo',
        'align' => 'left',
        'ext' => 'png',
        'path' => '/wp-content/uploads/',
        'url' => ''
        ), $atts ) );
        $file=ABSPATH."$path$name.$ext";
        if (file_exists($file)) {
            $size=getimagesize($file);
            if ($size!==false) $size=$size[3];
            $output = "<img src='".get_option('siteurl')."$path$name.$ext' alt='$name' $size align='$align' class='align$align' />";
            if ($url) $output = "<a href='$url' title='$name'>".$output.'</a>';
            return $output;
        }
        else {
            trigger_error("'$path$name.$ext' image not found", E_USER_WARNING);
            return '';
        }
}
add_shortcode('logo','image_shortcode');