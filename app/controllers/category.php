<?php

class category extends dController {

    public function __construct() {
        parent::__construct();
    }

    public function getcategoryid() {
        $db = $this->load->getmodal('db');
        $id = 1;
        $data = $db->getcat($id);
        $this->load->view('category', $data);
    }

    public function insertcat() {
        $table = 'title';
        $data = ['title' => 'hello', 'subtitle' => 'hello'];
        $db = $this->load->getmodal('db');
        $insert = $db->insertcat($table, $data);
    }

    public function categoryaddpage() {
        $this->load->view('category');
    }

    public function userinsert() {
        $table = 'title';
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $data = ['title' => $title, 'subtitle' => $subtitle];
        $db = $this->load->getmodal('db');
        $insert = $db->insertcat($table, $data);
        //  $msg = [];
        if ($insert == 1) {
            $msg = 'data insert success';
        } else {
            $msg = 'data insert unsuccess';
        }
        $this->load->view('category', $msg);
    }

    public function userupdate() {
        $table = 'title';
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $id = $_POST['id'];
        $data = ['title' => $title, 'subtitle' => $subtitle];
        $cond = 'id = ' . $id;
        $db = $this->load->getmodal('db');
        $res = $db->updatecat($table, $data, $cond);
        if ($res == 1) {
            $msg = 'data update success';
        } else {
            $msg = 'data update unsuccess';
        }
        echo $msg;
       
    }

    public function userdelete() {
        $table = 'title';
        $cond = 'id = 13';
        $db = $this->load->getmodal('db');
        $db->deletecat($table, $cond);
    }

    public function updatecat() {
        $db = $this->load->getmodal('db');
        $id = 1;
        $res = $db->getcat($id);
        $this->load->view('updatecat', $res);
    }

}
