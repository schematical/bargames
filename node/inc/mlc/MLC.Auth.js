var MLC = require('../mlc/MLC.js').MLC;
require('../mlc/MLC.Util.js');//.MLC;
var MLCAuth = {
	Users:{},
	Init:function(){
		MLC.AddDB(
			'util',
			{
			  host     : 'localhost',
			  user     : 'root',
			  password : 'learnlearn',
			}
		);
	},
	Authenticate:function(objUserData, objSocket, funCallback){
		MLC.Auth.LoadUserBySession(
			objUserData.id_user,
			objUserData.session,
			function(err, objUser){
				objSocket.set('mlc-user', objUser);
				objUser.socket = objSocket;
				MLC.Auth.Users[objUser.idUser] = objUser;
			}
		);
	},
	LoadUserBySession:function(intIdUser, strSession, funCallback){
		var objDate = new Date();
		var strDate = objDate.toYMD();
		var strQuery = 'SELECT * FROM AuthSession WHERE idUser = ' + intIdUser + ' AND ' +
		'sessionKey = "' + strSession + '" AND endDate > '  + strDate;
		MLCAuth.Query(strQuery, function(err, rows, fields){
			if(err) throw err;
			if(rows.length > 0){
				//Load the user record
				var strQuery = 'SELECT * FROM AuthUser WHERE idUser = ' + intIdUser + ';';
				MLCAuth.Query(strQuery, funCallback);
			}else{
				funCallback(null);
			}
		});
	},
	Query:function(strQuery, funCallback){
		MLC.Query(
			strQuery,
			'util',
			funCallback
		);
	}
	
}
var MLCUser = {

}
module.exports.Auth = MLCAuth;