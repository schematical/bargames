<?php
class MLCEntityModelAuthUserBase extends MLCEntityModelClassBase{
	protected $strClassName = 'AuthUser';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAuthUser = new AuthUser();
		}else{
        	$objAuthUser = AuthUser::LoadById($strName);
		}
      
        if(!is_null($objAuthUser)){
        	return new MLCEntityModelAuthUserObject($objAuthUser);
        }else{
            throw new MLCEntityModelException("No AuthUser found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(AuthUser::LoadAll()->GetCollection());
         $objResponse->BodyType = 'AuthUser';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>