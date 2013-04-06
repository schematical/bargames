<?php
class MLCApiAuthUserSettingObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'AuthUserSetting';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('AuthUser'):
					//Load 
					$objAuthUser = $this->GetEntity()->IdUser;
					return new MLCApiAuthUserObject($objIdUser);
			    break;
			    
		       	case('AuthUserSettingTypeCd_tpcd'):
					//Load 
					$objAuthUserSettingTypeCd_tpcd = $this->GetEntity()->IdUserSettingTypeCd;
					return new MLCApiAuthUserSettingTypeCd_tpcdObject($objIdUserSettingTypeCd);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}