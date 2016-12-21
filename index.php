<?php
require_once('app/controller/MainController.php');
require_once('config.php');

$mainController = new MainController();

$mainController->getPage();