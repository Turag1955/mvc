<?php

class db extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function getinfo() {
        return $this->con->select();
    }
    public function getcat($id){
        return $this->con->getcategorybyid($id);
    }
    public function insertcat($table,$data){
        return $this->con->insert($table,$data);
    }
    public function updatecat($table,$data,$cond){
        return $this->con->update($table,$data,$cond);
    }
    public function deletecat($table,$cond){
        $this->con->delete($table,$cond);
    }
}
