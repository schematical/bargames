<?php
class MLCEntityModelVenuBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Venu';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objVenu = new Venu();
		}else{
        	$objVenu = Venu::LoadById($strName);
		}
      
        if(!is_null($objVenu)){
        	return new MLCEntityModelVenuObject($objVenu);
        }else{
            throw new MLCEntityModelException("No Venu found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Venu::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Venu';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>