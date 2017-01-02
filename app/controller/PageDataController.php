<?php

require($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

$mainModel = new \app\src\MainModel();
$mainView = new app\src\MainView();

$pageData = $mainModel->getPage($_POST['page'], $commentsPerPage = 5);

$pageData['comments'] = $mainView->renderView($_SERVER['DOCUMENT_ROOT'].'/app/view/CommentView.php', $pageData['comments']);
$pageData['pagination'] = $mainView->renderView($_SERVER['DOCUMENT_ROOT'].'/app/view/PaginationView.php', $pageData['pagination']);

echo json_encode($pageData);