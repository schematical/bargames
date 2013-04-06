<?php
class BGForm extends MLCForm{
	public $pnlLogin = null;
	public $arrGameData = array();
	public function Form_Create(){
		parent::Form_Create();
		$this->arrGameData['socket_url'] = 'http://' . $_SERVER['SERVER_NAME'] . ':5033';
		if(!is_null(BGApplication::$objVenue)){
			$this->arrGameData['venue'] = BGApplication::$objVenue->Namespace;		
		}
		if(!is_null(MLCAuthDriver::User())){
			$objSession = MLCAuthDriver::LoadSession();
			$this->arrGameData['user'] = array(
				'id_user' => $objSession->IdUser,
				'session' => $objSession->SessionKey
			);		
		}
		$this->arrGameData['roll'] = get_class($this);
		if(is_null(MLCAuthDriver::User())){
			//$this->strTemplate = __MDE_CORE_VIEW__ . '/PMForm_login.tpl.php';
			$this->pnlLogin = new MLCLoginPanel($this);
			$this->pnlLogin->Template = __MLC_AUTH_CORE_VIEW__ . '/MLCLoginPanel_hz.tpl.php';
		}
		
	}

	public function RenderHeader(){
		require_once(__MDE_CORE_VIEW__ . '/_header.tpl.php');
	}
	public function Redirect($strLocation, $arrQSData = array()){
		$strQS = '?';
		foreach($arrQSData as $strKey=>$mixValue){
			$strQS .= $strKey . '=' . $mixValue . "&";
		}
		$strQS = substr($strQS, 0, strlen($strQS) -1);
		$strLocation .= $strQS;
		if($this->strCallType != MJaxCallType::Ajax){
			header('location:' . $strLocation);
			exit();
		}else{
			$strJS = sprintf("document.location.href = '%s';", $strLocation);
			$this->AddJSCall($strJS);
		}
	}
	
	public function Alert($mixObject, $intWidth = '350', $intHeight = "'auto'"){
		
		if($mixObject instanceof MJaxControlBase){
			$strContent =  $mixObject->Render(false);			
		}elseif(is_string($mixObject)){
			$strContent = $mixObject;
		}else{
			throw new Exception("Alert must have first parameter of type 'MJaxControlBase' or String");
		}
		$strContent = trim(str_replace('"','\\"',str_replace("\r","",str_replace("\n", "", $strContent))));
		$this->AddJSCall(sprintf("$(function(){ $.fancybox(
			\"%s\",
			{
	        	'autoDimensions'	: false,
				'width'         		: %s,
				'height'        		: %s,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			}
		); });", $strContent, $intWidth, $intHeight));
		$this->ForceRenderFormState = true;
		$this->SkipMainWindowRender = false;		
    }
    public function HideAlert(){
    	$this->AddJSCall("$.fancybox.close()");
    	$this->ForceRenderFormState = true;
		$this->SkipMainWindowRender = true;
    }
}
