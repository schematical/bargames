<?php
class AuthSessionEditPanelBase extends MJaxPanel{
	protected $objAuthSession = null;
    
    	
    	public $intIdSession = null;
   		
    	
	
    	
    	
    	public $txtStartDate = null;
   		
	
    	
    	
    	public $txtEndDate = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtSessionKey = null;
   		
	
    	
    	
    	public $txtIpAddress = null;
   		
	
	
   		public $lnkViewParentAuthSession = null;
	
	
  		public $lnkViewChildTrackingEvent = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAuthSession = null){
		parent::__construct($objParentControl);
		$this->objAuthSession = $objAuthSession;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/AuthSessionEditPanelBase.tpl.php';
		
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
		if(is_null($this->objAuthSession)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtStartDate = new MJaxTextBox($this);
	  		$this->txtStartDate->Name = 'startDate';
  		
	     
	  	
	  		$this->txtEndDate = new MJaxTextBox($this);
	  		$this->txtEndDate->Name = 'endDate';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtSessionKey = new MJaxTextBox($this);
	  		$this->txtSessionKey->Name = 'sessionKey';
  		
	     
	  	
	  		$this->txtIpAddress = new MJaxTextBox($this);
	  		$this->txtIpAddress->Name = 'ipAddress';
  		
	  
	  if(!is_null($this->objAuthSession)){
	     
	  	
  		
  			$this->intIdSession = $this->objAuthSession->idSession;
  		
  		
	     
	  		  		
	  		$this->txtStartDate->Text = $this->objAuthSession->startDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtEndDate->Text = $this->objAuthSession->endDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objAuthSession->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtSessionKey->Text = $this->objAuthSession->sessionKey;
  		
  		
  		
	     
	  		  		
	  		$this->txtIpAddress->Text = $this->objAuthSession->ipAddress;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objAuthSession->idUser)){
   			$this->lnkViewParentAuthSession = new MJaxLinkButton($this);
   			$this->lnkViewParentAuthSession->Text = 'View AuthUser';
   			$this->lnkViewParentAuthSession->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objAuthSession->idUser;  
   		}
	  
	 // if(!is_null($this->objAuthSession->i)){
	   
  		
		$this->lnkViewChildTrackingEvent = new MJaxLinkButton($this);
		$this->lnkViewChildTrackingEvent->Text = 'View TrackingEvents';
		$this->lnkViewChildTrackingEvent->Href = __ENTITY_MODEL_DIR__ . '/AuthSession/' . $this->objAuthSession->idSession . '/TrackingEvents';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAuthSession)){
			//Create a new one
			$this->objAuthSession = new AuthSession();
		}

  		  
  		
		  
  		 
      	$this->objAuthSession->startDate = $this->txtStartDate->Text;
		
		  
  		 
      	$this->objAuthSession->endDate = $this->txtEndDate->Text;
		
		  
  		 
      	$this->objAuthSession->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objAuthSession->sessionKey = $this->txtSessionKey->Text;
		
		  
  		 
      	$this->objAuthSession->ipAddress = $this->txtIpAddress->Text;
		
		
		$this->objAuthSession->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAuthSession->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAuthSession);
  	}
  	
}
?>