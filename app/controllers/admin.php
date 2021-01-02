<?php

class admin extends dController {

    public function __construct() {
        parent::__construct();
        Session::checkSession();
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function categorylist() {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $CategoryModel = $this->load->getmodal('CategoryModel');
        $data['categorylist'] = $CategoryModel->getCategory('category');
        $this->load->view('admin/catlist', $data);
        $this->load->view('admin/footer');
    }

    public function addcategoryshow() {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $this->load->view('admin/addcat');
        $this->load->view('admin/footer');
    }

    public function categoryadd() {
        if (isset($_POST['submit'])) {

            $category = $_POST['category'];
            $cond = ['category_name' => $category];
            $this->load->view('admin/header');
            $this->load->view('admin/aside');

            $CategoryModel = $this->load->getmodal('CategoryModel');
            $data['categorycheck'] = $CategoryModel->categoryCheck('category', $category);
            if (empty($data['categorycheck'])) {
                $data['categoryadd'] = $CategoryModel->categoryAdd('category', $cond);
                $data['catsucces'] = 'Category Add Successfully';
                $path = BASE_URL . "admin/categorylist&&msg=" . urlencode(serialize($data['catsucces']));
                // echo $path;
                tool::redirect($path);
            } else {
                $data['caterror'] = 'Category All Ready Exist';
                $this->load->view('admin/addcat', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function updatecategoryshow($id = null) {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $CategoryModel = $this->load->getmodal('CategoryModel');
        $data['getCategoryById'] = $CategoryModel->getCategoryById('category', $id);
        $this->load->view('admin/updatecat', $data);
        $this->load->view('admin/footer');
    }

    public function updatecategory() {
        if (isset($_POST['submit'])) {

            $category = $_POST['category'];
            $id = $_POST['id'];
            $catId = 'id=' . $id;
            $cond = ['category_name' => $category];
            $this->load->view('admin/header');
            $this->load->view('admin/aside');

            $CategoryModel = $this->load->getmodal('CategoryModel');
            $data['categorycheck'] = $CategoryModel->categoryCheck('category', $category);
            if (empty($data['categorycheck'])) {
                $data['categoryupdate'] = $CategoryModel->categoryUpdate('category', $cond, $catId);
                if ($data['categoryupdate'] == 1) {
                    $data['catsucces'] = 'Category Update Successfully';
                    $path = BASE_URL . "admin/categorylist&&msg=" . urlencode(serialize($data['catsucces']));
                    tool::redirect($path);
                }
            } else {
                $data['caterror'] = 'Category All Ready Exist';
                $this->load->view('admin/updatecat', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function deletecategory($id = null) {
        $CategoryModel = $this->load->getmodal('CategoryModel');
        $data['categorydelete'] = $CategoryModel->categoryDelete('category', $id);
        $data['catsucces'] = 'Category Delete Successfully';
        $path = BASE_URL . "admin/categorylist&&msg=" . urlencode(serialize($data['catsucces']));
        tool::redirect($path);
    }

    public function postlistshow() {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $CategoryModel = $this->load->getmodal('CategoryModel');
        $data['categorylist'] = $CategoryModel->getCategory('category');
        $PostModel = $this->load->getmodal('PostModel');
        $data['getpost'] = $PostModel->getPost();
        $this->load->view('admin/postlist', $data);
        $this->load->view('admin/footer');
    }

    public function addpostshow() {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $CategoryModel = $this->load->getmodal('CategoryModel');
        $data['categorylist'] = $CategoryModel->getCategory('category');
        $this->load->view('admin/addpost', $data);
        $this->load->view('admin/footer');
    }

    public function addpost() {
        // print_r($_POST);
        $data = [];
        $title = tool::validation($_POST['title']);
        $category_id = tool::validation($_POST['category_id']);
        $author = tool::validation($_POST['author']);
        $tags = tool::validation($_POST['tags']);
        $body = tool::validation($_POST['body']);

        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageSize = $image['size'];
        $imageTmpname = $image['tmp_name'];

        $explode = explode('.', $imageName);
        $end = strtolower(end($explode));
        $extention = ['jpg', 'jpeg', 'png'];
        if (!in_array($end, $extention)) {
            $data['extention'] = 'please upload image with jpg/jpeg/png';
        }
        if ($imageSize > 1024 * 1024 * 3) {
            $data ['size'] = 'you must upload 3 mb..!';
        }

        if ($title == '') {
            $data ['title'] = 'This Feild Requrid...!';
        }
        if ($category_id == '') {
            $data ['category_id'] = 'This Feild Requrid...!';
        }
        if ($author == '') {
            $data ['author'] = 'This Feild Requrid...!';
        }
        if ($tags == '') {
            $data ['tags'] = 'This Feild Requrid...!';
        }
        if ($body == '') {
            $data ['body'] = 'This Feild Requrid...!';
        }




        if (!$data) {
            $newimagename = 'image-' . uniqid() . $imageName;
            $condition = ['title' => $title, 'category_id' => $category_id, 'body' => $body, 'author' => $author, 'tags' => $tags, 'image' => $newimagename];
            $PostModel = $this->load->getmodal('PostModel');
            $data['postadd'] = $PostModel->insertPost('post', $condition);
            move_uploaded_file($imageTmpname, "./app/view/assets/frontend/upload/post/" . $newimagename);
            $data['postaddsucces'] = 'Post Add Successfully';
            $path = BASE_URL . "admin/postlistshow&&msg=" . urlencode(serialize($data['postaddsucces']));
            // echo $path;
            tool::redirect($path);
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/aside');
            $CategoryModel = $this->load->getmodal('CategoryModel');
            $data['categorylist'] = $CategoryModel->getCategory('category');
            $this->load->view('admin/addpost', $data);
            $this->load->view('admin/footer');
        }
    }

    public function deletepost($id = null) {
        $PostModel = $this->load->getmodal('PostModel');
        $data['getbypost'] = $PostModel->getByIdPost('post', 'category', $id);
        $image = $data['getbypost'][0]['image'];
        unlink("./app/view/assets/frontend/upload/post/$image");
        $data['postdelete'] = $PostModel->postDelete('post', $id);
        $data['postsucces'] = 'Post Delete Successfully';
        $path = BASE_URL . "admin/postlistshow&&msg=" . urlencode(serialize($data['postsucces']));
        tool::redirect($path);
    }

    public function updatepostshow($id = null) {
        $this->load->view('admin/header');
        $this->load->view('admin/aside');
        $CategoryModel = $this->load->getmodal('CategoryModel');
        $data['categorylist'] = $CategoryModel->getCategory('category');
        $PostModel = $this->load->getmodal('PostModel');
        $data['getPostById'] = $PostModel->getByIdPost('post', 'category', $id);
        $this->load->view('admin/updatepost', $data);
        $this->load->view('admin/footer');
    }

    public function updatepost() {
        //echo '<pre>';
        // print_r($_POST);
        //die;
        $data = [];
        $id = tool::validation($_POST['id']);
        $title = tool::validation($_POST['title']);
        $category_id = tool::validation($_POST['category_id']);
        $author = tool::validation($_POST['author']);
        $tags = tool::validation($_POST['tags']);
        $body = tool::validation($_POST['body']);

        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageSize = $image['size'];
        $imageTmpname = $image['tmp_name'];

        $PostModel = $this->load->getmodal('PostModel');
        $getByIdPost = $PostModel->getByIdPost('post', 'category', $id);
        $dbimage = $getByIdPost[0]['image'];

        if ($imageName != '') {
            $explode = explode('.', $imageName);
            $end = strtolower(end($explode));
            $extention = ['jpg', 'jpeg', 'png'];
            if (!in_array($end, $extention)) {
                $data['extention'] = 'please upload image with jpg/jpeg/png';
            }
            if ($imageSize > 1024 * 1024 * 3) {
                $data ['size'] = 'you must upload 3 mb..!';
            }
            if (!$data) {
                unlink("./app/view/assets/frontend/upload/post/$dbimage");
                $newimagename = 'image-' . uniqid() . $imageName;
                move_uploaded_file($imageTmpname, "./app/view/assets/frontend/upload/post/" . $newimagename);
            }
        } else {
            $newimagename = $dbimage;
        }



        if ($title == '') {
            $data ['title'] = 'This Feild Requrid...!';
        }
        if ($category_id == '') {
            $data ['category_id'] = 'This Feild Requrid...!';
        }
        if ($author == '') {
            $data ['author'] = 'This Feild Requrid...!';
        }
        if ($tags == '') {
            $data ['tags'] = 'This Feild Requrid...!';
        }
        if ($body == '') {
            $data ['body'] = 'This Feild Requrid...!';
        }




        if (!$data) {
            $sqlid = 'id = ' . $id;
            $condition = ['title' => $title, 'category_id' => $category_id, 'body' => $body, 'author' => $author, 'tags' => $tags, 'image' => $newimagename];
            $data['postupdate'] = $PostModel->postUpdate('post', $condition, $sqlid);
            //echo  $data['postupdate'];

            $data['postupdatesucces'] = 'Post Update Successfully';
            $path = BASE_URL . "admin/postlistshow&&msg=" . urlencode(serialize($data['postupdatesucces']));
            // echo $path;
            tool::redirect($path);
        } else {
            echo '<pre>';
            print_r($_POST);
            print_r($_FILES);
            echo '</pre>';
            $this->load->view('admin/header');
            $this->load->view('admin/aside');
            $CategoryModel = $this->load->getmodal('CategoryModel');
            $data['categorylist'] = $CategoryModel->getCategory('category');
            $this->load->view('admin/updatepost', $data);
            $this->load->view('admin/footer');
        }
    }

}
