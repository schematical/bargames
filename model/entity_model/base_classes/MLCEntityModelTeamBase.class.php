<?php
class MLCEntityModelTeamBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Team';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objTeam = new Team();
		}else{
        	$objTeam = Team::LoadById($strName);
		}
      
        if(!is_null($objTeam)){
        	return new MLCEntityModelTeamObject($objTeam);
        }else{
            throw new MLCEntityModelException("No Team found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Team::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Team';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>