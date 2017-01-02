<?php
namespace app\src;

    class MainModel
    {
        /*
         * @var object $dbActions Get object for interaction with database.
         */
        private $dbActions;

        function __construct()
        {
            $this->dbActions = new \app\model\DbModel();
        }

        /*
         * Get page data
         *
         * @param int|null $pageNumber Set custom or default page number. If get null it will be the last page of comments
         * @param int $commentsPerPage Sets the number of comments per page
         */
        function getPage($pageNumber, $commentsPerPage)
        {
            /*
            * @var int $commentsCount Get number of all comments
            */
            $commentsCount = $this->dbActions->executeQuery('SELECT COUNT(*) FROM guestbook_messages')->fetchColumn();

            if ($pageNumber > ceil($commentsCount / $commentsPerPage)) {
                throw new Exception('Page not exist!');
            }

            if (is_null($pageNumber)) {
                $pageNumber = ceil($commentsCount / $commentsPerPage);
            }

            /*
            * @var int $limit_offset The number of first comment to a required page in the database
            */
            $limit_offset = ($pageNumber - 1) * $commentsPerPage;

            /*
            * @var array $comments Contains all comments from required page
            */
            $comments = $this->dbActions->executeQuery("SELECT name, email, message, date FROM guestbook_messages ORDER BY id LIMIT $limit_offset, $commentsPerPage")->fetchAll(\PDO::FETCH_ASSOC);

            $pagination = array('commentsCount' => $commentsCount, 'pageNumber' => $pageNumber, 'commentsPerPage' => $commentsPerPage);
            return array('comments' => $comments, 'pagination' => $pagination);
        }

    }