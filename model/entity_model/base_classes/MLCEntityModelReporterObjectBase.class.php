<?php
class MLCEntityModelReporterObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Reporter';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('EditorialQuerys'):
	       		$arrEditorialQuerys = EditorialQuery::LoadCollByIdReporter($this->GetEntity()->idReporter)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrEditorialQuerys);
	       		$objResponse->BodyType = 'EditorialQuery';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}