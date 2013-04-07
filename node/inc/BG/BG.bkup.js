var BG = {
		blnGameOn:false,
		intPlayerIdTurn:null,
		objSuits:{spade:'Spade',club:'Club',diamond:'Diamond',heart:'Heart'},
		objSpecial:{1:'Ace', 11:'Jack',12:'Queen',13:'King'},
		arrCards:[],
		arrPlayers:[],
		Init:function(){
			this.InitCards();
		},
		InitCards:function(){
			for(strSuit in this.objSuits){
				for(var intNumber = 1; intNumber <= 13; intNumber++){
					var objCard = {};
					objCard.suit = strSuit;
					objCard.num = this.objSpecial[intNumber];
					this.arrCards[this.arrCards.length] = objCard;
				}
			}
		},
		Connect_callback:function (objSocket) {
  	
			 objSocket.emit('welcome', { hello: 'world' });
			
			  objSocket.on('hello', function (strName, id) {
			  		BG.AddPlayer(strName, this);
			  });
			  objSocket.on('draw', function (objData) {
					BG.Draw(this.get('player'), this);
			  });
			  objSocket.on('disconnect', function () {
			    	//BG.RemovePlayer(this.get('player'), this);
			  });
			 
		},
		Draw:function(objPlayer, objSocket){
			if(BG.intPlayerIdTurn == objPlayer.id){	
				intDrawCard = Math.floor(Math.random() * BG.arrCards.length);
				var objCard = BG.arrCards.splice(intDrawCard,1);
				BG.NextTurn(
					objCard
				);
			}
		},
		AddPlayer:function(strName, objSocket){
			var intId = this.arrPlayers.length;
			var objPlayer = 
				{
					'name':strName,
					'id':intId,
					'socket':objSocket
				};
			
			objPlayer.socket.set('player',objPlayer);
			BG.arrPlayers[intId] = objPlayer;
			if(BG.arrPlayers.length == 0){
				BG.intPlayerIdTurn = intId;
			}
			BG.Send(
				BG.arrPlayers[intId],
				'hello', {
		    	'your_id':intId,
		    	'h': 'Welcome ' + strName,
		    	'h3': 'Get ready to drink!'
		    });
			if(BG.arrPlayers.length > 1){
				if(!BG.blnGameOn){
					BG.blnGameOn = true;
					BG.NextTurn();
				}
			}
			
		   
			return intId;
		},
		RemovePlayer:function(objPlayer, objSocket){
			BG.Broadcast(
		    	objPlayer,
		    	'remove_player', {
		    	'h':"A Player Has Left",
		    	'h3':"More for us to drink"
		    });
			return BG.arrPlayers.splice(objPlayer.id,1); 
		},
		NextTurn:function(objCard){
			if(typeof(objCard) == 'undefined'){
		    	strMessage = 'Get your drinks ready!';
			}else{
				strMessage = objCard.num + ' of ' + objCard.suit + ' got drawn';
			}
			var objLastPlayer = BG.arrPlayers[BG.intPlayerIdTurn];
			BG.intPlayerIdTurn += 1;
			if(BG.intPlayerIdTurn >= BG.arrPlayers.length){
				this.intPlayerIdTurn = 1;
			}
			var objCurrDrawPlayer = BG.arrPlayers[BG.intPlayerIdTurn];
			var objTurnData = {
		    	'id':BG.intPlayerIdTurn,
		    	'h': objCurrDrawPlayer.name + "'s Draw",
		    	'h3':strMessage
		    };
		    BG.Broadcast(objLastPlayer, 'NextTurn', objTurnData);
			BG.Send(objLastPlayer, 'NextTurn', objTurnData);
			
			return this.intPlayerIdTurn;
		},
		Send:function(objPlayer, strAction, objData){
			objData.action = strAction;
			objData.player_ct = BG.arrPlayers.length;
			objData.card_ct = BG.arrCards.length;
			objPlayer.socket.emit('message', objData);
		},
		Broadcast:function(objPlayer, strAction, objData){
			objData.action = strAction;
			objData.draw_player = BG.intPlayerIdTurn;
			objData.player_ct = BG.arrPlayers.length;
			objData.card_ct = BG.arrCards.length;
			console.log('message :', objData);
		    objPlayer.socket.broadcast.emit('message',  objData);
		}
		
	}

module.exports.BG = BG;