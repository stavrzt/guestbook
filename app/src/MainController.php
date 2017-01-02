<?php
namespace app\src;

    class MainController
    {
        private $mainModel;
        private $mainView;

        function __construct()
        {
            $this->mainModel = new MainModel();
            $this->mainView = new MainView();
        }

        /*
         * Get page data and show them
         *
         * @param int|null $pageNumber Set custom or default page number. If get null it will be the last page of comments
         * @param int $commentsPerPage Sets the number of comments per page
         */
        function run($pageNumber = null, $commentsPerPage = 5)
        {
            $pageData = $this->mainModel->getPage($pageNumber, $commentsPerPage);
            $this->mainView->getPageView($pageData);
        }
    }