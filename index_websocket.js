
//require our espressjs library 
var app = require('express')(); 

//creating a http server at port 9090 
var http = require('http').Server(app);

// socket.io librry
var io = require('socket.io')(http);
app.get('/video', function(req, res){
   res.sendFile(__dirname +'/websocket.htm');
});
app.get('/message', function(req, res){
   res.sendFile(__dirname +'/index_message_chat.htm');
});
//all connected to the server users 
var users = {};
var count = 0;
  
//when a user connects to our sever 
io.on('connection', function(socket) {
   count++;
   console.log("User connected");
   socket.on('chat message', function(msg){
    console.log('message: ' + msg);
    socket.emit('from_server', {server:msg});
    socket.send('message from the server to all');
   });
   socket.on('login', function(data) {
      console.log(data.name);
      //if anyone is logged in with this username then refuse 
            if(users[data.name]) { 
               socket.emit('LoginFail', { 
                  type: "login", 
                  success: false 
               }); 
            } else { 
               //save user connection on the server 
               users[data.name] = socket.id; 
               socket.name = data.name; 
               console.log(users);
               socket.emit('LoginSuccess', { 
                  type: "login", 
                  success: true 
               }); 
            }
   });

   socket.on('candidate',function(data) {
      
         console.log("Sending candidate to:",data.name); 
            var conn = users[data.name];
        
            if(conn != null) { 
               socket.emit('candidate', { 
                  type: "candidate", 
                  candidate: data.candidate 
               }); 
            } 
      
   })

   socket.on('offer',function(data) {
         console.log("Sending offer to:",data.name); 
         //if UserB exists then send him offer details 
            var conn = users[data.name]; 
        
            if(conn != null) { 
               //setting that UserA connected with UserB 
               socket.otherName = data.name; 
               console.log("Sending offer to:",data.name); 
               socket.emit('offer', { 
                  type: "offer", 
                  name: socket.name 
               }); 
            }
   })

   socket.on('answer',function(data) {
         console.log("Sending answer to: ", data.name); 
            //for ex. UserB answers UserA 
            var conn = users[data.name]; 
            if(conn != null) { 
               console.log('answered from server');
               socket.emit('answer', { 
                  type: "answer", 
                  answer: data.answer 
               }); 
            } 
      
   })

   //when server gets a message from a connected user 
  /* socket.on('message', function(message) { 
      var data; 
      //accepting only JSON messages 
      try { 
         data = JSON.parse(message); 
      } catch (e) { 
         console.log("Invalid JSON"); 
         data = {}; 
      }
    
      //switching type of the user message 
      switch (data.type) { 
         //when a user tries to login
         case "login": 
            console.log("User logged", data.name); 
        
            //if anyone is logged in with this username then refuse 
            if(users[data.name]) { 
               socket.emit('LoginFail', { 
                  type: "login", 
                  success: false 
               }); 
            } else { 
               //save user connection on the server 
               users[data.name] = connection; 
               socket.name = data.name; 
          
               socket.emit('LoginSuccess', { 
                  type: "login", 
                  success: true 
               }); 
            } 
        
            break;
        
         case "offer": 
            //for ex. UserA wants to call UserB 
            console.log("Sending offer to: ", data.name);
        
            //if UserB exists then send him offer details 
            var conn = users[data.name]; 
        
            if(conn != null) { 
               //setting that UserA connected with UserB 
               socket.otherName = data.name; 
          
               socket.emit('offer', { 
                  type: "offer", 
                  offer: data.offer, 
                  name: socket.name 
               }); 
            }
        
            break;
        
         case "answer": 
            console.log("Sending answer to: ", data.name); 
            //for ex. UserB answers UserA 
            var conn = users[data.name]; 
        
            if(conn != null) { 
               socket.otherName = data.name; 
               socket.emit('answer', { 
                  type: "answer", 
                  answer: data.answer 
               }); 
            } 
        
            break; 
        
         case "candidate": 
            console.log("Sending candidate to:",data.name); 
            var conn = users[data.name];
        
            if(conn != null) { 
               socket.emit('candidate', { 
                  type: "candidate", 
                  candidate: data.candidate 
               }); 
            } 
        
            break;
        
         case "leave": 
            console.log("Disconnecting from", data.name); 
            var conn = users[data.name]; 
            conn.otherName = null; 
        
            //notify the other user so he can disconnect his peer connection 
            if(conn != null) {
               socket.emit('leave', { 
                  type: "leave" 
              }); 
            }
        
            break;
        
         default: 
            socket.emit('error', { 
               type: "error", 
               message: "Command not found: " + data.type 
            }); 
        
            break; 
      }
    
   }); */
  
   //when user exits, for example closes a browser window 
   //this may help if we are still in "offer","answer" or "candidate" state

   socket.on('leave',function(data) {
      console.log("Disconnecting from", data.name); 
            var conn = users[data.name]; 
        
            //notify the other user so he can disconnect his peer connection 
            if(conn != null) {
               socket.emit('leave', { 
                  type: "leave" 
              }); 
            }
   }); 
   socket.on("disconnect", function() { 
  
            console.log("Disconnecting from ", socket.otherName); 
               socket.emit('leave', { 
                  type: "leave" 
               }); 
                
   });  
  
   //connection.send("Hello world");  
});
  


function sendTo(connection, message) { 
   connection.send(JSON.stringify(message)); 
}


http.listen(2000, function() {
   console.log('The Chat app is listening at port 2000');
   // body...
});