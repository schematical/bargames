<?php
class MLCEntityModelEditorialQueryBase extends MLCEntityModelClassBase{
	protected $strClassName = 'EditorialQuery';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objEditorialQuery = new EditorialQuery();
		}else{
        	$objEditorialQuery = EditorialQuery::LoadById($strName);
		}
      
        if(!is_null($objEditorialQuery)){
        	return new MLCEntityModelEditorialQueryObject($objEditorialQuery);
        }else{
            throw new MLCEntityModelException("No EditorialQuery found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(EditorialQuery::LoadAll()->GetCollection());
         $objResponse->BodyType = 'EditorialQuery';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>