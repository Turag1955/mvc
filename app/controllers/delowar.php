<?php

class delowar extends dController {

    public function __construct() {
        //  echo 'i am delowar from controller';
        parent::__construct();
    }
    public function jahan($data=''){
        echo $data.' from method';
    }

}
