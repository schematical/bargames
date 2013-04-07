var mysql = require('mysql');
var MLC = {
	DBs:{},
	strCurrDB:null,
	objListener:null,
	Init:function(objListener){
		MLC.Auth.Init();
		MLC.objListener = objListener;
		var app = require('http').createServer(handler)
		  , io = require('socket.io').listen(app)
		  , fs = require('fs')
		
		app.listen(5033);
		
		function handler (req, res) {
		  fs.readFile(__dirname + '/index.html',
		  function (err, data) {
		    if (err) {
		      res.writeHead(500);
		      return res.end('Error loading index.html');
		    }
		
		    res.writeHead(200);
		    res.end(data);
		  });
		}
		
		io.sockets.on('connection', MLC.Connect_callback);
	},
	Handshake:function(socket){
		//console.log(socket);
	},
	AddDB:function(strDB, objConn){
		MLC.DBs[strDB] = objConn;
	},
	Connect_callback:function(objSocket){
		objSocket.on(
		 	'mlc-handshake-response', 
		 	MLC.HandshakeResponse
		 );
		 objSocket.emit(
		 	'mlc-handshake', 
		 	{ message: 'Welcom to MLC socketserver 1.0' }
		 );
		 
	},
	HandshakeResponse:function(objData){
		
		objSocket = this;
		if(typeof(objData.user) != 'undefined'){
			MLC.Auth.Authenticate(objData.user, objSocket);
		}
		MLC.objListener.HandshakeResponse(objData, objSocket)
	},
	ConnectDB:function(strDB){
		//console.log("Connecting: " + strDB);
		if(typeof(strDB) != 'undefined'){
			if(MLC.strCurrDB != strDB){
				if(typeof MLC.DBs == 'undefined'){
					throw new Error("No db with those credentials listed");
				}
				if(typeof(MLC.DBs[strDB].connection) == 'undefined'){
					MLC.DBs[strDB].connection = mysql.createConnection(MLC.DBs[strDB]);
					MLC.DBs[strDB].connection.connect();
					MLC.DBs[strDB].connection.query(
						'USE ' + strDB, 
						 function(err, rows, fields) {
							if (err) throw err;
						 	console.log('Selected DB ' + strDB);
						 }
					);
				}
			}
		}else{
			strDB = MLC.strCurrDB;
		}
		return MLC.DBs[strDB].connection;
	},	
	Query:function(strSql, strDB, funCallback){
		var objConnection = MLC.ConnectDB(strDB);
		console.log(strSql);
		objConnection.query(
			strSql, 
			funCallback
			/*function(err, rows){
				console.log(err);
				console.log(rows);
			}*/
		);
	}
}
module.exports.MLC = MLC;