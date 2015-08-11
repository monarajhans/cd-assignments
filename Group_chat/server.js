var express = require("express");
var path = require("path");
var app = express();
var bodyParser = require('body-parser');

app.use(bodyParser.urlencoded());
app.use(express.static(path.join(__dirname, "./static")));

app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
 response.render("index");
})

var server = app.listen(8000, function() {
 console.log("listening on port 8000");
})

var users = [];
var messages = [];

var io = require('socket.io').listen(server);

io.sockets.on('connection', function (socket) {
  
  socket.emit("connection_set");

	socket.on("new_user", function (name){
		console.log(name);
		users.push({name: name,
					id: socket.id
					});
		var welcome = name + " joined the chat";
		io.emit("welcome", welcome);
	})
	socket.on("new_message", function (user_details){
		
		var current_user = '';
		for(var i = 0; i < users.length; i++)
		{
			if(users[i].id == user_details.current_user_id)
			{
				current_user = users[i].name;
			}
		}
		
		var current_message = {
					message: user_details.message,
					name: current_user
					};
		
		io.emit("log_messages", current_message);
	})
	socket.on('disconnect', function () {
		
		var disconnected_user = '';
		for(var i = 0; i < users.length; i++)
		{
			if(users[i].id == socket.id)
			{
				disconnected_user = users[i].name;
			}
		}
		console.log(disconnected_user);
		var user_left = disconnected_user + " has left the chat";
		io.emit("user_disconnected", user_left);
	})
})

// io.sockets.on('disconnect', function (socket) {
// 	console.log("left");
// })