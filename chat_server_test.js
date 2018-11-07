var app = require('express')();
var http =require('http').Server(app);
var io = require('socket.io')(http);


app.get('/', (req,res)=>{
	res.sendFile(__dirname +'/index_soc.htm');
});

io.on('connection', (socket)=>{
	console.log('Someone is connected oo');
	socket.on('chat message', function(msg){
    console.log('message: ' + msg);
    socket.emit('from_server', {server:msg});
    socket.send('message from the server to all');
  	});

  	socket.on('disconnect', ()=>{
  		console.log("User has disconnect o");
  	})
});

http.listen(3000,()=>{
	console.log('Yes the server is listening at port 3000');
});