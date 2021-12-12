<?php

//src/tests/ViewTest.php

/**
 * Test View class
 *
 * @author semiha
 */
class ViewTest extends PHPUnit\Framework\TestCase 
{
    /**
    * Test the View class constructor.
     */
    public function testCreateViewByConstructor()
    {
 	$view = new View('views');	
        $this->assertEquals('views', $view->viewDirectory);
    }
    
    /**
     * Test View's render method
     */
    public function testRenderMethodWithExistingView()
    {
 	$view = new View('views');	
        //$this->assertEquals('views', $view->viewDirectory);
    }
    
    /**
     * Test View's render method
     */
    public function testRenderMethodWithNonExistingView()
    {
 	$view = new View('views');	
        //$this->assertEquals('views', $view->viewDirectory);
    }
}
