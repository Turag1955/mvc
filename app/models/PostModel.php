<?php

class PostModel extends DModel {

    public function __construct() {
        parent::__construct();
    }

    public function getPost($start = '',$limit = '') {
        $sql = "select * from post";
        if ($limit != '') {
            $sql.= " limit $start,$limit ";
        }
        //echo $sql;
       return $this->con->select($sql);
    }

    public function getByIdPost($post, $category, $id) {
        $sql = "select $post.*,$category.category_name from  $post inner join $category on $post.category_id = $category.id where $post.id = $id ";
        return $this->con->select($sql);
    }

    public function relatedPost($table, $id) {
        $sql = "select * from post where category_id =$id limit 5";
        return $this->con->select($sql);
    }

    public function getByCatPost($post, $category, $id,$start,$limit='') {
        $sql = "select $post.*,$category.category_name from  $post inner join $category on $post.category_id = $category.id where $post.category_id = $id ";
         if($limit != ''){
             $sql.= " limit $start,$limit ";
         }         
        // echo $sql;
        return $this->con->select($sql);
    }

    public function latestpost($table) {
        $sql = "select * from $table order by id desc limit 4 ";
        return $this->con->select($sql);
    }

    public function getSearch($table, $keyword, $category) {
        if (empty($keyword) && empty($category)) {
            header("location: http://localhost/mvc/");
        }
        if (isset($keyword) && $keyword != '') {
            $sql = "select * from $table where title like '%$keyword%' or body like '%$keyword%' order by id desc";
        } elseif (isset($category) && $category != '') {
            $sql = "select * from $table where category_id = $category order by id desc";
        }
        return $this->con->select($sql);
    }

    public function insertPost($table, $condition) {
        return $this->con->insert($table, $condition);
    }

    public function postDelete($table, $id) {
        return $this->con->delete($table, $id);
    }

    public function postUpdate($table, $condition, $id) {
        return $this->con->update($table, $condition, $id);
    }

}
