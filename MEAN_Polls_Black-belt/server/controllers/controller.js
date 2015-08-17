var mongoose = require('mongoose');
var User = mongoose.model('User');

module.exports = (function() {
	return {

		show: function(req, res) {
		     User.find({}, function(err, results) {
		       if(err) {
		         console.log(err);
		       } else {
		         res.json(results);
		       }
		    });
		  },

		add_poll: function(req, res)
		{
			var new_poll = new User({name: req.body.name, 
		    						created_at: new Date().toString(),
		    						question: req.body.question,
		    						option1_option: req.body.option1_option,
		    						option1_votes: 0,
		    						option2_option: req.body.option2_option,
		    						option2_votes: 0,
		    						option3_option: req.body.option3_option,
		    						option3_votes: 0,
		    						option4_option: req.body.option4_option,
		    						option4_votes: 0,
									});

		    new_poll.save(function(err, results) {
		      if(err) {
		         console.log(err);
		       } else {
		         res.json(results);
		       }
		    });
		},

		show_a_poll: function(req, res) {
	    	 User.find({_id: req.params.id}, function(err, results) {
	    	   if(err) {
	     	    console.log(err);
	      	 } else {
	      	   res.json(results);
	     	  }
	     	 });
		},

		show_polls: function(req, res) {
		    User.find({}, function(err, results) {
		       if(err) {
		         console.log(err);
		       } else {
		         res.json(results);
		       }
		    });
		},

		remove: function(req,res){
			console.log("req.body", req.body);
		    User.remove({_id: req.body._id}, function(err, results){
		    });
		}, 

		get_option_by_key: function(req, res) {
		    User.find({option1_option: req.body.key}, function(err, results) {
		       if(err) 
		       {
		         console.log(err);
		       } 
		       else 
		       {
		       	var temp = results[0].option1_votes + 1;
		       	User.update({option1_option: results[0].option1_option}, {$set: {option1_votes: temp}}, function(err, results){
		       		if(err) 
		       		{
		         		console.log(err);
				    } 
				    else 
				    {
				        res.json(results);
				    }
				    console.log(results);
		       	});
		       }
		    });
		},

		get_option_by_key_2: function(req, res) {
		    User.find({option2_option: req.body.key}, function(err, results) {
		       if(err) {
		         console.log(err);
		       } else {
		       	var temp = results[0].option2_votes + 1;
		       	User.update({option2_option: results[0].option2_option}, {$set: {option2_votes: temp}}, function(err, results){
		       		if(err) {
		         		console.log(err);
				    } 
				    else 
				    {
				        res.json(results);
				    }
				    console.log(results);
		       	});
		       }
		    });
		},

		get_option_by_key_3: function(req, res) {
		    User.find({option3_option: req.body.key}, function(err, results) {
		       if(err) {
		         console.log(err);
		       } else {
		       	var temp = results[0].option3_votes + 1;
		       	User.update({option3_option: results[0].option3_option}, {$set: {option3_votes: temp}}, function(err, results){
		       		if(err) {
		         		console.log(err);
				    } 
				    else 
				    {
				        res.json(results);
				    }
				    console.log(results);
		       	});
		       }
		    });
		},

		get_option_by_key_4: function(req, res) {
		    User.find({option4_option: req.body.key}, function(err, results) {
		       if(err) {
		         console.log(err);
		       } else {
		       	var temp = results[0].option4_votes + 1;
		       	User.update({option4_option: results[0].option4_option}, {$set: {option4_votes: temp}}, function(err, results){
		       		if(err) {
		         		console.log(err);
				    } else {
				        res.json(results);
				    }
		       	});
		       }
		    });
		}
	}
}) ();	