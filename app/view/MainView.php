<?php

class MainView{
    function __construct($view = null){
       $this->view = $view;
    }

    private function renderView($view, $params = [])
    {
        ob_start();
        ob_implicit_flush(false);
        if (is_array($params[0])) {
            foreach ($params as $param) {
                extract($param, EXTR_OVERWRITE);
                require($view);
            }
        } else {
            extract($params, EXTR_OVERWRITE);
            require($view);
        }
        return ob_get_clean();
    }


}