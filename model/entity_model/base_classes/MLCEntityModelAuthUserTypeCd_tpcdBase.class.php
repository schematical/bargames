<?php
class MLCEntityModelAuthUserTypeCd_tpcdBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthUserTypeCd_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthUserTypeCd_tpcd = new AuthUserTypeCd_tpcd();
		}else{
        	$objAuthUserTypeCd_tpcd = AuthUserTypeCd_tpcd::LoadById($strName);
		}
      
        if(!is_null($objAuthUserTypeCd_tpcd)){
        	return new MLCEntityModelAuthUserTypeCd_tpcdObject($objAuthUserTypeCd_tpcd);
        }else{
            throw new MLCEntityModelException("No AuthUserTypeCd_tpcd found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthUserTypeCd_tpcd::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthUserTypeCd_tpcd';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>