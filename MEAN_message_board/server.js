var express = require("express");
var app = express();
var path = require("path");
var mongoose = require('mongoose');
var bodyParser = require("body-parser");
var Schema = mongoose.Schema;

app.use(bodyParser.urlencoded( {extended: true} ));
app.use(express.static(path.join(__dirname, "./static")));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

mongoose.connect('mongodb://localhost/message_board');

var PostsSchema = new mongoose.Schema({
 name: String, 
 post_text: String,
 comments: [{type: Schema.Types.ObjectId, ref: 'Comment'}]
});

var Posts = mongoose.model('Post', PostsSchema);

var commentSchema = new mongoose.Schema({
 _post: {type: Schema.ObjectId, ref: 'Post'},
 name: String, 
 comment_text: String,
 created_at: {type: Date, default: new Date}
});

var Comments = mongoose.model('Comment', commentSchema);

app.get('/', function(req, res) {
  Posts.find({})
   		.populate('comments')
  		.exec(function(err, post) {
  	if(err) 
    {
      console.log('something went wrong');
    } 
    else 
    {
      for(attr in post)
      {
      	for (var i=0; i<post[attr].comments.length; i++)
      	{
      		Comments.find({_id: post[attr].comments[i]}, function(err, quote) {
      			for(x in quote)
      			{
      				post[attr].comments[i] = 
      				{
      					name: quote[x].name,
      					comment: quote[x].comment_text
      				};
      			}
      		});
      	} 
 	 }
 	 res.render('index', {posts: post});
 	}
        });
  })

app.post('/add_post', function(req, res) {
console.log("POST DATA", req.body);
  var post = new Posts({name: req.body.name, post_text: req.body.post});
  post.save(function(err) {
    if(err) 
    {
      console.log('something went wrong');
    } else 
    {
      console.log('successfully added a post message!');
      res.redirect('/');
    }
  })
})

app.post('/add_comment/:id', function (req, res){
console.log("POST DATA", req.body);
  var comment = new Comments({name: req.body.name, comment_text: req.body.comment});
  comment.save(function(err) {
    if(err) 
    {
      console.log('something went wrong');
    } else 
    {
      console.log('successfully added a comment message!');
      Posts.update({_id: req.params.id}, {$push: {comments: comment.id}}, function (err, comment){
        res.redirect('/');
    })
    }
  })
})

app.listen(8000, function() {
 console.log("listening on port 8000");
})