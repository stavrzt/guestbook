<?php

require_once ('/app/model/MainModel.php');



class MainController{
    private $mainModel;

    function __construct(){
        $this->mainModel = new MainModel();
    }

    function getPage(){
        $commentsData = $this->mainModel->getPage();
        require ('/app/view/PageView.php');
    }


}