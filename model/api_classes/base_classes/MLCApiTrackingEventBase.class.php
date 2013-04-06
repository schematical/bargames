<?php
class MLCApiTrackingEventBase extends MLCApiClassBase{
	protected $strClassName = 'TrackingEvent';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objTrackingEvent = TrackingEvent::LoadById($strName);
	
      
        if(!is_null($objTrackingEvent)){
        	return new MLCApiTrackingEventObject($objTrackingEvent);
        }else{
            throw new MLCApiException("No TrackingEvent found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>