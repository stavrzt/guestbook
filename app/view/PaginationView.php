<div class="pagination">
    <?php
    for ($i = 0; $i < ceil($commentsCount / $commentsPerPage); $i++) {
        echo '<a href=""' ?><?php if ($i == $pageNumber - 1) {
            echo 'class="currentPage"';
        } ?><?php echo '>' . $i . '</a>';
    }
    ?>
</div>