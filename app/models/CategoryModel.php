<?php

class CategoryModel extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function getCategory($table) {
        $sql = "select * from $table";
        return $this->con->select($sql);
    }

    public function categoryCheck($table, $data) {
        $sql = "select * from $table where category_name = '$data' ";
        return $this->con->select($sql);
    }

    public function categoryAdd($table, $cond) {
        return $this->con->insert($table, $cond);
    }

    public function getCategoryById($table, $id) {
        $sql = "select * from $table where id = $id ";
        return $this->con->select($sql);
    }
    
    public function categoryUpdate($table,$data,$id){
        return $this->con->update($table,$data,$id);
    }
    
    public function categoryDelete($table,$id){
        return $this->con->delete($table,$id);
    }
}
