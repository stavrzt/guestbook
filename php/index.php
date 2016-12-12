<?php
include 'header.php';
include 'options.php';

class Comment{

    function add_comment($name, $email, $message, $date){
        $html = <<<TAGS
        <div class="comment">
        <br>
        <div class="info">
            <span>$name</span>
            <span>$email</span>
            <span>$date</span>
        </div>
        <p class="comment_text">$message</p>
        <br>
    </div>
TAGS;
        echo $html;
    }

    static function get_from_db($query){
        global $db;
        $get_from_bd = $db->prepare($query);
        $get_from_bd->execute();
        return $get_from_bd;
    }

    public static function view_comments($limit_offset = '')
    {
        $comments_count_query =  self::get_from_db("SELECT COUNT(*) FROM guestbook_messages");
        $comments_count = $comments_count_query->fetchColumn();

        if($comments_count%5==0){
            $limit = 5;
        }
        else{
            $limit = $comments_count%5;
        }
        if($limit_offset == "") {
            $limit_offset = $comments_count - $limit;
        }
        else{
            $limit_offset = $limit_offset * 5 - 1;
        }

        $get_comments =  self::get_from_db("SELECT name, email, message, date FROM guestbook_messages ORDER BY id LIMIT $limit_offset, $limit");

        return $result = array("comments" => $get_comments->fetchAll(PDO::FETCH_ASSOC), "comments_count" => $comments_count);
    }
}

?>

<div class="content">
    <?php
        $view_comments = Comment::view_comments();

        //echo $view_comments[comments_count];

        foreach ($view_comments[comments] as $key=>$value){
            (new Comment())->add_comment($value[name], $value[email], $value[message], $value[date]);
        }

//        $view_pagination = Comment::view_pagination($view_comments[comments_count]);
        ?>
        <div class="pagination">
            <?
        for($i=0; $i<ceil($view_comments[comments_count]/5); $i++){
            echo '<a href="">' . $i . '</a>';
        }
            ?>
        </div>



</div>

<?php
include ('footer.php');
