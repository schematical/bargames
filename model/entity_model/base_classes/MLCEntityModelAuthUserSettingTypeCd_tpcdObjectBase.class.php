<?php
class MLCEntityModelAuthUserSettingTypeCd_tpcdObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'AuthUserSettingTypeCd_tpcd';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('AuthUserSettings'):
	       		$arrAuthUserSettings = AuthUserSetting::LoadCollByIdUserSettingTypeCd($this->GetEntity()->idUserSettingTypeCd)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAuthUserSettings);
	       		$objResponse->BodyType = 'AuthUserSetting';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}