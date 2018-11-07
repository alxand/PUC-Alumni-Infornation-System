var app = require('express')();
var http =require('http').Server(app);
var io = require('socket.io')(http);


app.get('/', (req,res)=>{
	res.sendFile(__dirname +'/chat/index.htm');
});


io.on('connection', function(socket){
  socket.on('chat message', function(msg){
    console.log('message: ' + msg);
  });
})

http.listen(3000,()=>{
	console.log('Yes the server is listening at port 3000');
});