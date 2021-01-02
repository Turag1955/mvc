<?php

class DModel {

    protected $con = array();

    public function __construct() {
        $dsn = 'mysql:dbname=php01; host=localhost';
        $user = 'root';
        $pass = '';
        
        $this->con = new Database($dsn, $user, $pass);
    }

}
