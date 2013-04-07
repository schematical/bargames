var MLC = require('../mlc/MLC.js').MLC;
MLC.Auth = require('../mlc/MLC.Auth.js').Auth;
var BG = {

		Games:{},
		Init:function(){
			
			MLC.AddDB(
				'bargames',
				{
				  host     : 'localhost',
				  user     : 'root',
				  password : 'learnlearn',
				}
			);
			
			
			MLC.AddDB(
				'bargames_spin',
				{
				  host     : 'localhost',
				  user     : 'root',
				  password : 'learnlearn',
				}
			);
			MLC.Init(this);
			BG.Spin.RunTimer();
		},		
		HandshakeResponse:function (objData, objSocket) {
			
  			//Determin the user roll(session)
  			var objPlayer = new BGPlayer(objSocket, objData);
  			
  			//Figure out which game this is
  			//If we do not have a game object then create one
  			var strVenuNamespace = objData.venue;
  			
  			if(typeof(BG.Games[strVenuNamespace]) == 'undefined'){
  				//only bother to load if one does not exist
	  			var strSql = 'SELECT * FROM Venu WHERE namespace = "' + strVenuNamespace + '";';	
				BG.Query(strSql, BG.Spin.LoadVenue_callback);
				BG.Games[strVenuNamespace] = objPlayer;
  			}else{
  				
  				BG.Games[strVenuNamespace].AddPlayer(objPlayer);
  				
  			}
  			
 
		},
		
		Query:function(strQuery, funCallback){
			MLC.Query(
				strQuery,
				'bargames',
				funCallback
			);
		},
		Spin:{
			Query:function(strQuery, funCallback){
				MLC.Query(
					strQuery,
					'bargames_spin',
					funCallback
				);
			},
			LoadVenue_callback:function(err, rows, fields){
				if (err) throw err;
				if(rows.length == 0){
					delete BG.Games[objVenue.namespace];
					return false;
				}
				var objVenue = rows[0];
				//strVenuNamespace = rows[0].namespace;
				var strSql = 'SELECT * FROM SpinOption WHERE idVenue = ' + objVenue.idVenue + ';';	
				BG.Spin.Query(strSql, function(err, rows, fields){
					if (err) throw err;
					BG.Spin.AddNewGame(objVenue, rows);
				});
				
			},
			AddNewGame:function(objVenue, arrOptions){
				var objQuedPlayer = BG.Games[objVenue.namespace];
				BG.Games[objVenue.namespace] = new BG.SpinGame(objVenue, arrOptions);
				console.log("Added game for venu '" + objVenue.namespace + "'");
				BG.Games[objVenue.namespace].AddPlayer(objQuedPlayer);
			},
			RunTimer:function(){
				for(var strNamespace in BG.Games){
					BG.Games[strNamespace].RunTimer();
				}
				
				//Start over again
				/*setTimeout(
					BG.Spin.RunTimer,
					5000
				);*/
			}
		},
		
		
		
		
	}
BG.SpinGame = require('../BG/BG.SpinGame.js').BGSpinGame;
module.exports.BG = BG;