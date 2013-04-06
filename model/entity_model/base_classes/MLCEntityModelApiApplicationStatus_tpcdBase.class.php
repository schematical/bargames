<?php
class MLCEntityModelApiApplicationStatus_tpcdBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiApplicationStatus_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiApplicationStatus_tpcd = new ApiApplicationStatus_tpcd();
		}else{
        	$objApiApplicationStatus_tpcd = ApiApplicationStatus_tpcd::LoadById($strName);
		}
      
        if(!is_null($objApiApplicationStatus_tpcd)){
        	return new MLCEntityModelApiApplicationStatus_tpcdObject($objApiApplicationStatus_tpcd);
        }else{
            throw new MLCEntityModelException("No ApiApplicationStatus_tpcd found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiApplicationStatus_tpcd::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiApplicationStatus_tpcd';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>