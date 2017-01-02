<?php

namespace app\src;

    class MainView
    {
        function getPageView($pageData)
        {
            $renderedComments = $this->renderView('/app/view/CommentView.php', $pageData['comments']);
            $renderedPagination = $this->renderView('/app/view/PaginationView.php', $pageData['pagination']);
            require 'app/view/PageView.php';
        }

        function renderView($view, $params = [])
        {
            ob_start();
            ob_implicit_flush(false);
            if (is_array($params[0])) {
                foreach ($params as $param) {
                    extract($param, EXTR_OVERWRITE);
                    require $view;
                }
            } else {
                extract($params, EXTR_OVERWRITE);
                require $view;
            }
            return ob_get_clean();
        }
    }