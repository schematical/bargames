<?php
class MLCEntityModelReporterBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Reporter';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objReporter = new Reporter();
		}else{
        	$objReporter = Reporter::LoadById($strName);
		}
      
        if(!is_null($objReporter)){
        	return new MLCEntityModelReporterObject($objReporter);
        }else{
            throw new MLCEntityModelException("No Reporter found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Reporter::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Reporter';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>