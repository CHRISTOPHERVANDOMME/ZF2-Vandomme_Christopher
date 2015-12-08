<?php
require './vendor/autoload.php';
$vm = new \Zend\View\Model\ViewModel(array('nom'=>'tintin'));
$vm->setTemplate('liste');
$v = new Zend\View\View();
$v->addRenderingStrategy(function(){
	$resol = new \Zend\View\Resolver\TemplateMapResolver(array(
	'liste'=> __DIR__.'/liste.phtml',
	));
	$rendu = new \Zend\View\Renderer\PhpRenderer();
	$rendu->setResolver($resol);
	return $rendu;
});
$v->addResponseStrategy(function($p){
	$params = $p->getParams();
	$reponse = $params['response'];
	$rendu = $params['result'];
	$reponse->setContent($rendu);
});
$r = new \Zend\Console\Response();
$v->setResponse($r);
try{
	$v->render($vm);
}catch(Exception $e){
	echo $e->getMessage()."\n";
}
echo $v->getResponse()->getContent();
