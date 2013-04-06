<?php
class PlayerAppBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'PlayerApp';
    const P_KEY = 'idPlayerApp';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idPlayerApp = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new PlayerApp();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, PlayerApp::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new PlayerApp();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<PlayerApp>";
        
        $xmlStr .= "<idPlayerApp>";
        $xmlStr .= $this->idPlayerApp;
        $xmlStr .= "</idPlayerApp>";
        
        $xmlStr .= "<idPlayer>";
        $xmlStr .= $this->idPlayer;
        $xmlStr .= "</idPlayer>";
        
        $xmlStr .= "<idApp>";
        $xmlStr .= $this->idApp;
        $xmlStr .= "</idApp>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</PlayerApp>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new PlayerApp();
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
    
    public static function LoadCollByIdPlayer($intIdPlayer){
        $sql = sprintf("SELECT * FROM PlayerApp WHERE idPlayer = %s;", $intIdPlayer);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objPlayerApp = new PlayerApp();
			$objPlayerApp->materilize($data);
			$coll->addItem($objPlayerApp);
		}
		return $coll;
    }

    
    public static function LoadCollByIdApp($intIdApp){
        $sql = sprintf("SELECT * FROM PlayerApp WHERE idApp = %s;", $intIdApp);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objPlayerApp = new PlayerApp();
			$objPlayerApp->materilize($data);
			$coll->addItem($objPlayerApp);
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
        		return PlayerApp::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'PlayerApp')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdPlayerApp;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "PlayerApp"');
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
				
				$tObj = new PlayerApp();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "PlayerApp";
               
                                 
                 $arrReturn['idPlayerApp'] = $this->idPlayerApp;
               
                                 
                 $arrReturn['idPlayer'] = $this->idPlayer;
               
                                 
                 $arrReturn['idApp'] = $this->idApp;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
            
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
	        	 
	   			case('IdPlayerApp'): 
	   			case('idPlayerApp'): 
	   				if(array_key_exists('idPlayerApp', $this->arrDBFields)){
	        			return $this->arrDBFields['idPlayerApp'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdPlayer'): 
	   			case('idPlayer'): 
	   				if(array_key_exists('idPlayer', $this->arrDBFields)){
	        			return $this->arrDBFields['idPlayer'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdApp'): 
	   			case('idApp'): 
	   				if(array_key_exists('idApp', $this->arrDBFields)){
	        			return $this->arrDBFields['idApp'];
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
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	       
	    }
	    public function __set($strName, $strValue){
	   		$this->modified = 1;
	   		switch($strName){
	   			 
	   			case('IdPlayerApp'): 
	   			case('idPlayerApp'): 
	        		$this->arrDBFields['idPlayerApp'] = $strValue;
	        	break;
	        	 
	   			case('IdPlayer'): 
	   			case('idPlayer'): 
	        		$this->arrDBFields['idPlayer'] = $strValue;
	        	break;
	        	 
	   			case('IdApp'): 
	   			case('idApp'): 
	        		$this->arrDBFields['idApp'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>