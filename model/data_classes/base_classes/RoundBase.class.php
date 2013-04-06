<?php
class RoundBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'Round';
    const P_KEY = 'idRound';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idRound = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Round();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, Round::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Round();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<Round>";
        
        $xmlStr .= "<idRound>";
        $xmlStr .= $this->idRound;
        $xmlStr .= "</idRound>";
        
        $xmlStr .= "<idAccount>";
        $xmlStr .= $this->idAccount;
        $xmlStr .= "</idAccount>";
        
        $xmlStr .= "<shortDesc>";
        $xmlStr .= $this->shortDesc;
        $xmlStr .= "</shortDesc>";
        
        $xmlStr .= "<longDesc>";
        $xmlStr .= $this->longDesc;
        $xmlStr .= "</longDesc>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</Round>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Round();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll->getCollection();
	}

     //Get children
    
    public function GetQuestionArr(){
       return Question::LoadCollByIdRound($this->idRound);
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
       
        
            
             if(array_key_exists('idround', $arrData)){
                $this->intIdRound = $arrData['idround'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return Round::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'Round')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdRound;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "Round"');
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
				
				$tObj = new Round();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "Round";
               
                                 
                 $arrReturn['idRound'] = $this->idRound;
               
                                 
                 $arrReturn['idAccount'] = $this->idAccount;
               
                                 
                 $arrReturn['shortDesc'] = $this->shortDesc;
               
                                 
                 $arrReturn['longDesc'] = $this->longDesc;
               
                                 
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
	        	 
	   			case('IdRound'): 
	   			case('idRound'): 
	   				if(array_key_exists('idRound', $this->arrDBFields)){
	        			return $this->arrDBFields['idRound'];
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
	   			 
	   			case('IdRound'): 
	   			case('idRound'): 
	        		$this->arrDBFields['idRound'] = $strValue;
	        	break;
	        	 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	        		$this->arrDBFields['idAccount'] = $strValue;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	        		$this->arrDBFields['shortDesc'] = $strValue;
	        	break;
	        	 
	   			case('LongDesc'): 
	   			case('longDesc'): 
	        		$this->arrDBFields['longDesc'] = $strValue;
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