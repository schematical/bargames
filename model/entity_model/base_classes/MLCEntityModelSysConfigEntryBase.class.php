<?php
class MLCEntityModelSysConfigEntryBase extends MLCEntityModelClassBase{
	protected $strClassName = 'SysConfigEntry';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objSysConfigEntry = new SysConfigEntry();
		}else{
        	$objSysConfigEntry = SysConfigEntry::LoadById($strName);
		}
      
        if(!is_null($objSysConfigEntry)){
        	return new MLCEntityModelSysConfigEntryObject($objSysConfigEntry);
        }else{
            throw new MLCEntityModelException("No SysConfigEntry found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(SysConfigEntry::LoadAll()->GetCollection());
         $objResponse->BodyType = 'SysConfigEntry';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>