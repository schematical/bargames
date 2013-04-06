<?php
class AuthUserTypeCd_tpcdEditPanelBase extends MJaxPanel{
	protected $objAuthUserTypeCd_tpcd = null;
    
    	
    	public $intIdUserTypeCd = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAuthUserTypeCd_tpcd = null){
		parent::__construct($objParentControl);
		$this->objAuthUserTypeCd_tpcd = $objAuthUserTypeCd_tpcd;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/AuthUserTypeCd_tpcdEditPanelBase.tpl.php';
		
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
		if(is_null($this->objAuthUserTypeCd_tpcd)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	  
	  if(!is_null($this->objAuthUserTypeCd_tpcd)){
	     
	  	
  		
  			$this->intIdUserTypeCd = $this->objAuthUserTypeCd_tpcd->idUserTypeCd;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objAuthUserTypeCd_tpcd->shortDesc;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objAuthUserTypeCd_tpcd->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAuthUserTypeCd_tpcd)){
			//Create a new one
			$this->objAuthUserTypeCd_tpcd = new AuthUserTypeCd_tpcd();
		}

  		  
  		
		  
  		 
      	$this->objAuthUserTypeCd_tpcd->shortDesc = $this->txtShortDesc->Text;
		
		
		$this->objAuthUserTypeCd_tpcd->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAuthUserTypeCd_tpcd->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAuthUserTypeCd_tpcd);
  	}
  	
}
?>