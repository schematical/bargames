<?php
class EditorialQueryEditPanelBase extends MJaxPanel{
	protected $objEditorialQuery = null;
    
    	
    	public $intIdEditorialQuery = null;
   		
    	
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtDeadlineDate = null;
   		
	
    	
    	
    	public $txtIdReporter = null;
   		
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtQuery = null;
   		
	
    	
    	
    	public $txtRequirements = null;
   		
	
    	
    	
    	public $txtCategory = null;
   		
	
    	
    	
    	public $txtContactInfo = null;
   		
	
    	
    	
    	public $txtAlertedDate = null;
   		
	
	
   		public $lnkViewParentEditorialQuery = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objEditorialQuery = null){
		parent::__construct($objParentControl);
		$this->objEditorialQuery = $objEditorialQuery;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/EditorialQueryEditPanelBase.tpl.php';
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
		if(is_null($this->objEditorialQuery)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtDeadlineDate = new MJaxTextBox($this);
	  		$this->txtDeadlineDate->Name = 'deadlineDate';
  		
	     
	  	
	  		$this->txtIdReporter = new MJaxTextBox($this);
	  		$this->txtIdReporter->Name = 'idReporter';
  		
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtQuery = new MJaxTextBox($this);
	  		$this->txtQuery->Name = 'query';
  		
	     
	  	
	  		$this->txtRequirements = new MJaxTextBox($this);
	  		$this->txtRequirements->Name = 'requirements';
  		
	     
	  	
	  		$this->txtCategory = new MJaxTextBox($this);
	  		$this->txtCategory->Name = 'category';
  		
	     
	  	
	  		$this->txtContactInfo = new MJaxTextBox($this);
	  		$this->txtContactInfo->Name = 'contactInfo';
  		
	     
	  	
	  		$this->txtAlertedDate = new MJaxTextBox($this);
	  		$this->txtAlertedDate->Name = 'alertedDate';
  		
	  
	  if(!is_null($this->objEditorialQuery)){
	     
	  	
  		
  			$this->intIdEditorialQuery = $this->objEditorialQuery->idEditorialQuery;
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objEditorialQuery->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtDeadlineDate->Text = $this->objEditorialQuery->deadlineDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdReporter->Text = $this->objEditorialQuery->idReporter;
  		
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objEditorialQuery->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtQuery->Text = $this->objEditorialQuery->query;
  		
  		
  		
	     
	  		  		
	  		$this->txtRequirements->Text = $this->objEditorialQuery->requirements;
  		
  		
  		
	     
	  		  		
	  		$this->txtCategory->Text = $this->objEditorialQuery->category;
  		
  		
  		
	     
	  		  		
	  		$this->txtContactInfo->Text = $this->objEditorialQuery->contactInfo;
  		
  		
  		
	     
	  		  		
	  		$this->txtAlertedDate->Text = $this->objEditorialQuery->alertedDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objEditorialQuery->idReporter)){
   			$this->lnkViewParentEditorialQuery = new MJaxLinkButton($this);
   			$this->lnkViewParentEditorialQuery->Text = 'View Reporter';
   			$this->lnkViewParentEditorialQuery->Href = __ENTITY_MODEL_DIR__ . '/Reporter/' . $this->objEditorialQuery->idReporter;  
   		}
	  
	 // if(!is_null($this->objEditorialQuery->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objEditorialQuery)){
			//Create a new one
			$this->objEditorialQuery = new EditorialQuery();
		}

  		  
  		
		  
  		 
      	$this->objEditorialQuery->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objEditorialQuery->deadlineDate = $this->txtDeadlineDate->Text;
		
		  
  		 
      	$this->objEditorialQuery->idReporter = $this->txtIdReporter->Text;
		
		  
  		 
      	$this->objEditorialQuery->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objEditorialQuery->query = $this->txtQuery->Text;
		
		  
  		 
      	$this->objEditorialQuery->requirements = $this->txtRequirements->Text;
		
		  
  		 
      	$this->objEditorialQuery->category = $this->txtCategory->Text;
		
		  
  		 
      	$this->objEditorialQuery->contactInfo = $this->txtContactInfo->Text;
		
		  
  		 
      	$this->objEditorialQuery->alertedDate = $this->txtAlertedDate->Text;
		
		
		$this->objEditorialQuery->Save();
  	}
  	public function btnDelete_click(){
  		$this->objEditorialQuery->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objEditorialQuery);
  	}
  	
}
?>