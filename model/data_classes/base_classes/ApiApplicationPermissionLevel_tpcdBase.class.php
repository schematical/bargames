<?php
class ApiApplicationPermissionLevel_tpcdBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'ApiApplicationPermissionLevel_tpcd';
    const P_KEY = 'idApplicationPermissionLevel';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idApplicationPermissionLevel = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiApplicationPermissionLevel_tpcd();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, ApiApplicationPermissionLevel_tpcd::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiApplicationPermissionLevel_tpcd();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<ApiApplicationPermissionLevel_tpcd>";
        
        $xmlStr .= "<idApplicationPermissionLevel>";
        $xmlStr .= $this->idApplicationPermissionLevel;
        $xmlStr .= "</idApplicationPermissionLevel>";
        
        $xmlStr .= "<shrotDesc>";
        $xmlStr .= $this->shrotDesc;
        $xmlStr .= "</shrotDesc>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</ApiApplicationPermissionLevel_tpcd>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiApplicationPermissionLevel_tpcd();
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
    
    public function GetApiApplicationArr(){
       return ApiApplication::LoadCollByIdApplicationPermissionLevel($this->idApplicationPermissionLevel);
    }
	

    //Load by foregin key
    
    
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
       
        
            
             if(array_key_exists('idapplicationpermissionlevel', $arrData)){
                $this->intIdApplicationPermissionLevel = $arrData['idapplicationpermissionlevel'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return ApiApplicationPermissionLevel_tpcd::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'ApiApplicationPermissionLevel_tpcd')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdApplicationPermissionLevel;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "ApiApplicationPermissionLevel_tpcd"');
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
				
				$tObj = new ApiApplicationPermissionLevel_tpcd();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "ApiApplicationPermissionLevel_tpcd";
               
                                 
                 $arrReturn['idApplicationPermissionLevel'] = $this->idApplicationPermissionLevel;
               
                                 
                 $arrReturn['shrotDesc'] = $this->shrotDesc;
            
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
	        	 
	   			case('IdApplicationPermissionLevel'): 
	   			case('idApplicationPermissionLevel'): 
	   				if(array_key_exists('idApplicationPermissionLevel', $this->arrDBFields)){
	        			return $this->arrDBFields['idApplicationPermissionLevel'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ShrotDesc'): 
	   			case('shrotDesc'): 
	   				if(array_key_exists('shrotDesc', $this->arrDBFields)){
	        			return $this->arrDBFields['shrotDesc'];
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
	   			 
	   			case('IdApplicationPermissionLevel'): 
	   			case('idApplicationPermissionLevel'): 
	        		$this->arrDBFields['idApplicationPermissionLevel'] = $strValue;
	        	break;
	        	 
	   			case('ShrotDesc'): 
	   			case('shrotDesc'): 
	        		$this->arrDBFields['shrotDesc'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>