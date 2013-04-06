<?php
class MLCEntityModelAuthUserSettingBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthUserSetting';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthUserSetting = new AuthUserSetting();
		}else{
        	$objAuthUserSetting = AuthUserSetting::LoadById($strName);
		}
      
        if(!is_null($objAuthUserSetting)){
        	return new MLCEntityModelAuthUserSettingObject($objAuthUserSetting);
        }else{
            throw new MLCEntityModelException("No AuthUserSetting found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthUserSetting::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthUserSetting';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>