<?php
class BGRewriteHandeler extends MLCRewriteHandelerBase{
	public function Handel($strUri){
		$arrParts = explode('/', $strUri);
		
		$objVenue  = Venu::LoadSingleByField('namespace', $arrParts[1]);
		if(!is_null($objVenue)){
			//Find current game
			
			BGApplication::InitGame($objVenue);
			if(
				(count($arrParts) < 3) ||
				(strlen($arrParts[2]) == 0)
			){
				if(
					(!is_null(BGAuthDriver::Venue())) &&
					(!is_null(BGAuthDriver::Account())) &&
					($objVenue->IdAccount == BGAuthDriver::Account()->IdAccount)
				){
					
					$strCtlFile = 'bartender.php';
				}else{
					$strCtlFile = 'player.php';
				}
				
			}else{
				$strCtlFile = $arrParts[2];
			}
			
			MLCApplication::$strCtlFile = BGApplication::$strCtlFileDir .'/'.  $strCtlFile;
			//die(MLCApplication::$strCtlFile);
		}else{
			parent::Handel($strUri);
		}
	}
}
