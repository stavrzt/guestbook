<?php
namespace app\helper;

class Helper{
    public static function paginationPages($commentsCount, $commentsPerPage, $pageNumber)
    {
        ob_start();
        ob_implicit_flush(false);
        for ($i = 1; $i < ceil($commentsCount / $commentsPerPage)+1; $i++) {
            echo '<a href=""' ?><?php if ($i == $pageNumber) {
                echo 'class="currentPage"';
            } ?><?php echo '>' . $i . '</a>';
        }
        return ob_get_clean();
    }
}