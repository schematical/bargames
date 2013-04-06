<?php
class MLCEntityModelAuthUserSettingTypeCd_tpcdBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthUserSettingTypeCd_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthUserSettingTypeCd_tpcd = new AuthUserSettingTypeCd_tpcd();
		}else{
        	$objAuthUserSettingTypeCd_tpcd = AuthUserSettingTypeCd_tpcd::LoadById($strName);
		}
      
        if(!is_null($objAuthUserSettingTypeCd_tpcd)){
        	return new MLCEntityModelAuthUserSettingTypeCd_tpcdObject($objAuthUserSettingTypeCd_tpcd);
        }else{
            throw new MLCEntityModelException("No AuthUserSettingTypeCd_tpcd found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthUserSettingTypeCd_tpcd::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthUserSettingTypeCd_tpcd';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>