<?php

namespace App\Controller;

use App\View\View;
use App\Repository\FactRepository;

/**
 * FactController objects
 *
 * @author semiha <semiha_19@abv.bg>
 */
class FactController
{
    protected View $view;

    protected FactRepository $repository;

    /**
     * Creates new FactController object
     *
     * @param View $view
     * @param FactRepository $repository
     */
    public function __construct(View $view, FactRepository $repository)
    {
        $this->view = $view;
        $this->repository = $repository;
    }

    /** Renders list with facts
     *
     * Loads the list from the repository and pass it to the view component
     * for rendering
     *
     * @param int $amount
     * @param string $type
     *
     * @return string
     */
    public function list(int $amount, string $type): string
    {
        $list = $this->repository->getRandomList($amount, $type);
        //Render array collection view
        $renderView = $this->view->render('fact/list', ['list' => $list]);
        return $renderView;
    }

    /** Loads and renders a single fact
     *
     * Loads the fact from the repository and pass it to the view component
     * for rendering
     *
     * @param string $id
     *
     * @return string
     */
    public function single(string $id): string
    {
        $fact = $this->repository->getFact($id);
        //Render single fact view
        $renderView = $this->view->render('fact/single', ['fact' => $fact]);
        return $renderView;
    }
}
