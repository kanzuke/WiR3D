<?php

namespace Core\Controller;


class Controller {
    
    protected $viewPath;
    protected $template;
    
    
    public function __construct() {
        
    }
    
    
    /**
     * Generate and display the related view
     * @param string $view name of the view (split by dot)
     * @param array $variables compacted version of useful variables, given by the controller
     */
    public function render($view, $variables = []) {
        ob_start();
        
        // extract $variables
        extract($variables);
        
        require($this->viewPath.str_replace('.','/', $view).'.view.php');
        $content = ob_get_clean();

        require($this->viewPath . 'templates/' . $this->template .'.view.php');
    }
    
    
    
    
}



?>