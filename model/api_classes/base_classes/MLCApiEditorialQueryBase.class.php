<?php
class MLCApiEditorialQueryBase extends MLCApiClassBase{
	protected $strClassName = 'EditorialQuery';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objEditorialQuery = EditorialQuery::LoadById($strName);
	
      
        if(!is_null($objEditorialQuery)){
        	return new MLCApiEditorialQueryObject($objEditorialQuery);
        }else{
            throw new MLCApiException("No EditorialQuery found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>