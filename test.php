<?php
//test.php
use App\View\View;
use App\Exceprion;
use App\Repository\FactRepository;
use Psr\Http\ClientInterface;
use App\Model\Fact;
use App\Model\User;

require_once './vendor/autoload.php';

$view = new View('views');
//$view->render('layout', ['content' => 'html', 'title' => 'title']);

//$httpClient = new ClientInterface();
//$repo = new FactRepository(BASE_URL, $httpClient);
//$fact = new Fact();

$user = new User('123dsh','/img.jpg',['first'=>'Semiha','last'=>'Tahirova']);
echo $user->getName()['first'].' '.$user->getName()['last'].'</br>';
echo $user->getFirstName().'</br>';
echo $user->getFullName().'</br>';
echo $user->getLastName().'</br>';

$user->setName(['firat'=>'Semiha','last'=>'Karaibrahimova']);
echo $user->getFullName();