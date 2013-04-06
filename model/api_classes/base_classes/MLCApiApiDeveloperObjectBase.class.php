<?php
class MLCApiApiDeveloperObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiDeveloper';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('apiapplications'):
		       		$arrApiApplications = ApiApplication::LoadCollByIdDeveloper($this->GetEntity()->idDeveloper)->GetCollection();
		       		return new MLCApiResponse($arrApiApplications);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}