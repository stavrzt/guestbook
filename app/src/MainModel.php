<?php

require_once('/app/model/DbModel.php');

class MainModel{

    private $dbActions;

    function __construct()
    {
        $this->dbActions = new DbModel();
    }

    function getPage()
    {
        return $this->getComments();
    }

    private function getComments($pageNumber = null, $commentsPerPage = 5)
    {
        $commentsCount = $this->dbActions->executeQuery('SELECT COUNT(*) FROM guestbook_messages')->fetchColumn();

        if($pageNumber > ceil($commentsCount/$commentsPerPage)){
            throw new Exception('Page not exist!');
        }

        if (is_null($pageNumber)) {
            $pageNumber = ceil($commentsCount/$commentsPerPage);
        }

        $limit_offset = ($pageNumber - 1) * $commentsPerPage;

        $comments = $this->dbActions->executeQuery("SELECT name, email, message, date FROM guestbook_messages ORDER BY id LIMIT $limit_offset, $commentsPerPage")->fetchAll(PDO::FETCH_ASSOC);
        $pagination = array('commentsCount'=>$commentsCount, 'pageNumber'=>$pageNumber, 'commentsPerPage'=>$commentsPerPage);
        return array('comments' => $comments, 'pagination' => $pagination);
    }

}