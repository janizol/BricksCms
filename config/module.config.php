<?php

	return array(
		'controllers' => array(
			'invokables' => array(
				'BricksCms\Controller\IndexController' => 'BricksCms\Controller\IndexController',
				'BricksAsset\Controller\AssetController' => 'BricksAsset\Controller\AssetController',
				'BricksAsset\Controller\MenuController' => 'BricksAsset\Controller\MenuController',
			),
		),
		'view_manager' => array(	
			'template_map' => array(
				'layout/layout'			=> __DIR__.'/../view/layout/layout.phtml',
				'error/404'				=> __DIR__.'/../view/error/404.phtml',
				'error/index'			=> __DIR__.'/../view/error/index.phtml',
			),
			'template_path_stack' => array(
				__DIR__ . '/../view',
			),
		),
		'translator' => array(
			'translation_file_patterns' => array(
				array(
					'type' => 'phparray',
					'base_dir' => __DIR__.'/../language',
					'pattern' => '%1$s/%1$s.php',
				),
				array(
					'type' => 'gettext',
					'base_dir' => __DIR__.'/../language',
					'pattern' => '%1$s.mo',
				)
			),
		),
		'router' => array(
			'router_class' => 'Zend\Mvc\Router\Http\TranslatorAwareTreeRouteStack',
			'routes' => array(
				'bricks.index.index' => array(
					'type' => 'segment',
					'options' => array(						
						'route'    => '/{Bricks}',
						'defaults' => array(
							'controller' => 'BricksCms\Controller\IndexController',
							'action'     => 'index',
						),
					),					
				),	
				'bricks.asset.index' => array(
					'type' => 'segment',
					'options' => array(
						'route'    => '/{Admin}/{Assets}',
						'defaults' => array(
							'controller' => 'BricksAsset\Controller\AssetController',
							'action'     => 'index',
						),
					),
				),
				'bricks.asset.publish' => array(
					'type' => 'segment',
					'options' => array(
						'route'    => '/{Admin}/{Assets/Write}',
						'defaults' => array(
							'controller' => 'BricksAsset\Controller\AssetController',
							'action'     => 'publish',
						),
					),
				),
				'bricks.asset.publish.do' => array(
					'type' => 'segment',
					'options' => array(
						'route'    => '/{Admin}/{Assets/Write/Execute}',
						'defaults' => array(
							'controller' => 'BricksAsset\Controller\AssetController',
							'action'     => 'publishDo',
						),
					),
				),
				'bricks.asset.publish.success' => array(
					'type' => 'segment',
					'options' => array(
						'route'    => '/{Admin}/{Assets/Write/Success}',
						'defaults' => array(
							'controller' => 'BricksAsset\Controller\AssetController',
							'action'     => 'publishSuccess',
						),
					),
				),
			),
		),
		'BricksConfig' => array(
			'__DEFAULT_NAMESPACE' => array(
				'BricksCms' => array(
					'dependendModules' => array(
						'BricksFile',
						'BricksConfig',
						'BricksClassLoader',
						'BricksPlugin',
						'BricksAsset',
					),
				),				
			),
			'BricksCms' => array(
				'BricksAsset' => array(
					'moduleAssetsPath' => dirname(__DIR__).'/public',
				),
			),
			'jquery' => array(
				'BricksAsset' => array(
					'moduleAssetsPath' => './vendor/components/jquery',
				),
			),
			'jqueryui' => array(
				'BricksAsset' => array(
					'moduleAssetsPath' => './vendor/components/jqueryui'
				),
			),
			'bootstrap' => array(
				'BricksAsset' => array(
					'moduleAssetsPath' => './vendor/components/bootstrap'
				),
			),
			'modernizr' => array(
				'BricksAsset' => array(
					'moduleAssetsPath' => './vendor/components/modernizr'
				),
			),
			'font-awesome' => array(
				'BricksAsset' => array(
					'moduleAssetsPath' => './vendor/components/font-awesome'
				),
			),
		),		
	);
?>