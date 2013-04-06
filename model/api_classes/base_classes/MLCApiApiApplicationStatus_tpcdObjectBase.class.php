<?php
class MLCApiApiApplicationStatus_tpcdObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiApplicationStatus_tpcd';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('apiapplications'):
		       		$arrApiApplications = ApiApplication::LoadCollByIdApplicationStatusTypeCd($this->GetEntity()->idApplicationStatusTypeCd)->GetCollection();
		       		return new MLCApiResponse($arrApiApplications);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}