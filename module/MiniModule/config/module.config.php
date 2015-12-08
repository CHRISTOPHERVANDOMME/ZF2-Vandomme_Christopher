<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MiniModule;

return array(
    'router' => array(
        'routes' => array(
            'index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Index',
                        'action'     => 'index',
                   )
                 )
           ),
           'default' => array(
               'type' => 'Zend\Mvc\Router\Http\Segment',
               'options' => array(
                 'route' => '/:action',
                   'constraints' => array(),
                   'defaults' => array(
                      'controller' => 'MiniModule\Controller\Index',
                      'action' => 'index'
                   ),
              ),
          ),
       )
   ),
    'controllers' => array(
        'invokables' => array(
            'MiniModule\Controller\Index' => Controller\IndexController::class,
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'minimodule/index/index' => __DIR__ . '/../view/minimodule/index/index.phtml',
            'error'             => __DIR__ . '/../view/error.phtml',
            'minimodule/index/form'=> __DIR__.'/../view/minimodule/index/form.phtml',
            'minimodule/index/traite'=> __DIR__.'/../view/minimodule/index/traite.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
