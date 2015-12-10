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

    public function gmapsAction()
    {
        $markers = array(
        'Mozzat Web Team' => '17.516684,79.961589',
        'Home Town' => '16.916684,80.683594'
    );  //markers location with latitude and longitude

    $config = array(
        'sensor' => 'true',         //true or false
        'div_id' => 'map',          //div id of the google map
        'div_class' => 'grid_6',    //div class of the google map
        'zoom' => 5,                //zoom level
        'width' => "600px",         //width of the div
        'height' => "300px",        //height of the div
        'lat' => 16.916684,         //lattitude
        'lon' => 80.683594,         //longitude 
        'animation' => 'none',      //animation of the marker
        'markers' => $markers       //loading the array of markers
    );

    $map = $this->getServiceLocator()->get('GMaps\Service\GoogleMap'); //getting the google map object using service manager
    $map->initialize($config);                                         //loading the config   
    $html = $map->generate();                                          //genrating the html map content  
    //passing it to the view
    $view = new ViewModel(array('map_html' => $html));
    $view->setTemplate("minimodule/index/gmaps.phtml");
       return $view;
    }
}
