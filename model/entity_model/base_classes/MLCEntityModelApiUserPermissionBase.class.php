<?php
class MLCEntityModelApiUserPermissionBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiUserPermission';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiUserPermission = new ApiUserPermission();
		}else{
        	$objApiUserPermission = ApiUserPermission::LoadById($strName);
		}
      
        if(!is_null($objApiUserPermission)){
        	return new MLCEntityModelApiUserPermissionObject($objApiUserPermission);
        }else{
            throw new MLCEntityModelException("No ApiUserPermission found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiUserPermission::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiUserPermission';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>