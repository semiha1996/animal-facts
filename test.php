<?php
//test.php
use App\View\View;
use App\Exceprion;

require_once './vendor/autoload.php';

$view = new View('views');
$view->render('layout', ['content' => 'html', 'title' => 'title']);
//setType() - 2 tests
//setName(), getFullNane, getFirstNAme,getLastName
//FActCollection::ensure... offsetSet