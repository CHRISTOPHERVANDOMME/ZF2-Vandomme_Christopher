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
use Zend\Form\Factory;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel(array('nom' => 'tintin',));
        $view->setTemplate("minimodule/index/index.phtml");
		return $view;
    }

    public function formAction() {
    	/*$view = new ViewModel(array());
        $view->setTemplate("minimodule/index/form.phtml");
    	return $view;*/
            $configForm = array(
            'elements' => array(
                // la saisie du login (type text)
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Text',
                        'name' => 'log',
                        'attributes' => array(
                            'size' => '20',
                        ),
                        'options' => array(
                          'label' => 'Login : ',
                        ),
                    ),
                ),
                // le boutton de validation
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Submit',
                        'name' => 'submit',
                        'attributes' => array(
                            'value' => 'Suite',
                        ),
                    ),
                ),
            ),
        );

        $factory = new Factory();
        $form = $factory->createForm( $configForm );
        $view = new ViewModel(array('form' => $form));
        $view->setTemplate("minimodule/index/form.phtml");
        return $view;
    }

    public function traiteAction() {
    	$view = new ViewModel(array('login' => $_POST['log'],));
        $view->setTemplate("minimodule/index/traite.phtml");
		return $view;
    }
}
