<?php
class MLCEntityModelUserBase extends MLCEntityModelClassBase{
	protected $strClassName = 'User';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objUser = new User();
		}else{
        	$objUser = User::LoadById($strName);
		}
      
        if(!is_null($objUser)){
        	return new MLCEntityModelUserObject($objUser);
        }else{
            throw new MLCEntityModelException("No User found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(User::LoadAll()->GetCollection());
         $objResponse->BodyType = 'User';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>