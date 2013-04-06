<?php
class MLCApiUserBase extends MLCApiClassBase{
	protected $strClassName = 'User';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objUser = User::LoadById($strName);
	
      
        if(!is_null($objUser)){
        	return new MLCApiUserObject($objUser);
        }else{
            throw new MLCApiException("No User found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>