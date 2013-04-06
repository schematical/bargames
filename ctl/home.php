<?php
require_once('_config.inc.php');
//MLCApplication::InitPackage('BGSpin');
class home extends BGForm{
	protected $strUrl = null;
	public function Form_Create(){
		parent::Form_Create();
		
		$this->CreateControls();
		$this->strUrl = $_SERVER['SERVER_NAME'] . '/' . BGAuthDriver::Venue()->Namespace;
	}
	public function CreateControls(){
		
	}
	
	
}
home::Run('home');
?>