<?php
class MLCEntityModelHomeBase extends MLCEntityModelClassBase{
	public function __construct(){
		//MLCEntityModelAuthDriver::Authenticate(false);
	}
	
    public function ApiApplication(){
        return new MLCEntityModelApiApplication();
    }
    
    public function ApiApplicationPermissionLevel_tpcd(){
        return new MLCEntityModelApiApplicationPermissionLevel_tpcd();
    }
    
    public function ApiApplicationStatus_tpcd(){
        return new MLCEntityModelApiApplicationStatus_tpcd();
    }
    
    public function ApiCall(){
        return new MLCEntityModelApiCall();
    }
    
    public function ApiDeveloper(){
        return new MLCEntityModelApiDeveloper();
    }
    
    public function ApiRequestToken(){
        return new MLCEntityModelApiRequestToken();
    }
    
    public function ApiUserPermission(){
        return new MLCEntityModelApiUserPermission();
    }
    
    public function ApiUserPermissionType(){
        return new MLCEntityModelApiUserPermissionType();
    }
    
    public function Bartender(){
        return new MLCEntityModelBartender();
    }
    
    public function BartenderVenue(){
        return new MLCEntityModelBartenderVenue();
    }
    
    public function Player(){
        return new MLCEntityModelPlayer();
    }
    
    public function PlayerApp(){
        return new MLCEntityModelPlayerApp();
    }
    
    public function Venu(){
        return new MLCEntityModelVenu();
    }
    
}

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiApplication'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiApplication.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiApplicationObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiApplicationObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiApplicationPermissionLevel_tpcd'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiApplicationPermissionLevel_tpcd.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiApplicationPermissionLevel_tpcdObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiApplicationPermissionLevel_tpcdObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiApplicationStatus_tpcd'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiApplicationStatus_tpcd.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiApplicationStatus_tpcdObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiApplicationStatus_tpcdObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiCall'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiCall.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiCallObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiCallObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiDeveloper'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiDeveloper.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiDeveloperObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiDeveloperObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiRequestToken'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiRequestToken.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiRequestTokenObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiRequestTokenObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiUserPermission'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiUserPermission.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiUserPermissionObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiUserPermissionObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelApiUserPermissionType'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiUserPermissionType.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelApiUserPermissionTypeObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelApiUserPermissionTypeObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelBartender'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelBartender.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelBartenderObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelBartenderObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelBartenderVenue'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelBartenderVenue.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelBartenderVenueObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelBartenderVenueObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelPlayer'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelPlayer.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelPlayerObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelPlayerObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelPlayerApp'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelPlayerApp.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelPlayerAppObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelPlayerAppObject.class.php';

MLCApplicationBase::$arrClassFiles['MLCEntityModelVenu'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelVenu.class.php';
MLCApplicationBase::$arrClassFiles['MLCEntityModelVenuObject'] = __MODEL_APP_ENTITY_MODEL__ . '/MLCEntityModelVenuObject.class.php';


?>