<?php
define('__MODEL_APP_DATALAYER_DIR__', __MODEL_BG_APP_DIR__ . '/data_classes');

define('__MODEL_APP_CONTROL__', __MODEL_BG_APP_DIR__ . '/ctl_classes');

define('__MODEL_APP_API__', __MODEL_BG_APP_DIR__ . '/api_classes');
define('__MODEL_APP_ENTITY_MODEL__', __MODEL_BG_APP_DIR__ . '/entity_model');
if(!defined('SKIP_DATALAYER')){
	require_once(__MODEL_APP_DATALAYER_DIR__ . '/base_classes/Conn.inc.php');
	require_once(__MODEL_APP_CONTROL__ . '/base_classes/ControlConn.inc.php');
	if(file_exists(__MODEL_APP_CONTROL__ . '/Codiqa.inc.php')){
		require_once(__MODEL_APP_CONTROL__ . '/Codiqa.inc.php');
	}
}

MLCApplicationBase::$arrClassFiles['BGApplication'] = __MODEL_BG_APP_DIR__ . '/BGApplication.class.php';
MLCApplicationBase::$arrClassFiles['BGRewriteHandeler'] = __MODEL_BG_APP_DIR__ . '/BGRewriteHandeler.class.php';
MLCApplicationBase::$arrClassFiles['BGAuthDriver'] = __MODEL_BG_APP_DIR__ . '/BGAuthDriver.class.php';

//CTL
MLCApplicationBase::$arrClassFiles['BGForm'] = __MODEL_BG_APP_DIR__ . '/BGForm.class.php';


require_once(__MODEL_BG_APP_DIR__ . '/_enum.inc.php');

MLCApplication::InitPackage('MJax');
MLCApplication::InitPackage('MJaxBootstrap');
MLCApplication::InitPackage('MLCAuth');
MLCApplication::InitPackage('MDE');
MLCApplication::InitPackage('MLCDataLayer');
MLCApplication::InitPackage('MLCTracking');
MLCApplication::$objRewriteHandeler = new BGRewriteHandeler();
if(class_exists('MLCAuthDriver')){
	MLCAuthDriver::SetCookieDomain('bargamify.com');
}