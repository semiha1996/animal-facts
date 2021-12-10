<?php

//src/View/View.php

namespace App\View;

/**
 * Renders view files from specified base view directory
 *
 * @author semiha
 */
class View 
{
    //Path to view directory
    protected string $viewDirectory;
    
    public function __construct(string $viewDirectory) 
    {
        $this->viewDirectory = $viewDirectory;
    }

    /**
     * Render a template with a view model
     * 
     * @param string $viewName
     * 
     * @param array $viewModel
     * 
     * @return string
     */
    public function render(string $viewName, array $viewModel):string 
    {   
        //for testing
       // $viewDirectory = 'views';
        //Return the trailing name component of a path
        $viewFile = basename($viewName).'.php';
        $filePath = $viewDirectory.'/'.$viewName.'.php';
        if(file_exists($filePath)){
            extract($viewModel);
            ob_start();
            include $filePath;
            $renderedView = ob_get_clean();
        }else {
            $renderedView = render('error/no_view',$viewModel ); 
        }
        return $renderedView;
    }
}