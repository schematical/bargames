<?php
class MLCApiSpinOptionBase extends MLCApiClassBase{
	protected $strClassName = 'SpinOption';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objSpinOption = SpinOption::LoadById($strName);
	
      
        if(!is_null($objSpinOption)){
        	return new MLCApiSpinOptionObject($objSpinOption);
        }else{
            throw new MLCApiException("No SpinOption found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>