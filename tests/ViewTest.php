<?php

use App\View\View;

define('VIEW_DIR', 'views');

/**
 * Test View class
 *
 * @author semiha
 */
class ViewTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test View's render method
     * @test
     */
    public function testRenderMethodWithExistingView()
    {
        $view = new View(VIEW_DIR);
        $actualString = $renderedView = $view->render(
            'layout',
            ['title' => 'MyTitle',
             'content' => 'MyContent']
        );
        $this->assertTrue($actualString != null);
    }

    /**
     * Test View's render method
     * @test
     */
    public function testRenderMethodWithNonExistingView()
    {
        $view = new View(VIEW_DIR);
        $actualString = $renderedView = $view->render(
            'no_such_view',
            ['name' => 'MyName']
        );
        $this->assertTrue($actualString != null);
    }
}
