<?php

require_once ('MainModel.php');
require ('MainView.php');

class MainController{

    private $mainModel;
    private $mainView;

    function __construct(){
        $this->mainModel = new MainModel();
        $this->mainView = new MainView();
    }

    function getPage(){
        $pageData = $this->mainModel->getPage();
        $this->mainView->getPageView($pageData);
    }

    /* for ajax
    function getComments(){
        $commentsData = $this->mainModel->getPage();
        return $this->mainView->renderView($commentsData);
    }
    */
    
}