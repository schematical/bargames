<?php
class BartenderVenueEditPanelBase extends MJaxPanel{
	protected $objBartenderVenue = null;
    
    	
    	public $intIdBartenderVenue = null;
   		
    	
	
    	
    	
    	public $txtIdVenue = null;
   		
	
    	
    	
    	public $txtIdBartender = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
   		public $lnkViewParentBartenderVenue = null;
	
   		public $lnkViewParentBartenderVenue = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objBartenderVenue = null){
		parent::__construct($objParentControl);
		$this->objBartenderVenue = $objBartenderVenue;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/BartenderVenueEditPanelBase.tpl.php';
		
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
		if(is_null($this->objBartenderVenue)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdVenue = new MJaxTextBox($this);
	  		$this->txtIdVenue->Name = 'idVenue';
  		
	     
	  	
	  		$this->txtIdBartender = new MJaxTextBox($this);
	  		$this->txtIdBartender->Name = 'idBartender';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objBartenderVenue)){
	     
	  	
  		
  			$this->intIdBartenderVenue = $this->objBartenderVenue->idBartenderVenue;
  		
  		
	     
	  		  		
	  		$this->txtIdVenue->Text = $this->objBartenderVenue->idVenue;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdBartender->Text = $this->objBartenderVenue->idBartender;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objBartenderVenue->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objBartenderVenue->idVenue)){
   			$this->lnkViewParentBartenderVenue = new MJaxLinkButton($this);
   			$this->lnkViewParentBartenderVenue->Text = 'View Venu';
   			$this->lnkViewParentBartenderVenue->Href = __ENTITY_MODEL_DIR__ . '/Venu/' . $this->objBartenderVenue->idVenue;  
   		}
	  
  		if(!is_null($this->objBartenderVenue->idBartender)){
   			$this->lnkViewParentBartenderVenue = new MJaxLinkButton($this);
   			$this->lnkViewParentBartenderVenue->Text = 'View Bartender';
   			$this->lnkViewParentBartenderVenue->Href = __ENTITY_MODEL_DIR__ . '/Bartender/' . $this->objBartenderVenue->idBartender;  
   		}
	  
	 // if(!is_null($this->objBartenderVenue->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objBartenderVenue)){
			//Create a new one
			$this->objBartenderVenue = new BartenderVenue();
		}

  		  
  		
		  
  		 
      	$this->objBartenderVenue->idVenue = $this->txtIdVenue->Text;
		
		  
  		 
      	$this->objBartenderVenue->idBartender = $this->txtIdBartender->Text;
		
		  
  		 
      	$this->objBartenderVenue->creDate = $this->txtCreDate->Text;
		
		
		$this->objBartenderVenue->Save();
  	}
  	public function btnDelete_click(){
  		$this->objBartenderVenue->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objBartenderVenue);
  	}
  	
}
?>