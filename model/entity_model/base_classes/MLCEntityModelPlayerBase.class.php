<?php
class MLCEntityModelPlayerBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Player';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objPlayer = new Player();
		}else{
        	$objPlayer = Player::LoadById($strName);
		}
      
        if(!is_null($objPlayer)){
        	return new MLCEntityModelPlayerObject($objPlayer);
        }else{
            throw new MLCEntityModelException("No Player found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Player::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Player';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>