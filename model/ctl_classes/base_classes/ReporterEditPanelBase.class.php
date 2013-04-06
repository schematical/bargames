<?php
class ReporterEditPanelBase extends MJaxPanel{
	protected $objReporter = null;
    
    	
    	public $intIdReporter = null;
   		
    	
	
    	
    	
    	public $txtName = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
	
	
  		public $lnkViewChildEditorialQuery = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objReporter = null){
		parent::__construct($objParentControl);
		$this->objReporter = $objReporter;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/ReporterEditPanelBase.tpl.php';
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
		if(is_null($this->objReporter)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtName = new MJaxTextBox($this);
	  		$this->txtName->Name = 'name';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	  
	  if(!is_null($this->objReporter)){
	     
	  	
  		
  			$this->intIdReporter = $this->objReporter->idReporter;
  		
  		
	     
	  		  		
	  		$this->txtName->Text = $this->objReporter->name;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objReporter->idUser;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objReporter->i)){
	   
  		
		$this->lnkViewChildEditorialQuery = new MJaxLinkButton($this);
		$this->lnkViewChildEditorialQuery->Text = 'View EditorialQuerys';
		$this->lnkViewChildEditorialQuery->Href = __ENTITY_MODEL_DIR__ . '/Reporter/' . $this->objReporter->idReporter . '/EditorialQuerys';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objReporter)){
			//Create a new one
			$this->objReporter = new Reporter();
		}

  		  
  		
		  
  		 
      	$this->objReporter->name = $this->txtName->Text;
		
		  
  		 
      	$this->objReporter->idUser = $this->txtIdUser->Text;
		
		
		$this->objReporter->Save();
  	}
  	public function btnDelete_click(){
  		$this->objReporter->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objReporter);
  	}
  	
}
?>