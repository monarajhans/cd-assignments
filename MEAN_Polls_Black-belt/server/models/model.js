var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var UsersSchema = new mongoose.Schema({
	  name: String,
	  question: String,
	  created_at: Date,
	  option1_option: String,
	  option1_votes: Number,
	  option2_option: String,
	  option2_votes: Number,
	  option3_option: String,
	  option3_votes: Number,
	  option4_option: String,
	  option4_votes: Number
});

mongoose.model('User', UsersSchema);