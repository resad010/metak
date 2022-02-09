<?php

if (! function_exists('env')) {
    function env($key, $default = null) {
        // ...
    }
}

if (! function_exists('view')) {
    function view($view,$data = []) {
        foreach ($data as $key => $value){
            ${$key} = $value;
        }
        include __DIR__."/../../resources/views/$view.php";
    }
}

if (! function_exists('request')) {
    function request($key) {
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        return null;
    }
}

if (! function_exists('files')) {
    function files($key) {
        if(isset($_FILES[$key])){
            return $_FILES[$key];
        }
        return null;
    }
}
if (! function_exists('now')) {
    function now() {
        date_default_timezone_set('Asia/Baku');
        $now = new DateTime();
        return $now->format('Y-m-d H:i:s');
    }
}

if (! function_exists('asset')) {
    function asset($name) {
    }
}