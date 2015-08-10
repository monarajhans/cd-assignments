var express = require("express");
var app = express();
var path = require("path");
var mongoose = require('mongoose');
var bodyParser = require("body-parser");

mongoose.connect('mongodb://localhost/basic_mongoose');

var UserSchema = new mongoose.Schema({
 name: String,
 age: Number
})
var User = mongoose.model('User', UserSchema);

app.use(bodyParser.urlencoded());
app.use(express.static(path.join(__dirname, "./static")));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');
// app.get('/', function(req, res) {
//  res.render('index');
// })

app.get('/', function(req, res) {
  User.find({}, function(err, users) {
  	console.log(users);
  	res.render('index', {users:users});
  })
})

app.post('/users', function(req, res) {
  console.log("POST DATA", req.body);
  var user = new User({name: req.body.name, age: req.body.age});
  console.log(req.body);
  user.save(function(err) {
    if(err) {
      console.log('something went wrong');
    } else {
      console.log('successfully added a user!');
      res.redirect('/');
    }
  })
})



app.listen(8000, function() {
 console.log("listening on port 8000");
})

