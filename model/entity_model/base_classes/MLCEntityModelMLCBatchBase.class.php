<?php
class MLCEntityModelMLCBatchBase extends MLCEntityModelClassBase{
	protected $strClassName = 'MLCBatch';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objMLCBatch = new MLCBatch();
		}else{
        	$objMLCBatch = MLCBatch::LoadById($strName);
		}
      
        if(!is_null($objMLCBatch)){
        	return new MLCEntityModelMLCBatchObject($objMLCBatch);
        }else{
            throw new MLCEntityModelException("No MLCBatch found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(MLCBatch::LoadAll()->GetCollection());
         $objResponse->BodyType = 'MLCBatch';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>