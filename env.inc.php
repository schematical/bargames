<?php
if(!defined('SERVER_ENV')){
	switch($_SERVER['SERVER_NAME']){
		case('bargames.schematical.com'):
			define('SERVER_ENV', 'local');
			define('MLC_APPLICATION_NAME', 'bargames');
			define('MLC_APPLICATION_PREFIX', 'BG');
		break;
		case('bargamify.com'):
        case('www.bargamify.com'):
			define('SERVER_ENV', 'prod');
			define('MLC_APPLICATION_NAME', 'bargames');
			define('MLC_APPLICATION_PREFIX', 'BG');
		break;
	}
}
if(defined('SERVER_ENV')){
	switch(SERVER_ENV){
		case('local'):			
			define('DB_1', serialize(array(
				'host'=>'localhost',
				'db_name'=>'bargames',
				'user'=>'root',
				'pass'=>'learnlearn'
			)));
			define('DB_0', serialize(array(
				'host'=>'localhost',
				'db_name'=>'util',
				'user'=>'root',
				'pass'=>'learnlearn'
			)));
			
		break;
        case('prod'):
            define('DB_1', serialize(array(
                'host'=>'lab.cv7i1bpkvj0w.us-east-1.rds.amazonaws.com',
                'db_name'=>'bargames',
                'user'=>'evillabs',
                'pass'=>'gaM3rPuPu'
            )));
            define('DB_0', serialize(array(
                'host'=>'lab.cv7i1bpkvj0w.us-east-1.rds.amazonaws.com',
                'db_name'=>'util',
                'user'=>'evillabs',
                'pass'=>'gaM3rPuPu'
            )));

        break;
	}
	
	
	define('FOURSQUARE_CLIENT_ID', 'FOMG2MGP42L4NETX02VOHLUUOYQDXVX1JLXNZBFBRP02B2DH');
	define('FOURSQUARE_CLIENT_SECRET', 'EIZUVCO0CZDII2EV0H01ILCKNL1ZNP3GG0WAF00QIIY0JMVZ');
	define('FOURSQUARE_PUSH_SECRET', '5TV4JTRBMQTBYH31CHNYHIDHQDIDL4DX0EHD2EXMVUDSQCXT');
	
	define('TWITTER_CONSUMER_KEY', 'kvTfv7VCfcxhm8yi2SxNbA');
	define('TWITTER_CONSUMER_SECRET', 'ig1mD43DZTTePqWrm7a09LH2ibMNssb9CcbZYPqzDzk');
	if(array_key_exists('SERVER_NAME', $_SERVER)){
		define('TWITTER_OAUTH_CALLBACK', 'http://' . $_SERVER['SERVER_NAME']. '/twitter/callback.php');
	}
	
	define('AWS_ACCESS_KEY', 'AKIAIWAM5VQTMEM73MFA');
	define('AWS_ACCESS_SECRET', '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');
	
	if(true){//Cant do live yet
		define('STRIPE_MODE', 'test');
		define('STRIPE_API_SECRET', 'sk_sk3VF1S2GK9kwsa8PfLkQNWfma5pD');
		define('STRIPE_API_PUBLIC', 'pk_RXEN6DBtQiZeFKULC66vTD2ycP0hJ');
	}else{
		define('STRIPE_MODE', 'live');
		define('STRIPE_API_SECRET', 'sk_GTlGrn8L9erPQpTNvDiznek9BEVLE');
		define('STRIPE_API_PUBLIC', 'pk_tu8lmXHcSfLBFRiDbh67hGvg5z8vY');
	}
}