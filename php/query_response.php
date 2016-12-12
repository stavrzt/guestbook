<?php

require_once('index.php');
$page =$_POST['page'];
$responce_page = Comment::view_comments($page);
$lol=0;