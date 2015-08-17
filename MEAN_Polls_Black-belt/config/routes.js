var users = require('./../server/controllers/controller.js');

  module.exports = function(app) {

    app.get('/users', function(req, res) {
        users.show(req, res);
    })

    app.post('/add_poll', function(req, res) {
        users.add_poll(req, res);
    })

    app.get('/show_a_poll/:id', function(req, res) {
        users.show_a_poll(req, res);
    })

    app.get('/polls', function(req, res) {
        users.show_polls(req, res);
    })

    app.post('/get_option_by_key', function(req, res) {
        users.get_option_by_key(req, res);
    })

    app.post('/get_option_by_key_2', function(req, res) {
        users.get_option_by_key_2(req, res);
    })

    app.post('/get_option_by_key_3', function(req, res) {
        users.get_option_by_key_3(req, res);
    })

    app.post('/get_option_by_key_4', function(req, res) {
        users.get_option_by_key_4(req, res);
    })

    app.post('/remove', function(req, res) {
        users.remove(req, res);
    })

  };