<?php

class main {

    public $url;
    public $controllerName = "index";
    public $methodName = "index";
    public $controllerPath = "app/controllers/";
    public $controller;

    public function __construct() {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    public function getUrl() {
        if (isset($_GET['url']) && $_GET['url'] != '') {
            $this->url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
            $this->url = explode('/', rtrim($this->url, '/'));
           //echo '<pre>';
          //  print_r($this->url );
        } else {
            unset($this->url);
        }
        // die();
    }

    public function loadController() {
        if (!isset($this->url[0])) {
            include $this->controllerPath . $this->controllerName . ".php";
            $this->controller = new $this->controllerName();
            //$this->controller->$this->methodName();
        } else {
            $this->controllerName = $this->url[0];
            $fileName = $this->controllerPath . $this->controllerName . ".php";
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->controllerName)) {
                    $this->controller = new $this->controllerName();
                } else {
                    header("location:" . BASE_URL . "index");
                }
            } else {
                header("location:" . BASE_URL . "index");
            }
        }
    }

    public function callMethod() {
        if (isset($this->url[2])) {
            $this->methodName = $this->url[1];
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}($this->url[2]);
            } else {
                header("location:" . BASE_URL . "Index");
            }
        } else {
            if (isset($this->url[1])) {
                $this->methodName = $this->url[1];
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("location:" . BASE_URL . "Index");
                }
            } else {
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("location:" . BASE_URL . "Index");
                }
            }
        }
    }

}
