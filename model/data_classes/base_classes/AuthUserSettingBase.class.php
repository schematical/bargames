<?php
class AuthUserSettingBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'AuthUserSetting';
    const P_KEY = 'idUserSetting';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idUserSetting = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthUserSetting();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, AuthUserSetting::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthUserSetting();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<AuthUserSetting>";
        
        $xmlStr .= "<idUserSetting>";
        $xmlStr .= $this->idUserSetting;
        $xmlStr .= "</idUserSetting>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<idUserSettingTypeCd>";
        $xmlStr .= $this->idUserSettingTypeCd;
        $xmlStr .= "</idUserSettingTypeCd>";
        
        $xmlStr .= "<value>";
        $xmlStr .= $this->value;
        $xmlStr .= "</value>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</AuthUserSetting>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthUserSetting();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		$arrReturn = $coll->getCollection();
		if($blnReturnSingle){
			if(count($arrReturn) == 0){
				return null;
			}else{
				return $arrReturn[0];
			}	
		}else{
			return $arrReturn;
		}		
	}
	public static function QueryCount($strExtra = ''){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		return mysql_num_rows($result);
			
	}
     //Get children
    

    //Load by foregin key
    
    public static function LoadCollByIdUser($intIdUser){
        $sql = sprintf("SELECT * FROM AuthUserSetting WHERE idUser = %s;", $intIdUser);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAuthUserSetting = new AuthUserSetting();
			$objAuthUserSetting->materilize($data);
			$coll->addItem($objAuthUserSetting);
		}
		return $coll;
    }

    
    public static function LoadCollByIdUserSettingTypeCd($intIdUserSettingTypeCd){
        $sql = sprintf("SELECT * FROM AuthUserSetting WHERE idUserSettingTypeCd = %s;", $intIdUserSettingTypeCd);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAuthUserSetting = new AuthUserSetting();
			$objAuthUserSetting->materilize($data);
			$coll->addItem($objAuthUserSetting);
		}
		return $coll;
    }

    
    
      public function LoadByTag($strTag){
	  	return MLCTagDriver::LoadTaggedEntites($strTag, get_class($this));
	  }
	       
    
	  public function AddTag($mixTag){
	  	return MLCTagDriver::AddTag($mixTag, $this);
	  }
	  
    public function ParseArray($arrData){
    	foreach($arrData as $strKey => $mixVal){
    		$arrData[strtolower($strKey)] = $mixVal;
    	}
       
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return AuthUserSetting::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'AuthUserSetting')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdUserSetting;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "AuthUserSetting"');
        	}        	
        }
        public static function LoadSingleByField( $strField, $mixValue, $strCompairison = '='){
        	$arrResults = self::LoadArrayByField($strField, $mixValue, $strCompairison);
        	if(count($arrResults)){
        		return $arrResults[0];
        	}
        	return null;
        }
        public static function LoadArrayByField( $strField, $mixValue, $strCompairison = '='){
			if(is_numeric($mixValue)){
				$strValue = $mixValue;
			}else{
				$strValue = sprintf('"%s"', $mixValue);
			} 
			$strExtra = sprintf(' WHERE %s %s %s', $strField, $strCompairison, $strValue);
			
			$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME, $strExtra);
			//die($sql);
			$result = MLCDBDriver::query($sql, self::DB_CONN);
			$coll = new BaseEntityCollection();
			while($data = mysql_fetch_assoc($result)){
				
				$tObj = new AuthUserSetting();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "AuthUserSetting";
               
                                 
                 $arrReturn['idUserSetting'] = $this->idUserSetting;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['idUserSettingTypeCd'] = $this->idUserSettingTypeCd;
               
                                 
                 $arrReturn['value'] = $this->value;
            
            return $arrReturn;
        }
        public function __toJson($blnPosponeEncode = false){
        	$arrReturn = $this->__toArray();  
        	if($blnPosponeEncode){
        		return json_encode($arrReturn);
        	}else{
        		return $arrReturn;
        	} 
        }
        public function __get($strName){
	        switch($strName){
	        	 
	   			case('IdUserSetting'): 
	   			case('idUserSetting'): 
	   				if(array_key_exists('idUserSetting', $this->arrDBFields)){
	        			return $this->arrDBFields['idUserSetting'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	   				if(array_key_exists('idUser', $this->arrDBFields)){
	        			return $this->arrDBFields['idUser'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdUserSettingTypeCd'): 
	   			case('idUserSettingTypeCd'): 
	   				if(array_key_exists('idUserSettingTypeCd', $this->arrDBFields)){
	        			return $this->arrDBFields['idUserSettingTypeCd'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Value'): 
	   			case('value'): 
	   				if(array_key_exists('value', $this->arrDBFields)){
	        			return $this->arrDBFields['value'];
	        		}
	        		return null;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	       
	    }
	    public function __set($strName, $strValue){
	   		$this->modified = 1;
	   		switch($strName){
	   			 
	   			case('IdUserSetting'): 
	   			case('idUserSetting'): 
	        		$this->arrDBFields['idUserSetting'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('IdUserSettingTypeCd'): 
	   			case('idUserSettingTypeCd'): 
	        		$this->arrDBFields['idUserSettingTypeCd'] = $strValue;
	        	break;
	        	 
	   			case('Value'): 
	   			case('value'): 
	        		$this->arrDBFields['value'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>