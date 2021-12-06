<?php

//src/View/View.php

namespace App\View;

/**
 * Renders view files from specified base view directory
 *
 * @author semiha
 */
class View {
    //Path to view directory
    protected string $viewDirectory;
    
    public function __construct(string $viewDirectory) {
        $this->viewDirectory = $viewDirectory;
    }

    /**
     * Render a template with a view model
     * @param string $viewName
     * @param array $viewModel
     * @return string
     */
    public function render(string $viewName, array $viewModel):string {
        return string;
    }
}
