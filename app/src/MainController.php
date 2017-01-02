<?php
namespace app\src {

    class MainController
    {

        private $mainModel;
        private $mainView;

        function __construct()
        {
            $this->mainModel = new \app\src\MainModel();
            $this->mainView = new \app\src\MainView();
        }

        function getPage()
        {
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

}