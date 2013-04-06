<?php
class AuthAccountEditPanelBase extends MJaxPanel{
	protected $objAuthAccount = null;
    
    	
    	public $intIdAccount = null;
   		
    	
	
    	
    	
    	public $txtAws_id = null;
   		
	
    	
    	
    	public $txtIdAccountTypeCd = null;
   		
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
	
   		public $lnkViewParentAuthAccount = null;
	
	
  		public $lnkViewChildAuthUser = null;
  	
  		public $lnkViewChildLocation = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAuthAccount = null){
		parent::__construct($objParentControl);
		$this->objAuthAccount = $objAuthAccount;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/AuthAccountEditPanelBase.tpl.php';
		
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
		if(is_null($this->objAuthAccount)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtAws_id = new MJaxTextBox($this);
	  		$this->txtAws_id->Name = 'aws_id';
  		
	     
	  	
	  		$this->txtIdAccountTypeCd = new MJaxTextBox($this);
	  		$this->txtIdAccountTypeCd->Name = 'idAccountTypeCd';
  		
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	  
	  if(!is_null($this->objAuthAccount)){
	     
	  	
  		
  			$this->intIdAccount = $this->objAuthAccount->idAccount;
  		
  		
	     
	  		  		
	  		$this->txtAws_id->Text = $this->objAuthAccount->aws_id;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdAccountTypeCd->Text = $this->objAuthAccount->idAccountTypeCd;
  		
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objAuthAccount->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objAuthAccount->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objAuthAccount->idUser;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objAuthAccount->idUser)){
   			$this->lnkViewParentAuthAccount = new MJaxLinkButton($this);
   			$this->lnkViewParentAuthAccount->Text = 'View AuthUser';
   			$this->lnkViewParentAuthAccount->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objAuthAccount->idUser;  
   		}
	  
	 // if(!is_null($this->objAuthAccount->i)){
	   
  		
		$this->lnkViewChildAuthUser = new MJaxLinkButton($this);
		$this->lnkViewChildAuthUser->Text = 'View AuthUsers';
		$this->lnkViewChildAuthUser->Href = __ENTITY_MODEL_DIR__ . '/AuthAccount/' . $this->objAuthAccount->idAccount . '/AuthUsers';  
	
	  
  		
		$this->lnkViewChildLocation = new MJaxLinkButton($this);
		$this->lnkViewChildLocation->Text = 'View Locations';
		$this->lnkViewChildLocation->Href = __ENTITY_MODEL_DIR__ . '/AuthAccount/' . $this->objAuthAccount->idAccount . '/Locations';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAuthAccount)){
			//Create a new one
			$this->objAuthAccount = new AuthAccount();
		}

  		  
  		
		  
  		 
      	$this->objAuthAccount->aws_id = $this->txtAws_id->Text;
		
		  
  		 
      	$this->objAuthAccount->idAccountTypeCd = $this->txtIdAccountTypeCd->Text;
		
		  
  		 
      	$this->objAuthAccount->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objAuthAccount->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objAuthAccount->idUser = $this->txtIdUser->Text;
		
		
		$this->objAuthAccount->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAuthAccount->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAuthAccount);
  	}
  	
}
?>