<?php
class MLCEntityModelRoundBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Round';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objRound = new Round();
		}else{
        	$objRound = Round::LoadById($strName);
		}
      
        if(!is_null($objRound)){
        	return new MLCEntityModelRoundObject($objRound);
        }else{
            throw new MLCEntityModelException("No Round found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Round::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Round';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>