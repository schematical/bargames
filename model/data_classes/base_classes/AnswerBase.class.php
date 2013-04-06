<?php
class AnswerBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'Answer';
    const P_KEY = 'idAnswer';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idAnswer = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Answer();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, Answer::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Answer();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<Answer>";
        
        $xmlStr .= "<idAnswer>";
        $xmlStr .= $this->idAnswer;
        $xmlStr .= "</idAnswer>";
        
        $xmlStr .= "<idQuestion>";
        $xmlStr .= $this->idQuestion;
        $xmlStr .= "</idQuestion>";
        
        $xmlStr .= "<idTeam>";
        $xmlStr .= $this->idTeam;
        $xmlStr .= "</idTeam>";
        
        $xmlStr .= "<body>";
        $xmlStr .= $this->body;
        $xmlStr .= "</body>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<points>";
        $xmlStr .= $this->points;
        $xmlStr .= "</points>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</Answer>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new Answer();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll->getCollection();
	}

     //Get children
    

    //Load by foregin key
    
    public static function LoadCollByIdQuestion($intIdQuestion){
        $sql = sprintf("SELECT * FROM Answer WHERE idQuestion = %s;", $intIdQuestion);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAnswer = new Answer();
			$objAnswer->materilize($data);
			$coll->addItem($objAnswer);
		}
		return $coll;
    }

    
    public static function LoadCollByIdTeam($intIdTeam){
        $sql = sprintf("SELECT * FROM Answer WHERE idTeam = %s;", $intIdTeam);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAnswer = new Answer();
			$objAnswer->materilize($data);
			$coll->addItem($objAnswer);
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
        		return Answer::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'Answer')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdAnswer;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "Answer"');
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
				
				$tObj = new Answer();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "Answer";
               
                                 
                 $arrReturn['idAnswer'] = $this->idAnswer;
               
                                 
                 $arrReturn['idQuestion'] = $this->idQuestion;
               
                                 
                 $arrReturn['idTeam'] = $this->idTeam;
               
                                 
                 $arrReturn['body'] = $this->body;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['points'] = $this->points;
            
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
	        	 
	   			case('IdAnswer'): 
	   			case('idAnswer'): 
	   				if(array_key_exists('idAnswer', $this->arrDBFields)){
	        			return $this->arrDBFields['idAnswer'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdQuestion'): 
	   			case('idQuestion'): 
	   				if(array_key_exists('idQuestion', $this->arrDBFields)){
	        			return $this->arrDBFields['idQuestion'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdTeam'): 
	   			case('idTeam'): 
	   				if(array_key_exists('idTeam', $this->arrDBFields)){
	        			return $this->arrDBFields['idTeam'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Body'): 
	   			case('body'): 
	   				if(array_key_exists('body', $this->arrDBFields)){
	        			return $this->arrDBFields['body'];
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
	        	 
	   			case('Points'): 
	   			case('points'): 
	   				if(array_key_exists('points', $this->arrDBFields)){
	        			return $this->arrDBFields['points'];
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
	   			 
	   			case('IdAnswer'): 
	   			case('idAnswer'): 
	        		$this->arrDBFields['idAnswer'] = $strValue;
	        	break;
	        	 
	   			case('IdQuestion'): 
	   			case('idQuestion'): 
	        		$this->arrDBFields['idQuestion'] = $strValue;
	        	break;
	        	 
	   			case('IdTeam'): 
	   			case('idTeam'): 
	        		$this->arrDBFields['idTeam'] = $strValue;
	        	break;
	        	 
	   			case('Body'): 
	   			case('body'): 
	        		$this->arrDBFields['body'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('Points'): 
	   			case('points'): 
	        		$this->arrDBFields['points'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>