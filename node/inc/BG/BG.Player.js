var BGPlayer = function(objSocket, objData, objGame){
	this.objGame = objGame;
	this.objSocket = objSocket;
	this.objData = objData;
	
	/*var objUser = this.objSocket.get(
	  	'mlc-user',
	  	function (err, objUser) {
			if(err) throw err;
	    	if(objUser != null){
    		
  				//The user is logged in, accept their given roll
  				var strRoll = objData.roll;
  				objUser.roll = strRoll;
  			}else{
  				var strRoll = 'player';
  			}
  			objSocket.set('bg-roll', strRoll);	  			
	    }
  	);*/
  	this.objSocket.set(
  		'bg-player',
  		this
  	);
  	this.on(
  		'disconnect',
  		function(){
  			//Have the game remove the player
  		}
  	);
  		
	
	return this;
}
BGPlayer.prototype.SetGame = function(objGame){
	this.objSocket.set('bg-game', objGame);
	this.objGame = objGame;
}
BGPlayer.prototype.Message = function(strMessage, mixData){
	//console.log("Sending Message : " + strMessage);
	//console.log(mixData);
	 this.objSocket.emit(
		 	strMessage,
		 	mixData
	 );
}

BGPlayer.prototype.on = function(strMessage, funCallback){
	this.objSocket.on(
		strMessage,
		function(objData){
			this.get(
				'bg-player',
				function(err, objPlayer){
					console.log(funCallback);funCallback
					if(objPlayer == null){
						throw Error("No player object associated with socket");
					}
					funCallback.apply(objPlayer,[objData]);
				}
			);
		}
	);
}

module.exports.BGPlayer = BGPlayer