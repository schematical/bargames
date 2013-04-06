<?php
class BartenderEditPanelBase extends MJaxPanel{
	protected $objBartender = null;
    
    	
    	public $intIdBartender = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
	
  		public $lnkViewChildBartenderVenue = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objBartender = null){
		parent::__construct($objParentControl);
		$this->objBartender = $objBartender;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/BartenderEditPanelBase.tpl.php';
		
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
		if(is_null($this->objBartender)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objBartender)){
	     
	  	
  		
  			$this->intIdBartender = $this->objBartender->idBartender;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objBartender->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objBartender->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objBartender->i)){
	   
  		
		$this->lnkViewChildBartenderVenue = new MJaxLinkButton($this);
		$this->lnkViewChildBartenderVenue->Text = 'View BartenderVenues';
		$this->lnkViewChildBartenderVenue->Href = __ENTITY_MODEL_DIR__ . '/Bartender/' . $this->objBartender->idBartender . '/BartenderVenues';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objBartender)){
			//Create a new one
			$this->objBartender = new Bartender();
		}

  		  
  		
		  
  		 
      	$this->objBartender->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objBartender->creDate = $this->txtCreDate->Text;
		
		
		$this->objBartender->Save();
  	}
  	public function btnDelete_click(){
  		$this->objBartender->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objBartender);
  	}
  	
}
?>