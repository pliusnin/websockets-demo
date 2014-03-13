var broadcast = require('./lib/broadcast')(),
    connect = require('connect'),
    zmq = require('zmq');

var server = connect()
    .use(connect.static(__dirname + '/public'))
    .listen(8081);

broadcast.installHandlers(server, {
    prefix: '/broadcast',
    sockjs_url: '/sockjs-0.3.js'
});

var sub = zmq.socket('rep');

sub.on('message', function (response) {
  broadcast.send(response);
  console.log('Message has been sent to all clients...');
  sub.send(true);
});

sub.bind('tcp://127.0.0.1:5557');
console.log('Server running...');

process.on('SIGINT', function() {
    server.close();
    sub.close();
    console.log('Server stopped.');
});