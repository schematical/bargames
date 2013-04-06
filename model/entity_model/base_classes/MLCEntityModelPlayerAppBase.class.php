<?php
class MLCEntityModelPlayerAppBase extends MLCEntityModelClassBase{
	protected $strClassName = 'PlayerApp';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objPlayerApp = new PlayerApp();
		}else{
        	$objPlayerApp = PlayerApp::LoadById($strName);
		}
      
        if(!is_null($objPlayerApp)){
        	return new MLCEntityModelPlayerAppObject($objPlayerApp);
        }else{
            throw new MLCEntityModelException("No PlayerApp found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(PlayerApp::LoadAll()->GetCollection());
         $objResponse->BodyType = 'PlayerApp';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>