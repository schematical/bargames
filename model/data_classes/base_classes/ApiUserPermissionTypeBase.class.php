<?php
class ApiUserPermissionTypeBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'ApiUserPermissionType';
    const P_KEY = 'idUserPermissionType';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idUserPermissionType = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiUserPermissionType();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, ApiUserPermissionType::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiUserPermissionType();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<ApiUserPermissionType>";
        
        $xmlStr .= "<idUserPermissionType>";
        $xmlStr .= $this->idUserPermissionType;
        $xmlStr .= "</idUserPermissionType>";
        
        $xmlStr .= "<shortDesc>";
        $xmlStr .= $this->shortDesc;
        $xmlStr .= "</shortDesc>";
        
        $xmlStr .= "<longDesc>";
        $xmlStr .= $this->longDesc;
        $xmlStr .= "</longDesc>";
        
        $xmlStr .= "<default>";
        $xmlStr .= $this->default;
        $xmlStr .= "</default>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</ApiUserPermissionType>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiUserPermissionType();
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
    
    public function GetApiUserPermissionArr(){
       return ApiUserPermission::LoadCollByIdUserPermissionType($this->idUserPermissionType);
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
       
        
            
             if(array_key_exists('iduserpermissiontype', $arrData)){
                $this->intIdUserPermissionType = $arrData['iduserpermissiontype'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return ApiUserPermissionType::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'ApiUserPermissionType')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdUserPermissionType;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "ApiUserPermissionType"');
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
				
				$tObj = new ApiUserPermissionType();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "ApiUserPermissionType";
               
                                 
                 $arrReturn['idUserPermissionType'] = $this->idUserPermissionType;
               
                                 
                 $arrReturn['shortDesc'] = $this->shortDesc;
               
                                 
                 $arrReturn['longDesc'] = $this->longDesc;
               
                                 
                 $arrReturn['default'] = $this->default;
            
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
	        	 
	   			case('IdUserPermissionType'): 
	   			case('idUserPermissionType'): 
	   				if(array_key_exists('idUserPermissionType', $this->arrDBFields)){
	        			return $this->arrDBFields['idUserPermissionType'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	   				if(array_key_exists('shortDesc', $this->arrDBFields)){
	        			return $this->arrDBFields['shortDesc'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('LongDesc'): 
	   			case('longDesc'): 
	   				if(array_key_exists('longDesc', $this->arrDBFields)){
	        			return $this->arrDBFields['longDesc'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Default'): 
	   			case('default'): 
	   				if(array_key_exists('default', $this->arrDBFields)){
	        			return $this->arrDBFields['default'];
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
	   			 
	   			case('IdUserPermissionType'): 
	   			case('idUserPermissionType'): 
	        		$this->arrDBFields['idUserPermissionType'] = $strValue;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	        		$this->arrDBFields['shortDesc'] = $strValue;
	        	break;
	        	 
	   			case('LongDesc'): 
	   			case('longDesc'): 
	        		$this->arrDBFields['longDesc'] = $strValue;
	        	break;
	        	 
	   			case('Default'): 
	   			case('default'): 
	        		$this->arrDBFields['default'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>