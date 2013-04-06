<?php
class PlayerEditPanelBase extends MJaxPanel{
	protected $objPlayer = null;
    
    	
    	public $intIdPlayer = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
	
  		public $lnkViewChildPlayerApp = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objPlayer = null){
		parent::__construct($objParentControl);
		$this->objPlayer = $objPlayer;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/PlayerEditPanelBase.tpl.php';
		
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
		if(is_null($this->objPlayer)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objPlayer)){
	     
	  	
  		
  			$this->intIdPlayer = $this->objPlayer->idPlayer;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objPlayer->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objPlayer->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objPlayer->i)){
	   
  		
		$this->lnkViewChildPlayerApp = new MJaxLinkButton($this);
		$this->lnkViewChildPlayerApp->Text = 'View PlayerApps';
		$this->lnkViewChildPlayerApp->Href = __ENTITY_MODEL_DIR__ . '/Player/' . $this->objPlayer->idPlayer . '/PlayerApps';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objPlayer)){
			//Create a new one
			$this->objPlayer = new Player();
		}

  		  
  		
		  
  		 
      	$this->objPlayer->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objPlayer->creDate = $this->txtCreDate->Text;
		
		
		$this->objPlayer->Save();
  	}
  	public function btnDelete_click(){
  		$this->objPlayer->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objPlayer);
  	}
  	
}
?>