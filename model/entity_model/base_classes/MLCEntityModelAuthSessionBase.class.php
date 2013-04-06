<?php
class MLCEntityModelAuthSessionBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthSession';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthSession = new AuthSession();
		}else{
        	$objAuthSession = AuthSession::LoadById($strName);
		}
      
        if(!is_null($objAuthSession)){
        	return new MLCEntityModelAuthSessionObject($objAuthSession);
        }else{
            throw new MLCEntityModelException("No AuthSession found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthSession::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthSession';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>