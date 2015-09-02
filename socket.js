var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});

io.on('connection', function (socket) {
    console.log("new client connected");
    var redis = new Redis();
    redis.subscribe('test-channel', function(err, count) {

    });
    redis.on('message', function(channel, message) {
        console.log('The Channel is: ' + channel);
        console.log('Message Recieved: ' + message);
        message = JSON.parse(message);
        socket.emit(channel + ':' + message.event, message.data);

    });
});

io.on('disconnect', function() {
    redis.quit();
});