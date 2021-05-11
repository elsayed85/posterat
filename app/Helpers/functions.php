<?php
if (!function_exists('icon_for')) {
    function icon_for($icon, $link = '#', $size = 5)
    {
        $outputs = '<a class="linkedin img-circle" href="' . $link . '"><span class="fa fa-' . trim($icon) . ' fa-' . $size . 'x "></span></a>';
        return $outputs;
    }
}
//https://lzone.de/examples/PHP%20preg_replace
if (!function_exists('body_icons')) {
    function body_icons($string, $icons = null)
    {
        if (preg_match("/(.*?)_icon:(.*?)_/i", $string)) {

            $string = preg_replace('/whatsapp_icon:(.*?)_/i', icon_for('whatsapp', "https://wa.me/$1"), $string);
            $string = preg_replace('/facebook_icon:(.*?)_/i', icon_for('facebook', "https://facebook.com/$1"), $string);
            $string = preg_replace('/phone_icon:(.*?)_/i', icon_for('phone', "tel:$1"), $string);

            //preg_match("'<p class=\"review\">(.*?)</p>'si", $source, $match);
            //if($match) echo "result=".$match[1];

            //foreach ($string as $word){
            //
            //}
            /*            $string = preg_replace("/whatsapp<.*?>)/", icon_for("whatsapp", "$0"), $string);*/
        }
        return ($string);
    }
}

if (!function_exists('get_setting')) {
    function get_setting($string, $default = NULL)
    {
        //        $site_setting = App\Models\Setting::all()->pluck('var', 'name')->toArray();
        $site_setting = cache('site_setting');

        $key = $string . '_' . app()->getLocale();
        if (isset($site_setting) && is_array($site_setting)) {
            if (array_key_exists($string, $site_setting)) {
                return $site_setting[$string];
            } elseif (isset($site_setting[$key])) {
                return  $site_setting[$key];
            }
        }
        if (!is_null($default)) {
            return $default;
        }
        $config = 'setting.' . $string;
        return config($config);
    }
}
