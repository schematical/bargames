<?php
class MLCApiBartenderBase extends MLCApiClassBase{
	protected $strClassName = 'Bartender';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objBartender = Bartender::LoadById($strName);
	
      
        if(!is_null($objBartender)){
        	return new MLCApiBartenderObject($objBartender);
        }else{
            throw new MLCApiException("No Bartender found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>