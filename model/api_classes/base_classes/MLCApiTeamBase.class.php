<?php
class MLCApiTeamBase extends MLCApiClassBase{
	protected $strClassName = 'Team';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objTeam = Team::LoadById($strName);
	
      
        if(!is_null($objTeam)){
        	return new MLCApiTeamObject($objTeam);
        }else{
            throw new MLCApiException("No Team found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>