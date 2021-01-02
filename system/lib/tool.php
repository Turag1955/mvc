<?php

//require_once './database.php';

class tool {

    public static function pr($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    public static function prx($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        die();
    }

    public static function redirect($str) {
        ?>
        <script type="text/javascript">
            window.location.href = '<?= $str ?>';
        </script>    
        <?php
    }

    public static function getSafeValue($str) {
        if ($str != '') {
            return mysqli_real_escape_string($this->conn(), $str);
        }
    }

    public static function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function dateFormate($date) {
        $strtotime = strtotime($date);
        return date('d-M-Y', $strtotime);
    }

    public static function textshort($text, $limit = 300) {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = $text . ".....";
        return $text;
    }

    public static function title() {
        $path = $_SERVER['PHP_SELF'];
        $title = basename($path, '.php');
       // $this->pr($path);
        if ($title == 'index') {
            $title = 'Home';
        } elseif ($title == 'contact') {
            $title = 'Contact';
        }
        return $title;
    }

}
?>