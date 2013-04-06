<?php
class MLCEntityModelSpinOptionBase extends MLCEntityModelClassBase{
	protected $strClassName = 'SpinOption';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objSpinOption = new SpinOption();
		}else{
        	$objSpinOption = SpinOption::LoadById($strName);
		}
      
        if(!is_null($objSpinOption)){
        	return new MLCEntityModelSpinOptionObject($objSpinOption);
        }else{
            throw new MLCEntityModelException("No SpinOption found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(SpinOption::LoadAll()->GetCollection());
         $objResponse->BodyType = 'SpinOption';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>