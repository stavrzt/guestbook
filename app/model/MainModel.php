<?php

require_once('/DbModel.php');

class MainModel{

    private $commentsCount;
    private $pageNumber;
    private $commetsPerPage;

    function __construct()
    {
        $this->dbActions = new DbModel();
    }

    function getPage()
    {
        $commentsWithInfo = $this->getComments();
        $paginationHtml = $this->getPagination();

        return ($commentsWithInfo . $paginationHtml);
    }

    function getComments($pageNumber = null, $commetsPerPage = 5)
    {
        $this->commentsCount = $this->dbActions->executeQuery('SELECT COUNT(*) FROM guestbook_messages')->fetchColumn();

        if($pageNumber > ceil($this->commentsCount/$commetsPerPage)){
            throw new Exception('Page not exist!');
        }

        if (is_null($pageNumber)) {
            $pageNumber = ceil($this->commentsCount/$commetsPerPage);
        }

        $this->pageNumber = $pageNumber;
        $this->commetsPerPage = $commetsPerPage;

        $limit_offset = ($pageNumber - 1) * $commetsPerPage;

        $get_comments = $this->dbActions->executeQuery("SELECT name, email, message, date FROM guestbook_messages ORDER BY id LIMIT $limit_offset, $commetsPerPage")->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderView('/app/view/CommentView.php', $get_comments);
    }

    function getPagination(){
        return $this->renderView('/app/view/PaginationView.php', array('commentsCount'=>$this->commentsCount, 'pageNumber'=>$this->pageNumber, 'commetsPerPage'=>$this->commetsPerPage));
    }


}