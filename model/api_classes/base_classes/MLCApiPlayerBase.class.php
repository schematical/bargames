<?php
class MLCApiPlayerBase extends MLCApiClassBase{
	protected $strClassName = 'Player';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objPlayer = Player::LoadById($strName);
	
      
        if(!is_null($objPlayer)){
        	return new MLCApiPlayerObject($objPlayer);
        }else{
            throw new MLCApiException("No Player found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>