<?php
/**
 * @author Sven Anders Robbestad @ 2013-2014 (svenanders@robbestad.com)
 *
 * @license   Creative Commons (CC BY)
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'saruser' => 'SarUser\Controller\IndexController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'saruser-route' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        'controller' => 'saruser',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'login' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/login',
                            'defaults' => array(
                                'controller' => 'saruser',
                                'action'     => 'login',
                            ),
                        ),
                    ),
                    'account' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/account',
                            'defaults' => array(
                                'controller' => 'saruser',
                                'action'     => 'account',
                            ),
                        ),
                    ),
                    'authenticate' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/authenticate',
                            'defaults' => array(
                                'controller' => 'saruser',
                                'action'     => 'authenticate',
                            ),
                        ),
                    ),
                    'logout' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/logout',
                            'defaults' => array(
                                '__NAMESPACE__' => 'saruser',
                                'controller' => 'saruser',
                                'action'     => 'logout',
                            ),
                        ),
                    ),
                    'register' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/register',
                            'defaults' => array(
                                '__NAMESPACE__' => 'saruser',
                                'controller' => 'saruser',
                                'action'     => 'register',
                            ),
                        ),
                    ),
                    'changepassword' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/changepassword',
                            'defaults' => array(
                                '__NAMESPACE__' => 'saruser',
                                'controller' => 'saruser',
                                'action'     => 'changepassword',
                            ),
                        ),
                    ),
                    'forgottenpassword' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/forgottenpassword',
                            'defaults' => array(
                                '__NAMESPACE__' => 'saruser',
                                'controller' => 'saruser',
                                'action'     => 'forgottenpassword',
                            ),
                        ),
                    ),
                    'changeemail' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/change-email',
                            'defaults' => array(
                                '__NAMESPACE__' => 'SarUser\Controller',
                                'controller' => 'saruser',
                                'action' => 'changeemail',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_map' => array(
            'sar-user/index/index'   => __DIR__ . '/../view/sar-user/index/index.twig',
            'sar-user/index/account'   => __DIR__ . '/../view/sar-user/index/account.twig',
            'sar-user/index/login'   => __DIR__ . '/../view/sar-user/index/login.twig',
            'sar-user/index/logout'   => __DIR__ . '/../view/sar-user/index/logout.twig',
            'sar-user/index/register'   => __DIR__ . '/../view/sar-user/index/nybruker.twig',
            'sar-user/index/changepassword'   => __DIR__ . '/../view/sar-user/index/changepassword.twig',
            'sar-user/index/forgottenpassword'   => __DIR__ . '/../view/sar-user/index/forgottenpassword.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
