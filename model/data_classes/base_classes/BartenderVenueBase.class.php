<?php
class BartenderVenueBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'BartenderVenue';
    const P_KEY = 'idBartenderVenue';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idBartenderVenue = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new BartenderVenue();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, BartenderVenue::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new BartenderVenue();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<BartenderVenue>";
        
        $xmlStr .= "<idBartenderVenue>";
        $xmlStr .= $this->idBartenderVenue;
        $xmlStr .= "</idBartenderVenue>";
        
        $xmlStr .= "<idVenue>";
        $xmlStr .= $this->idVenue;
        $xmlStr .= "</idVenue>";
        
        $xmlStr .= "<idBartender>";
        $xmlStr .= $this->idBartender;
        $xmlStr .= "</idBartender>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</BartenderVenue>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new BartenderVenue();
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
    
    public static function LoadCollByIdVenue($intIdVenue){
        $sql = sprintf("SELECT * FROM BartenderVenue WHERE idVenue = %s;", $intIdVenue);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objBartenderVenue = new BartenderVenue();
			$objBartenderVenue->materilize($data);
			$coll->addItem($objBartenderVenue);
		}
		return $coll;
    }

    
    public static function LoadCollByIdBartender($intIdBartender){
        $sql = sprintf("SELECT * FROM BartenderVenue WHERE idBartender = %s;", $intIdBartender);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objBartenderVenue = new BartenderVenue();
			$objBartenderVenue->materilize($data);
			$coll->addItem($objBartenderVenue);
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
        		return BartenderVenue::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'BartenderVenue')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdBartenderVenue;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "BartenderVenue"');
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
				
				$tObj = new BartenderVenue();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "BartenderVenue";
               
                                 
                 $arrReturn['idBartenderVenue'] = $this->idBartenderVenue;
               
                                 
                 $arrReturn['idVenue'] = $this->idVenue;
               
                                 
                 $arrReturn['idBartender'] = $this->idBartender;
               
                                 
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
	        	 
	   			case('IdBartenderVenue'): 
	   			case('idBartenderVenue'): 
	   				if(array_key_exists('idBartenderVenue', $this->arrDBFields)){
	        			return $this->arrDBFields['idBartenderVenue'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdVenue'): 
	   			case('idVenue'): 
	   				if(array_key_exists('idVenue', $this->arrDBFields)){
	        			return $this->arrDBFields['idVenue'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdBartender'): 
	   			case('idBartender'): 
	   				if(array_key_exists('idBartender', $this->arrDBFields)){
	        			return $this->arrDBFields['idBartender'];
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
	   			 
	   			case('IdBartenderVenue'): 
	   			case('idBartenderVenue'): 
	        		$this->arrDBFields['idBartenderVenue'] = $strValue;
	        	break;
	        	 
	   			case('IdVenue'): 
	   			case('idVenue'): 
	        		$this->arrDBFields['idVenue'] = $strValue;
	        	break;
	        	 
	   			case('IdBartender'): 
	   			case('idBartender'): 
	        		$this->arrDBFields['idBartender'] = $strValue;
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