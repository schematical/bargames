<?php
class MLCEntityModelAuthUserSettingObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'AuthUserSetting';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('AuthUser'):
				//Load 
				$objAuthUser = $this->GetEntity()->IdUser;
				return new MLCEntityModelAuthUserObject($objIdUser);
		    break;
		    
	       	case('AuthUserSettingTypeCd_tpcd'):
				//Load 
				$objAuthUserSettingTypeCd_tpcd = $this->GetEntity()->IdUserSettingTypeCd;
				return new MLCEntityModelAuthUserSettingTypeCd_tpcdObject($objIdUserSettingTypeCd);
		    break;
		    
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}