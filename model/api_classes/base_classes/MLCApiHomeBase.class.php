<?php
class MLCApiHomeBase extends MLCApiClassBase{
	public function __construct(){
		MLCApiAuthDriver::Authenticate(false);
	}
	
    public function ApiApplication(){
        return new MLCApiApiApplication();
    }
    
    public function ApiApplicationPermissionLevel_tpcd(){
        return new MLCApiApiApplicationPermissionLevel_tpcd();
    }
    
    public function ApiApplicationStatus_tpcd(){
        return new MLCApiApiApplicationStatus_tpcd();
    }
    
    public function ApiCall(){
        return new MLCApiApiCall();
    }
    
    public function ApiDeveloper(){
        return new MLCApiApiDeveloper();
    }
    
    public function ApiRequestToken(){
        return new MLCApiApiRequestToken();
    }
    
    public function ApiUserPermission(){
        return new MLCApiApiUserPermission();
    }
    
    public function ApiUserPermissionType(){
        return new MLCApiApiUserPermissionType();
    }
    
    public function Bartender(){
        return new MLCApiBartender();
    }
    
    public function BartenderVenue(){
        return new MLCApiBartenderVenue();
    }
    
    public function Player(){
        return new MLCApiPlayer();
    }
    
    public function PlayerApp(){
        return new MLCApiPlayerApp();
    }
    
    public function Venu(){
        return new MLCApiVenu();
    }
    
}

MLCApplicationBase::$arrClassFiles['MLCApiApiApplication'] = __MODEL_APP_API__ . '/MLCApiApiApplication.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiApplicationObject'] = __MODEL_APP_API__ . '/MLCApiApiApplicationObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiApplicationPermissionLevel_tpcd'] = __MODEL_APP_API__ . '/MLCApiApiApplicationPermissionLevel_tpcd.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiApplicationPermissionLevel_tpcdObject'] = __MODEL_APP_API__ . '/MLCApiApiApplicationPermissionLevel_tpcdObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiApplicationStatus_tpcd'] = __MODEL_APP_API__ . '/MLCApiApiApplicationStatus_tpcd.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiApplicationStatus_tpcdObject'] = __MODEL_APP_API__ . '/MLCApiApiApplicationStatus_tpcdObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiCall'] = __MODEL_APP_API__ . '/MLCApiApiCall.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiCallObject'] = __MODEL_APP_API__ . '/MLCApiApiCallObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiDeveloper'] = __MODEL_APP_API__ . '/MLCApiApiDeveloper.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiDeveloperObject'] = __MODEL_APP_API__ . '/MLCApiApiDeveloperObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiRequestToken'] = __MODEL_APP_API__ . '/MLCApiApiRequestToken.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiRequestTokenObject'] = __MODEL_APP_API__ . '/MLCApiApiRequestTokenObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiUserPermission'] = __MODEL_APP_API__ . '/MLCApiApiUserPermission.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiUserPermissionObject'] = __MODEL_APP_API__ . '/MLCApiApiUserPermissionObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiApiUserPermissionType'] = __MODEL_APP_API__ . '/MLCApiApiUserPermissionType.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiApiUserPermissionTypeObject'] = __MODEL_APP_API__ . '/MLCApiApiUserPermissionTypeObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiBartender'] = __MODEL_APP_API__ . '/MLCApiBartender.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiBartenderObject'] = __MODEL_APP_API__ . '/MLCApiBartenderObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiBartenderVenue'] = __MODEL_APP_API__ . '/MLCApiBartenderVenue.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiBartenderVenueObject'] = __MODEL_APP_API__ . '/MLCApiBartenderVenueObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiPlayer'] = __MODEL_APP_API__ . '/MLCApiPlayer.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiPlayerObject'] = __MODEL_APP_API__ . '/MLCApiPlayerObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiPlayerApp'] = __MODEL_APP_API__ . '/MLCApiPlayerApp.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiPlayerAppObject'] = __MODEL_APP_API__ . '/MLCApiPlayerAppObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCApiVenu'] = __MODEL_APP_API__ . '/MLCApiVenu.class.php';
MLCApplicationBase::$arrClassFiles['MLCApiVenuObject'] = __MODEL_APP_API__ . '/MLCApiVenuObject.class.php';


?>