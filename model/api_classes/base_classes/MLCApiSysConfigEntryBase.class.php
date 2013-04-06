<?php
class MLCApiSysConfigEntryBase extends MLCApiClassBase{
	protected $strClassName = 'SysConfigEntry';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objSysConfigEntry = SysConfigEntry::LoadById($strName);
	
      
        if(!is_null($objSysConfigEntry)){
        	return new MLCApiSysConfigEntryObject($objSysConfigEntry);
        }else{
            throw new MLCApiException("No SysConfigEntry found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>