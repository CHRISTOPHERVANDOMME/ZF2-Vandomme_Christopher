<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MiniModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel(array('nom' => 'tintin',));
        $view->setTemplate("minimodule/index/index.phtml");
		return $view;
    }

    public function formAction() {
    	$view = new ViewModel(array());
        $view->setTemplate("minimodule/index/form.phtml");
    	return $view;
    }

    public function traiteAction() {
    	$view = new ViewModel(array('login' => $_GET['log'],));
        $view->setTemplate("minimodule/index/traite.phtml");
		return $view;
    }
}
