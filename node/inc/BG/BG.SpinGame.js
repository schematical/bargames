var BGSpinGame = function(objVenue, arrOptions){
	this.intCycles = 0;	
	this.intTurnChangeCycles = 10;
	this.strMode = 'pregame';
	this.objBartender = undefined;
	this.intUserTurn = -1;
	this.arrPlayers = [];
	this.arrViewers = [];
	this.objVenu = objVenue;
	this.arrOptions = arrOptions;
	this.intOption = -1;
	
	return this;
}
BGSpinGame.prototype.AddPlayer = function(objPlayer){
	if(objPlayer.objData.roll == 'bartender'){
		this.SetBartender(objPlayer);
		this.BroadcastUpdate();
		return;
	}else if(objPlayer.objData.roll == 'iframe'){
		return this.AddViewer(objPlayer);
	}else if(objPlayer.objData.roll == 'player'){
		objPlayer.intGameId = this.arrPlayers.length;
		for(var i in this.arrPlayers){
			if(this.arrPlayers[i].objData.utma == objPlayer.objData.utma){
				objPlayer.intGameId = i;
			}
		}
		
		this.arrPlayers[objPlayer.intGameId] = objPlayer;
		objPlayer.SetGame(this);
		
		//Add basic listeners
		objPlayer.on(
			'bg-spin',
			function(){
				if(this.objGame.intUserTurn == this.intGameId){
					console.log("Spinning");
					this.objGame.Spin();
				}else{
					console.log("Faild to spin");
				}
			}
		);
		this.BroadcastUpdate();
	}
	
	
}
BGSpinGame.prototype.AddViewer = function(objPlayer){
	//objPlayer.intGameId = this.arrPlayers.length;
	this.arrViewers[this.arrViewers.length] = objPlayer;
	objPlayer.SetGame(this);
	
	this.BroadcastUpdate();
}
BGSpinGame.prototype.SetBartender = function(objPlayer){	
	this.objBartender = objPlayer;
	this.objBartender.SetGame(this);
	//Add basic listeners
	objPlayer.on(
		'bg-start-game',
		function(){
			console.log(this);
			this.objGame.StartGame();
		}
	);
	this.BroadcastUpdate();
}
BGSpinGame.prototype.RunTimer = function(){
	if(this.strMode == 'playing'){
		this.intCycles += 1;
		if(this.intTurnChangeCycles < this.intCycles){
			this.intCycles = -1;
			this.ChangeMode('waiting');
		}
	}
	this.BroadcastUpdate();
}
BGSpinGame.prototype.Spin = function(strMode){	
	//Pick a random option
	this.intOption = Math.floor(Math.random() * this.arrOptions.length);
	//Change Mode/Update everyone
	this.intUserTurn += 1;
	while(
		(typeof this.arrPlayers[this.intUserTurn] == 'undefined')
	){
		if(this.intUserTurn >= this.arrPlayers.length){
			this.intUserTurn = 0;
		}
	}
	this.ChangeMode('playing');
}
BGSpinGame.prototype.ChangeMode = function(strMode){
	//Change Mode
	this.strMode = strMode;
	this.BroadcastUpdate();
}
BGSpinGame.prototype.StartGame = function(strMode){
	this.intUserTurn += 1;
	this.ChangeMode('waiting');//For the first player to spin
}
BGSpinGame.prototype.BroadcastUpdate = function(){
	//Broadcast
	for(var i in this.arrPlayers){
		var objPlayer = this.arrPlayers[i];
		this.SendUpdate(objPlayer);
	}
	//Broadcast to viewers
	for(var i in this.arrViewers){
		var objPlayer = this.arrViewers[i];
		this.SendUpdate(objPlayer);
	}
	
	//Dont forget the bartender
	if(typeof this.objBartender != 'undefined'){
		this.SendUpdate(this.objBartender);
	}
}
BGSpinGame.prototype.SendUpdate = function(objPlayer){
	//console.log(objPlayer);
	var objPlayers = {}
	for(var i in this.arrPlayers){
		objPlayers[i] = this.arrPlayers[i].objData;
	}
	var objNextData = undefined;
	if(this.intUserTurn >= 0 && this.intUserTurn < this.arrPlayers.length){
		objNextData = this.arrPlayers[this.intUserTurn].objData;
	}
	var intTimeLeft = (this.intTurnChangeCycles * 5) - (this.intCycles * 5);
	if(typeof this.objBartender != 'undefined'){
		var objBartenderData = this.objBartender.objData;
	}
	var strMode = this.strMode;
	if(objPlayer.intGameId == this.intUserTurn){
		if(strMode == 'waiting'){
			strMode = 'your_turn';
		}
	}
	objPlayer.Message(
		 'bg-game-update',
		 {
		 	'venu':this.objVenu,
		 	'mode':strMode,
		 	'next':objNextData,
		 	'players':objPlayers,
		 	'time_left': intTimeLeft,
		 	'curr_opt':this.arrOptions[this.intOption],
		 	'bartender':objBartenderData,
		 	'options':this.arrOptions,
		 	'id':objPlayer.intGameId
		 }
	 );
}
BGPlayer = require('../BG/BG.Player.js').BGPlayer;
module.exports.BGSpinGame = BGSpinGame