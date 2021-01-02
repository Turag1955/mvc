<?php

class index extends dController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // $this->paginetion();
        $this->home();
    }

    public function home($start = null) {
        $data = array();
        $this->load->view('header');

        $objcat = $this->load->getmodal('CategoryModel');
        $data['category'] = $objcat->getCategory('category');
        $this->load->view('search', $data);
        $this->load->view('slider');
        $postmodel = $this->load->getmodal('PostModel');
        $data['count'] = $postmodel->getPost('', '');

        $per_page = 5;
        $data['current_page'] = 0;
        if ($start != null) {
            if ($start <= 0) {
                $start = 0;
                $data['current_page'] = 1;
            }
            $data['current_page'] = $start;
            $start--;
            $start = $start * $per_page;
        } else {
            $start = 0;
        }
        $totalRecord = count($data['count']);
        $data['pagi'] = ceil($totalRecord / $per_page);
        $data['content'] = $postmodel->getPost($start, $per_page);
        $this->load->view('content', $data);
        $this->load->view('pagination', $data);

        $data['latestpost'] = $postmodel->latestpost('post');
        $this->load->view('aside', $data);
        $this->load->view('footer');
    }

    public function paginetion() {
        /*
          $per_page = 5;
          $postmodel = $this->load->getmodal('PostModel');
          $getPost = $postmodel->getPost();
          $totalRecord = count($getPost);
          $pagi = ceil($totalRecord / $per_page);
          return $pagi;
         * 
         */
    }

    public function postDetails($id) {
        $data = array();
        $this->load->view('header');

        $objcat = $this->load->getmodal('CategoryModel');
        $data['category'] = $objcat->getCategory('category');
        $this->load->view('search', $data);

        $postmodel = $this->load->getmodal('PostModel');
        $data['postdetails'] = $postmodel->getByIdPost('post', 'category', $id);
        $this->load->view('post', $data);

        $data['relatedpost'] = $postmodel->relatedPost('post', $data['postdetails'][0]['category_id']);
        $this->load->view('relatedpost', $data);

        $data['latestpost'] = $postmodel->latestpost('post');
        $this->load->view('aside', $data);
        $this->load->view('footer');
    }

    public function catbypost($id) {

        $id = urldecode(unserialize($id));
        $ex = explode(',', $id);
        if (isset($ex[0])) {
            $id = $ex[0];
        }
        if (isset($ex[1])) {
            $start = $ex[1];
        } else {
            $start = null;
        }

        $data = array();
        $this->load->view('header');

        $objcat = $this->load->getmodal('CategoryModel');
        $data['category'] = $objcat->getCategory('category');
        $this->load->view('search', $data);

        $postmodel = $this->load->getmodal('PostModel');
        $data['catpost'] = $postmodel->getByCatPost('post', 'category', $id, '', '');


        $data['count'] = count($data['catpost']);

        $per_page = 5;
        $data['current_page'] = 0;
        $data['category_id'] = $id;
        if ($start != null) {
            if ($start <= 0) {
                $start = 0;
                $data['current_page'] = 1;
            }
            $data['current_page'] = $start;
            $start--;
            $start = $start * $per_page;
        } else {
            $start = 0;
        }
        $totalRecord = $data['count'];
        $data['pagi'] = ceil($totalRecord / $per_page);
        $data['catpost'] = $postmodel->getByCatPost('post', 'category', $id, $start, $per_page);
        $this->load->view('category', $data);
        $this->load->view('paginationCat', $data);

        $data['latestpost'] = $postmodel->latestpost('post');
        $this->load->view('aside', $data);
        $this->load->view('footer');
    }

    public function search() {
        $keyword = $_POST['keyword'];
        $category = $_POST['category'];
        $data = array();
        $this->load->view('header');

        $objcat = $this->load->getmodal('CategoryModel');
        $data['category'] = $objcat->getCategory('category');
        $this->load->view('search', $data);


        $postmodel = $this->load->getmodal('PostModel');
        $data['search'] = $postmodel->getSearch('post', $keyword, $category);
        $this->load->view('result', $data);

        $data['latestpost'] = $postmodel->latestpost('post');
        $this->load->view('aside', $data);
        $this->load->view('footer');
    }

    public function about() {
        $this->load->view('header');
        $objcat = $this->load->getmodal('CategoryModel');
        $data['category'] = $objcat->getCategory('category');
        $this->load->view('search', $data);
        $this->load->view('about');
        $postmodel = $this->load->getmodal('PostModel');
        $data['latestpost'] = $postmodel->latestpost('post');
        $this->load->view('aside', $data);
        $this->load->view('footer');
    }

    public function contact() {
        $this->load->view('header');
        $objcat = $this->load->getmodal('CategoryModel');
        $data['category'] = $objcat->getCategory('category');
        $this->load->view('search', $data);
        $this->load->view('contact');
        $postmodel = $this->load->getmodal('PostModel');
        $data['latestpost'] = $postmodel->latestpost('post');
        $this->load->view('aside', $data);
        $this->load->view('footer');
    }
    

}
