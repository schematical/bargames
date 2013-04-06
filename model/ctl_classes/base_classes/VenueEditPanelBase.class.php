<?php
class VenueEditPanelBase extends MJaxPanel{
	protected $objVenue = null;
    
    	
    	public $intIdVenue = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtHash = null;
   		
	
	
	
  		public $lnkViewChildBartenderVenue = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objVenue = null){
		parent::__construct($objParentControl);
		$this->objVenue = $objVenue;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/VenueEditPanelBase.tpl.php';
		}
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
		if(is_null($this->objVenue)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtHash = new MJaxTextBox($this);
	  		$this->txtHash->Name = 'hash';
  		
	  
	  if(!is_null($this->objVenue)){
	     
	  	
  		
  			$this->intIdVenue = $this->objVenue->idVenue;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objVenue->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objVenue->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtHash->Text = $this->objVenue->hash;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objVenue->i)){
	   
  		
		$this->lnkViewChildBartenderVenue = new MJaxLinkButton($this);
		$this->lnkViewChildBartenderVenue->Text = 'View BartenderVenues';
		$this->lnkViewChildBartenderVenue->Href = __ENTITY_MODEL_DIR__ . '/Venue/' . $this->objVenue->idVenue . '/BartenderVenues';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objVenue)){
			//Create a new one
			$this->objVenue = new Venue();
		}

  		  
  		
		  
  		 
      	$this->objVenue->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objVenue->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objVenue->hash = $this->txtHash->Text;
		
		
		$this->objVenue->Save();
  	}
  	public function btnDelete_click(){
  		$this->objVenue->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objVenue);
  	}
  	
}
?>