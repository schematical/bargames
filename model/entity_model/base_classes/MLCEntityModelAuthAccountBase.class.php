<?php
class MLCEntityModelAuthAccountBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthAccount';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthAccount = new AuthAccount();
		}else{
        	$objAuthAccount = AuthAccount::LoadById($strName);
		}
      
        if(!is_null($objAuthAccount)){
        	return new MLCEntityModelAuthAccountObject($objAuthAccount);
        }else{
            throw new MLCEntityModelException("No AuthAccount found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthAccount::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthAccount';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>