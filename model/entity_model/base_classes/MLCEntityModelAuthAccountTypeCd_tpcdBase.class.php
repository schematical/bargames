<?php
class MLCEntityModelAuthAccountTypeCd_tpcdBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthAccountTypeCd_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthAccountTypeCd_tpcd = new AuthAccountTypeCd_tpcd();
		}else{
        	$objAuthAccountTypeCd_tpcd = AuthAccountTypeCd_tpcd::LoadById($strName);
		}
      
        if(!is_null($objAuthAccountTypeCd_tpcd)){
        	return new MLCEntityModelAuthAccountTypeCd_tpcdObject($objAuthAccountTypeCd_tpcd);
        }else{
            throw new MLCEntityModelException("No AuthAccountTypeCd_tpcd found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthAccountTypeCd_tpcd::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthAccountTypeCd_tpcd';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>