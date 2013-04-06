<?php
class LocationBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'Location';
    const P_KEY = 'idLocation';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idLocation = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Location();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, Location::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Location();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<Location>";
        
        $xmlStr .= "<idLocation>";
        $xmlStr .= $this->idLocation;
        $xmlStr .= "</idLocation>";
        
        $xmlStr .= "<shortDesc>";
        $xmlStr .= $this->shortDesc;
        $xmlStr .= "</shortDesc>";
        
        $xmlStr .= "<address1>";
        $xmlStr .= $this->address1;
        $xmlStr .= "</address1>";
        
        $xmlStr .= "<address2>";
        $xmlStr .= $this->address2;
        $xmlStr .= "</address2>";
        
        $xmlStr .= "<city>";
        $xmlStr .= $this->city;
        $xmlStr .= "</city>";
        
        $xmlStr .= "<state>";
        $xmlStr .= $this->state;
        $xmlStr .= "</state>";
        
        $xmlStr .= "<zip>";
        $xmlStr .= $this->zip;
        $xmlStr .= "</zip>";
        
        $xmlStr .= "<country>";
        $xmlStr .= $this->country;
        $xmlStr .= "</country>";
        
        $xmlStr .= "<lat>";
        $xmlStr .= $this->lat;
        $xmlStr .= "</lat>";
        
        $xmlStr .= "<lng>";
        $xmlStr .= $this->lng;
        $xmlStr .= "</lng>";
        
        $xmlStr .= "<idAccount>";
        $xmlStr .= $this->idAccount;
        $xmlStr .= "</idAccount>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</Location>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Location();
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
    
    public static function LoadCollByIdAccount($intIdAccount){
        $sql = sprintf("SELECT * FROM Location WHERE idAccount = %s;", $intIdAccount);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objLocation = new Location();
			$objLocation->materilize($data);
			$coll->addItem($objLocation);
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
        		return Location::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'Location')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdLocation;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "Location"');
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
				
				$tObj = new Location();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "Location";
               
                                 
                 $arrReturn['idLocation'] = $this->idLocation;
               
                                 
                 $arrReturn['shortDesc'] = $this->shortDesc;
               
                                 
                 $arrReturn['address1'] = $this->address1;
               
                                 
                 $arrReturn['address2'] = $this->address2;
               
                                 
                 $arrReturn['city'] = $this->city;
               
                                 
                 $arrReturn['state'] = $this->state;
               
                                 
                 $arrReturn['zip'] = $this->zip;
               
                                 
                 $arrReturn['country'] = $this->country;
               
                                 
                 $arrReturn['lat'] = $this->lat;
               
                                 
                 $arrReturn['lng'] = $this->lng;
               
                                 
                 $arrReturn['idAccount'] = $this->idAccount;
            
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
	        	 
	   			case('IdLocation'): 
	   			case('idLocation'): 
	   				if(array_key_exists('idLocation', $this->arrDBFields)){
	        			return $this->arrDBFields['idLocation'];
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
	        	 
	   			case('Address1'): 
	   			case('address1'): 
	   				if(array_key_exists('address1', $this->arrDBFields)){
	        			return $this->arrDBFields['address1'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Address2'): 
	   			case('address2'): 
	   				if(array_key_exists('address2', $this->arrDBFields)){
	        			return $this->arrDBFields['address2'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('City'): 
	   			case('city'): 
	   				if(array_key_exists('city', $this->arrDBFields)){
	        			return $this->arrDBFields['city'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('State'): 
	   			case('state'): 
	   				if(array_key_exists('state', $this->arrDBFields)){
	        			return $this->arrDBFields['state'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Zip'): 
	   			case('zip'): 
	   				if(array_key_exists('zip', $this->arrDBFields)){
	        			return $this->arrDBFields['zip'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Country'): 
	   			case('country'): 
	   				if(array_key_exists('country', $this->arrDBFields)){
	        			return $this->arrDBFields['country'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Lat'): 
	   			case('lat'): 
	   				if(array_key_exists('lat', $this->arrDBFields)){
	        			return $this->arrDBFields['lat'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Lng'): 
	   			case('lng'): 
	   				if(array_key_exists('lng', $this->arrDBFields)){
	        			return $this->arrDBFields['lng'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	   				if(array_key_exists('idAccount', $this->arrDBFields)){
	        			return $this->arrDBFields['idAccount'];
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
	   			 
	   			case('IdLocation'): 
	   			case('idLocation'): 
	        		$this->arrDBFields['idLocation'] = $strValue;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	        		$this->arrDBFields['shortDesc'] = $strValue;
	        	break;
	        	 
	   			case('Address1'): 
	   			case('address1'): 
	        		$this->arrDBFields['address1'] = $strValue;
	        	break;
	        	 
	   			case('Address2'): 
	   			case('address2'): 
	        		$this->arrDBFields['address2'] = $strValue;
	        	break;
	        	 
	   			case('City'): 
	   			case('city'): 
	        		$this->arrDBFields['city'] = $strValue;
	        	break;
	        	 
	   			case('State'): 
	   			case('state'): 
	        		$this->arrDBFields['state'] = $strValue;
	        	break;
	        	 
	   			case('Zip'): 
	   			case('zip'): 
	        		$this->arrDBFields['zip'] = $strValue;
	        	break;
	        	 
	   			case('Country'): 
	   			case('country'): 
	        		$this->arrDBFields['country'] = $strValue;
	        	break;
	        	 
	   			case('Lat'): 
	   			case('lat'): 
	        		$this->arrDBFields['lat'] = $strValue;
	        	break;
	        	 
	   			case('Lng'): 
	   			case('lng'): 
	        		$this->arrDBFields['lng'] = $strValue;
	        	break;
	        	 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	        		$this->arrDBFields['idAccount'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>