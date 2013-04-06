<?php
class MLCEntityModelApiDeveloperObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiDeveloper';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('ApiApplications'):
	       		$arrApiApplications = ApiApplication::LoadCollByIdDeveloper($this->GetEntity()->idDeveloper)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrApiApplications);
	       		$objResponse->BodyType = 'ApiApplication';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}