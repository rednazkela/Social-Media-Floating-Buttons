<?php

add_action( 'wp_head', function () {
    
// llamadas desde la pagina de config (admin)
$social_media_floating_buttons_options = get_option( 'social_media_floating_buttons_option_name' ); // Array of All Options
$enable_disable_0 = $social_media_floating_buttons_options['enable_disable_0']; // Enable/disable
$facebook_url_1 = $social_media_floating_buttons_options['facebook_url_1']; // Facebook URL
$instagram_url_2 = $social_media_floating_buttons_options['instagram_url_2']; // Instagram URL
$twitter_url_3 = $social_media_floating_buttons_options['twitter_url_3']; // Twitter URL
$linkedin_url_4 = $social_media_floating_buttons_options['linkedin_url_4']; // Linkedin URL
$youtube_url_5 = $social_media_floating_buttons_options['youtube_url_5']; // Youtube URL
$whatsapp_number_6 = $social_media_floating_buttons_options['whatsapp_number_6']; // Whatsapp Number
$whatsapp_message_optional_7 = $social_media_floating_buttons_options['whatsapp_message_optional_7']; // Whatsapp Message (optional)

// url base del plugin
$dirplugin = plugins_url('', dirname(__FILE__) );
     

// inicio del widget
if ($enable_disable_0 != yes) {
echo '';
} else{
// Estilos css
echo '
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="'.$dirplugin.'/css/style.css">';

echo '<div class="smfbuttons">';

// Facebook
if (empty($facebook_url_1)){
echo '';
}else{
echo '
<!-- Boton de facebook -->
<a href="'.$facebook_url_1.'" class="float-fb" target="_blank">
<i class="fa fa-facebook my-float"></i>
</a>';
}

// Instagram
if (empty($instagram_url_2)){
echo '';
}else{
echo '
<!-- Boton de Instagram -->
<a href="'.$instagram_url_2.'" class="float-ig" target="_blank">
<i class="fa fa-instagram my-float"></i>
</a>';
}

// Twitter
if (empty($twitter_url_3)){
echo '';
}else{
echo '
<!-- Boton de Twitter -->
<a href="'.$twitter_url_3.'" class="float-tw" target="_blank">
<i class="fa fa-twitter my-float"></i>
</a>';
}

// Linkedin
if (empty($linkedin_url_4)){
echo '';
}else{
echo '
<!-- Boton de Linkedin -->
<a href="'.$linkedin_url_4.'" class="float-ln" target="_blank">
<i class="fa fa-linkedin my-float"></i>
</a>';
}

// Youtube
if (empty($youtube_url_5)){
echo '';
}else{
echo '
<!-- Boton de Youtube -->
<a href="'.$youtube_url_5.'" class="float-yt" target="_blank">
<i class="fa fa-youtube my-float"></i>
</a>';
}

// Whatsapp
if (empty($whatsapp_number_6)){
echo '';
}else{
echo '
<!-- Boton de Whatsapp -->
<a href="'.$whatsapp_number_6.''.$whatsapp_message_optional_7.'" class="float-ws" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>';
}

echo '</div>
';
}
// final del widget
    
} );
