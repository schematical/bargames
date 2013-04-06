<?php
class ApiUserPermissionBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'ApiUserPermission';
    const P_KEY = 'idUserPermission';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idUserPermission = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiUserPermission();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, ApiUserPermission::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiUserPermission();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<ApiUserPermission>";
        
        $xmlStr .= "<idUserPermission>";
        $xmlStr .= $this->idUserPermission;
        $xmlStr .= "</idUserPermission>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<idUserPermissionType>";
        $xmlStr .= $this->idUserPermissionType;
        $xmlStr .= "</idUserPermissionType>";
        
        $xmlStr .= "<value>";
        $xmlStr .= $this->value;
        $xmlStr .= "</value>";
        
        $xmlStr .= "<modDateTime>";
        $xmlStr .= $this->modDateTime;
        $xmlStr .= "</modDateTime>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</ApiUserPermission>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiUserPermission();
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
    
    public static function LoadCollByIdUserPermissionType($intIdUserPermissionType){
        $sql = sprintf("SELECT * FROM ApiUserPermission WHERE idUserPermissionType = %s;", $intIdUserPermissionType);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objApiUserPermission = new ApiUserPermission();
			$objApiUserPermission->materilize($data);
			$coll->addItem($objApiUserPermission);
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
        		return ApiUserPermission::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'ApiUserPermission')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdUserPermission;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "ApiUserPermission"');
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
				
				$tObj = new ApiUserPermission();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "ApiUserPermission";
               
                                 
                 $arrReturn['idUserPermission'] = $this->idUserPermission;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['idUserPermissionType'] = $this->idUserPermissionType;
               
                                 
                 $arrReturn['value'] = $this->value;
               
                                 
                 $arrReturn['modDateTime'] = $this->modDateTime;
            
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
	        	 
	   			case('IdUserPermission'): 
	   			case('idUserPermission'): 
	   				if(array_key_exists('idUserPermission', $this->arrDBFields)){
	        			return $this->arrDBFields['idUserPermission'];
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
	        	 
	   			case('IdUserPermissionType'): 
	   			case('idUserPermissionType'): 
	   				if(array_key_exists('idUserPermissionType', $this->arrDBFields)){
	        			return $this->arrDBFields['idUserPermissionType'];
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
	        	 
	   			case('ModDateTime'): 
	   			case('modDateTime'): 
	   				if(array_key_exists('modDateTime', $this->arrDBFields)){
	        			return $this->arrDBFields['modDateTime'];
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
	   			 
	   			case('IdUserPermission'): 
	   			case('idUserPermission'): 
	        		$this->arrDBFields['idUserPermission'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('IdUserPermissionType'): 
	   			case('idUserPermissionType'): 
	        		$this->arrDBFields['idUserPermissionType'] = $strValue;
	        	break;
	        	 
	   			case('Value'): 
	   			case('value'): 
	        		$this->arrDBFields['value'] = $strValue;
	        	break;
	        	 
	   			case('ModDateTime'): 
	   			case('modDateTime'): 
	        		$this->arrDBFields['modDateTime'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>