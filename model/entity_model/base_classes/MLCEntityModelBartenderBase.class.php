<?php
class MLCEntityModelBartenderBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Bartender';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objBartender = new Bartender();
		}else{
        	$objBartender = Bartender::LoadById($strName);
		}
      
        if(!is_null($objBartender)){
        	return new MLCEntityModelBartenderObject($objBartender);
        }else{
            throw new MLCEntityModelException("No Bartender found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Bartender::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Bartender';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>