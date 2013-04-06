<?php
class TrackingEventEditPanelBase extends MJaxPanel{
	protected $objTrackingEvent = null;
    
    	
    	public $intIdTrackingEvent = null;
   		
    	
	
    	
    	
    	public $txtName = null;
   		
	
    	
    	
    	public $txtValue = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtIdSession = null;
   		
	
    	
    	
    	public $txtIdApplication = null;
   		
	
    	
    	
    	public $txtApp = null;
   		
	
    	
    	
    	public $txtForm = null;
   		
	
    	
    	
    	public $txtControlId = null;
   		
	
    	
    	
    	public $txtText = null;
   		
	
    	
    	
    	public $txtEvent = null;
   		
	
    	
    	
    	public $txtRef = null;
   		
	
    	
    	
    	public $txtUtma = null;
   		
	
	
   		public $lnkViewParentTrackingEvent = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objTrackingEvent = null){
		parent::__construct($objParentControl);
		$this->objTrackingEvent = $objTrackingEvent;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/TrackingEventEditPanelBase.tpl.php';
		
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
		if(is_null($this->objTrackingEvent)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtName = new MJaxTextBox($this);
	  		$this->txtName->Name = 'name';
  		
	     
	  	
	  		$this->txtValue = new MJaxTextBox($this);
	  		$this->txtValue->Name = 'value';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtIdSession = new MJaxTextBox($this);
	  		$this->txtIdSession->Name = 'idSession';
  		
	     
	  	
	  		$this->txtIdApplication = new MJaxTextBox($this);
	  		$this->txtIdApplication->Name = 'idApplication';
  		
	     
	  	
	  		$this->txtApp = new MJaxTextBox($this);
	  		$this->txtApp->Name = 'app';
  		
	     
	  	
	  		$this->txtForm = new MJaxTextBox($this);
	  		$this->txtForm->Name = 'form';
  		
	     
	  	
	  		$this->txtControlId = new MJaxTextBox($this);
	  		$this->txtControlId->Name = 'controlId';
  		
	     
	  	
	  		$this->txtText = new MJaxTextBox($this);
	  		$this->txtText->Name = 'text';
  		
	     
	  	
	  		$this->txtEvent = new MJaxTextBox($this);
	  		$this->txtEvent->Name = 'event';
  		
	     
	  	
	  		$this->txtRef = new MJaxTextBox($this);
	  		$this->txtRef->Name = 'ref';
  		
	     
	  	
	  		$this->txtUtma = new MJaxTextBox($this);
	  		$this->txtUtma->Name = 'utma';
  		
	  
	  if(!is_null($this->objTrackingEvent)){
	     
	  	
  		
  			$this->intIdTrackingEvent = $this->objTrackingEvent->idTrackingEvent;
  		
  		
	     
	  		  		
	  		$this->txtName->Text = $this->objTrackingEvent->name;
  		
  		
  		
	     
	  		  		
	  		$this->txtValue->Text = $this->objTrackingEvent->value;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objTrackingEvent->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objTrackingEvent->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdSession->Text = $this->objTrackingEvent->idSession;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdApplication->Text = $this->objTrackingEvent->idApplication;
  		
  		
  		
	     
	  		  		
	  		$this->txtApp->Text = $this->objTrackingEvent->app;
  		
  		
  		
	     
	  		  		
	  		$this->txtForm->Text = $this->objTrackingEvent->form;
  		
  		
  		
	     
	  		  		
	  		$this->txtControlId->Text = $this->objTrackingEvent->controlId;
  		
  		
  		
	     
	  		  		
	  		$this->txtText->Text = $this->objTrackingEvent->text;
  		
  		
  		
	     
	  		  		
	  		$this->txtEvent->Text = $this->objTrackingEvent->event;
  		
  		
  		
	     
	  		  		
	  		$this->txtRef->Text = $this->objTrackingEvent->ref;
  		
  		
  		
	     
	  		  		
	  		$this->txtUtma->Text = $this->objTrackingEvent->utma;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objTrackingEvent->idSession)){
   			$this->lnkViewParentTrackingEvent = new MJaxLinkButton($this);
   			$this->lnkViewParentTrackingEvent->Text = 'View AuthSession';
   			$this->lnkViewParentTrackingEvent->Href = __ENTITY_MODEL_DIR__ . '/AuthSession/' . $this->objTrackingEvent->idSession;  
   		}
	  
	 // if(!is_null($this->objTrackingEvent->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objTrackingEvent)){
			//Create a new one
			$this->objTrackingEvent = new TrackingEvent();
		}

  		  
  		
		  
  		 
      	$this->objTrackingEvent->name = $this->txtName->Text;
		
		  
  		 
      	$this->objTrackingEvent->value = $this->txtValue->Text;
		
		  
  		 
      	$this->objTrackingEvent->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objTrackingEvent->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objTrackingEvent->idSession = $this->txtIdSession->Text;
		
		  
  		 
      	$this->objTrackingEvent->idApplication = $this->txtIdApplication->Text;
		
		  
  		 
      	$this->objTrackingEvent->app = $this->txtApp->Text;
		
		  
  		 
      	$this->objTrackingEvent->form = $this->txtForm->Text;
		
		  
  		 
      	$this->objTrackingEvent->controlId = $this->txtControlId->Text;
		
		  
  		 
      	$this->objTrackingEvent->text = $this->txtText->Text;
		
		  
  		 
      	$this->objTrackingEvent->event = $this->txtEvent->Text;
		
		  
  		 
      	$this->objTrackingEvent->ref = $this->txtRef->Text;
		
		  
  		 
      	$this->objTrackingEvent->utma = $this->txtUtma->Text;
		
		
		$this->objTrackingEvent->Save();
  	}
  	public function btnDelete_click(){
  		$this->objTrackingEvent->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objTrackingEvent);
  	}
  	
}
?>