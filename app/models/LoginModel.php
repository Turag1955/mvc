<?php

class LoginModel extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($table, $username, $password) {
        $sql = "select * from $table where name = '$username' ";
        return $this->con->select($sql);
    }

}
