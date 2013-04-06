<?php
class PlayerAppEditPanelBase extends MJaxPanel{
	protected $objPlayerApp = null;
    
    	
    	public $intIdPlayerApp = null;
   		
    	
	
    	
    	
    	public $txtIdPlayer = null;
   		
	
    	
    	
    	public $txtIdApp = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
   		public $lnkViewParentPlayerApp = null;
	
   		public $lnkViewParentPlayerApp = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objPlayerApp = null){
		parent::__construct($objParentControl);
		$this->objPlayerApp = $objPlayerApp;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/PlayerAppEditPanelBase.tpl.php';
		
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
		if(is_null($this->objPlayerApp)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdPlayer = new MJaxTextBox($this);
	  		$this->txtIdPlayer->Name = 'idPlayer';
  		
	     
	  	
	  		$this->txtIdApp = new MJaxTextBox($this);
	  		$this->txtIdApp->Name = 'idApp';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objPlayerApp)){
	     
	  	
  		
  			$this->intIdPlayerApp = $this->objPlayerApp->idPlayerApp;
  		
  		
	     
	  		  		
	  		$this->txtIdPlayer->Text = $this->objPlayerApp->idPlayer;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdApp->Text = $this->objPlayerApp->idApp;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objPlayerApp->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objPlayerApp->idPlayer)){
   			$this->lnkViewParentPlayerApp = new MJaxLinkButton($this);
   			$this->lnkViewParentPlayerApp->Text = 'View Player';
   			$this->lnkViewParentPlayerApp->Href = __ENTITY_MODEL_DIR__ . '/Player/' . $this->objPlayerApp->idPlayer;  
   		}
	  
  		if(!is_null($this->objPlayerApp->idApp)){
   			$this->lnkViewParentPlayerApp = new MJaxLinkButton($this);
   			$this->lnkViewParentPlayerApp->Text = 'View ApiApplication';
   			$this->lnkViewParentPlayerApp->Href = __ENTITY_MODEL_DIR__ . '/ApiApplication/' . $this->objPlayerApp->idApp;  
   		}
	  
	 // if(!is_null($this->objPlayerApp->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objPlayerApp)){
			//Create a new one
			$this->objPlayerApp = new PlayerApp();
		}

  		  
  		
		  
  		 
      	$this->objPlayerApp->idPlayer = $this->txtIdPlayer->Text;
		
		  
  		 
      	$this->objPlayerApp->idApp = $this->txtIdApp->Text;
		
		  
  		 
      	$this->objPlayerApp->creDate = $this->txtCreDate->Text;
		
		
		$this->objPlayerApp->Save();
  	}
  	public function btnDelete_click(){
  		$this->objPlayerApp->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objPlayerApp);
  	}
  	
}
?>