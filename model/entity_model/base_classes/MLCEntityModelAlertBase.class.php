<?php
class MLCEntityModelAlertBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Alert';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAlert = new Alert();
		}else{
        	$objAlert = Alert::LoadById($strName);
		}
      
        if(!is_null($objAlert)){
        	return new MLCEntityModelAlertObject($objAlert);
        }else{
            throw new MLCEntityModelException("No Alert found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Alert::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Alert';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>