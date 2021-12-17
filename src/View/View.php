<?php

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
    public function render(string $viewName, array $viewModel): string
    {
        $filePath = $this->viewDirectory . '/' . $viewName . '.php';
        if (file_exists($filePath)) {
            extract($viewModel);
            ob_start();
            include $filePath;
            $renderedView = ob_get_clean();
        } else {
            $renderedView = $this->render(
                'error/no_view',
                ['name' => $viewModel['name']]
            );
        }
        return $renderedView;
    }
}
