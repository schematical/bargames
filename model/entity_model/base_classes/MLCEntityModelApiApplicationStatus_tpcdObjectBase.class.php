<?php
class MLCEntityModelApiApplicationStatus_tpcdObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiApplicationStatus_tpcd';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('ApiApplications'):
	       		$arrApiApplications = ApiApplication::LoadCollByIdApplicationStatusTypeCd($this->GetEntity()->idApplicationStatusTypeCd)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrApiApplications);
	       		$objResponse->BodyType = 'ApiApplication';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}