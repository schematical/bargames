<?php
class MLCApiAuthUserBase extends MLCApiClassBase{
	protected $strClassName = 'AuthUser';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAuthUser = AuthUser::LoadById($strName);
	
      
        if(!is_null($objAuthUser)){
        	return new MLCApiAuthUserObject($objAuthUser);
        }else{
            throw new MLCApiException("No AuthUser found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>