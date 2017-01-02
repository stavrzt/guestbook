<div class="pagination">
    <?php
    echo \app\helper\Helper::paginationPages($commentsCount, $commentsPerPage, $pageNumber);
    ?>
</div>