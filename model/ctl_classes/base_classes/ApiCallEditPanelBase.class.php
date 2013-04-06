<?php
class ApiCallEditPanelBase extends MJaxPanel{
	protected $objApiCall = null;
    
    	
    	public $intIdApiCall = null;
   		
    	
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtExeTime = null;
   		
	
    	
    	
    	public $txtRequestUri = null;
   		
	
    	
    	
    	public $txtPostData = null;
   		
	
    	
    	
    	public $txtResponseData = null;
   		
	
    	
    	
    	public $txtIdApplication = null;
   		
	
    	
    	
    	public $txtIdTrackingEvent = null;
   		
	
    	
    	
    	public $txtUser_agent = null;
   		
	
    	
    	
    	public $txtLat = null;
   		
	
    	
    	
    	public $txtLng = null;
   		
	
	
   		public $lnkViewParentApiCall = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiCall = null){
		parent::__construct($objParentControl);
		$this->objApiCall = $objApiCall;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiCallEditPanelBase.tpl.php';
		
		$this->CreateFieldControls();
		$this->CreateContentControls();
		$this->CreateReferenceControls();
		
	}
	public function CreateContentControls(){
		$this->btnSave = new MJaxButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnSave_click'));
		
		
		$this->btnDelete = new MJaxButton($this);
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnDelete_click'));
		if(is_null($this->objApiCall)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtExeTime = new MJaxTextBox($this);
	  		$this->txtExeTime->Name = 'exeTime';
  		
	     
	  	
	  		$this->txtRequestUri = new MJaxTextBox($this);
	  		$this->txtRequestUri->Name = 'requestUri';
  		
	     
	  	
	  		$this->txtPostData = new MJaxTextBox($this);
	  		$this->txtPostData->Name = 'postData';
  		
	     
	  	
	  		$this->txtResponseData = new MJaxTextBox($this);
	  		$this->txtResponseData->Name = 'responseData';
  		
	     
	  	
	  		$this->txtIdApplication = new MJaxTextBox($this);
	  		$this->txtIdApplication->Name = 'idApplication';
  		
	     
	  	
	  		$this->txtIdTrackingEvent = new MJaxTextBox($this);
	  		$this->txtIdTrackingEvent->Name = 'idTrackingEvent';
  		
	     
	  	
	  		$this->txtUser_agent = new MJaxTextBox($this);
	  		$this->txtUser_agent->Name = 'user_agent';
  		
	     
	  	
	  		$this->txtLat = new MJaxTextBox($this);
	  		$this->txtLat->Name = 'lat';
  		
	     
	  	
	  		$this->txtLng = new MJaxTextBox($this);
	  		$this->txtLng->Name = 'lng';
  		
	  
	  if(!is_null($this->objApiCall)){
	     
	  	
  		
  			$this->intIdApiCall = $this->objApiCall->idApiCall;
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objApiCall->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtExeTime->Text = $this->objApiCall->exeTime;
  		
  		
  		
	     
	  		  		
	  		$this->txtRequestUri->Text = $this->objApiCall->requestUri;
  		
  		
  		
	     
	  		  		
	  		$this->txtPostData->Text = $this->objApiCall->postData;
  		
  		
  		
	     
	  		  		
	  		$this->txtResponseData->Text = $this->objApiCall->responseData;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdApplication->Text = $this->objApiCall->idApplication;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdTrackingEvent->Text = $this->objApiCall->idTrackingEvent;
  		
  		
  		
	     
	  		  		
	  		$this->txtUser_agent->Text = $this->objApiCall->user_agent;
  		
  		
  		
	     
	  		  		
	  		$this->txtLat->Text = $this->objApiCall->lat;
  		
  		
  		
	     
	  		  		
	  		$this->txtLng->Text = $this->objApiCall->lng;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objApiCall->idApplication)){
   			$this->lnkViewParentApiCall = new MJaxLinkButton($this);
   			$this->lnkViewParentApiCall->Text = 'View ApiApplication';
   			$this->lnkViewParentApiCall->Href = __ENTITY_MODEL_DIR__ . '/ApiApplication/' . $this->objApiCall->idApplication;  
   		}
	  
	 // if(!is_null($this->objApiCall->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiCall)){
			//Create a new one
			$this->objApiCall = new ApiCall();
		}

  		  
  		
		  
  		 
      	$this->objApiCall->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objApiCall->exeTime = $this->txtExeTime->Text;
		
		  
  		 
      	$this->objApiCall->requestUri = $this->txtRequestUri->Text;
		
		  
  		 
      	$this->objApiCall->postData = $this->txtPostData->Text;
		
		  
  		 
      	$this->objApiCall->responseData = $this->txtResponseData->Text;
		
		  
  		 
      	$this->objApiCall->idApplication = $this->txtIdApplication->Text;
		
		  
  		 
      	$this->objApiCall->idTrackingEvent = $this->txtIdTrackingEvent->Text;
		
		  
  		 
      	$this->objApiCall->user_agent = $this->txtUser_agent->Text;
		
		  
  		 
      	$this->objApiCall->lat = $this->txtLat->Text;
		
		  
  		 
      	$this->objApiCall->lng = $this->txtLng->Text;
		
		
		$this->objApiCall->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiCall->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiCall);
  	}
  	
}
?>