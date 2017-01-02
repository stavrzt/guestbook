<?php
namespace app\model {

    class DbModel
    {
        private $db;

        function __construct()
        {
            $this->db = require '/config.php';
        }

        function executeQuery($query)
        {
            $get_from_bd = $this->db->prepare($query);
            $get_from_bd->execute();
            return $get_from_bd;
        }
    }

}