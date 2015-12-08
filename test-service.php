<?php
	namespace Upjv\LicPro;
	require "./vendor/autoload.php";

	class LicencePro {
		static $NbInstance = 0;
		

		function __construct(){
			self::$NbInstance++;
		}

		function __destruct(){
			self::$NbInstance--;
		}

		function getNbrInstance() {
			return self::$NbInstance;
		}
	}

	$config = include './conf.php';

	$sm = new \Zend\ServiceManager\ServiceManager();
	$smc = new \Zend\ServiceManager\Config(include './conf.php');
	$smc->configureServiceManager($sm);
	//$sm->setShared('promo', false);

	$obj = $sm->get('Upjv\LicPro\LicencePro');
	echo LicencePro::getNbrInstance()."\n";
	$obj = $sm->get('Upjv\LicPro\LicencePro');
	echo LicencePro::getNbrInstance()."\n";

