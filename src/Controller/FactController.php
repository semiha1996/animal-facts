<?php

//src/Controller/FactController.php

namespace App\Controller;

use App\View\View;
use App\Repository\FactRepository;

/**
 * Description of FactController
 *
 * @author semiha
 */
class FactController {
    protected View $view;
    
    protected FactRepository $repository;
    
    
    public function __construct(View $view, FactRepository $repository) {
        $this->view = $view;
        $this->repository = $repository;
    }

    /**Renders list with facts
     * Loads the list from the repository and pass it to the view component
     * for rendering
     * @param int $amount
     * @param string $type
     * @return string
     */
    public function list(int $amount, string $type): string {
        return;   
    }
    
    /**Loads and renders a single fact
     * Loads the fact from the repository and pass it to the view component 
     * for rendering
     * @param string $id
     * @return string
     */
    public function single(string $id): string {
        return;
    }
}
