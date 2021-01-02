<?php

class load {

    public function __construct() {
       
    }

    public function view($fileName, $data = '',$obj = '') {
        include "./app/view/$fileName.php";
    }

    public function custome($fileName) {
        include "./app/view/$fileName.php";
    }

    public function getmodal($fileName) {
        include "./app/models/$fileName.php";
        return new $fileName;
    }

    public function toolf() {
        include './system/lib/function.php';
        return new tool();
    }

}
