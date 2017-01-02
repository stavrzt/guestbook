<?php
namespace app\model;

    class DbModel
    {
        /*
         * @var object $db Get PDO object for prepare connections.
         */
        private $db;

        function __construct()
        {
            /* File return PDO object */
            $this->db = require $_SERVER['DOCUMENT_ROOT'].'/config.php';
        }

        /*
         * Executes query and return data from database
         *
         * @param string $query SQL query to database
         * @return data
         */
        function executeQuery($query)
        {
            $get_from_bd = $this->db->prepare($query);
            $get_from_bd->execute();
            return $get_from_bd;
        }
    }