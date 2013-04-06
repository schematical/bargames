<?php
class MLCEntityModelTrackingEventBase extends MLCEntityModelClassBase{
	protected $strClassName = 'TrackingEvent';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objTrackingEvent = new TrackingEvent();
		}else{
        	$objTrackingEvent = TrackingEvent::LoadById($strName);
		}
      
        if(!is_null($objTrackingEvent)){
        	return new MLCEntityModelTrackingEventObject($objTrackingEvent);
        }else{
            throw new MLCEntityModelException("No TrackingEvent found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(TrackingEvent::LoadAll()->GetCollection());
         $objResponse->BodyType = 'TrackingEvent';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>