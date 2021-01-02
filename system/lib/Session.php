<?php

class Session {

    public static function init() {
        session_start();
    }

    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession() {
        self::init();
        if (self::get('adminlogin') == false) {
            self::Sessiondestroy();
            header("location:" . BASE_URL . "Login/Index");
        }
    }

    public static function unset($key) {
        unset($_SESSION[$key]);
    }

    public static function Sessiondestroy() {
        session_destroy();
    }

}

?>