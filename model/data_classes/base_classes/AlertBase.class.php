<?php
class AlertBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'Alert';
    const P_KEY = 'idAlert';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idAlert = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Alert();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, Alert::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Alert();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<Alert>";
        
        $xmlStr .= "<idAlert>";
        $xmlStr .= $this->idAlert;
        $xmlStr .= "</idAlert>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<keyword>";
        $xmlStr .= $this->keyword;
        $xmlStr .= "</keyword>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<include>";
        $xmlStr .= $this->include;
        $xmlStr .= "</include>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</Alert>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Alert();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll->getCollection();
	}

     //Get children
    

    //Load by foregin key
    
    public static function LoadCollByIdUser($intIdUser){
        $sql = sprintf("SELECT * FROM Alert WHERE idUser = %s;", $intIdUser);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAlert = new Alert();
			$objAlert->materilize($data);
			$coll->addItem($objAlert);
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
        		return Alert::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'Alert')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdAlert;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "Alert"');
        	}        	
        }
        public function LoadSingleByField( $strField, $mixValue, $strCompairison = '='){
        	$arrResults = self::LoadArrayByField($strField, $mixValue, $strCompairison);
        	if(count($arrResults)){
        		return $arrResults[0];
        	}
        	return null;
        }
        public function LoadArrayByField( $strField, $mixValue, $strCompairison = '='){
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
				
				$tObj = new Alert();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "Alert";
               
                                 
                 $arrReturn['idAlert'] = $this->idAlert;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['keyword'] = $this->keyword;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['include'] = $this->include;
            
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
	        	 
	   			case('IdAlert'): 
	   			case('idAlert'): 
	   				if(array_key_exists('idAlert', $this->arrDBFields)){
	        			return $this->arrDBFields['idAlert'];
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
	        	 
	   			case('Keyword'): 
	   			case('keyword'): 
	   				if(array_key_exists('keyword', $this->arrDBFields)){
	        			return $this->arrDBFields['keyword'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	   				if(array_key_exists('creDate', $this->arrDBFields)){
	        			return $this->arrDBFields['creDate'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Include'): 
	   			case('include'): 
	   				if(array_key_exists('include', $this->arrDBFields)){
	        			return $this->arrDBFields['include'];
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
	   			 
	   			case('IdAlert'): 
	   			case('idAlert'): 
	        		$this->arrDBFields['idAlert'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('Keyword'): 
	   			case('keyword'): 
	        		$this->arrDBFields['keyword'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('Include'): 
	   			case('include'): 
	        		$this->arrDBFields['include'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>