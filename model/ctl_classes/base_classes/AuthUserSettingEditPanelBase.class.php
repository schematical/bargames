<?php
class AuthUserSettingEditPanelBase extends MJaxPanel{
	protected $objAuthUserSetting = null;
    
    	
    	public $intIdUserSetting = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtIdUserSettingTypeCd = null;
   		
	
    	
    	
    	public $txtValue = null;
   		
	
	
   		public $lnkViewParentAuthUserSetting = null;
	
   		public $lnkViewParentAuthUserSetting = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAuthUserSetting = null){
		parent::__construct($objParentControl);
		$this->objAuthUserSetting = $objAuthUserSetting;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/AuthUserSettingEditPanelBase.tpl.php';
		
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
		if(is_null($this->objAuthUserSetting)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtIdUserSettingTypeCd = new MJaxTextBox($this);
	  		$this->txtIdUserSettingTypeCd->Name = 'idUserSettingTypeCd';
  		
	     
	  	
	  		$this->txtValue = new MJaxTextBox($this);
	  		$this->txtValue->Name = 'value';
  		
	  
	  if(!is_null($this->objAuthUserSetting)){
	     
	  	
  		
  			$this->intIdUserSetting = $this->objAuthUserSetting->idUserSetting;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objAuthUserSetting->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUserSettingTypeCd->Text = $this->objAuthUserSetting->idUserSettingTypeCd;
  		
  		
  		
	     
	  		  		
	  		$this->txtValue->Text = $this->objAuthUserSetting->value;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objAuthUserSetting->idUser)){
   			$this->lnkViewParentAuthUserSetting = new MJaxLinkButton($this);
   			$this->lnkViewParentAuthUserSetting->Text = 'View AuthUser';
   			$this->lnkViewParentAuthUserSetting->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objAuthUserSetting->idUser;  
   		}
	  
  		if(!is_null($this->objAuthUserSetting->idUserSettingTypeCd)){
   			$this->lnkViewParentAuthUserSetting = new MJaxLinkButton($this);
   			$this->lnkViewParentAuthUserSetting->Text = 'View AuthUserSettingTypeCd_tpcd';
   			$this->lnkViewParentAuthUserSetting->Href = __ENTITY_MODEL_DIR__ . '/AuthUserSettingTypeCd_tpcd/' . $this->objAuthUserSetting->idUserSettingTypeCd;  
   		}
	  
	 // if(!is_null($this->objAuthUserSetting->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAuthUserSetting)){
			//Create a new one
			$this->objAuthUserSetting = new AuthUserSetting();
		}

  		  
  		
		  
  		 
      	$this->objAuthUserSetting->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objAuthUserSetting->idUserSettingTypeCd = $this->txtIdUserSettingTypeCd->Text;
		
		  
  		 
      	$this->objAuthUserSetting->value = $this->txtValue->Text;
		
		
		$this->objAuthUserSetting->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAuthUserSetting->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAuthUserSetting);
  	}
  	
}
?>