var server = require("http").Server();

var Redis = require("ioredis");
var redis = new Redis();

// Create a new Socket.io instance
var io = require("socket.io")(server, {
    cors: {
        origin: "*",
    },
});

redis.psubscribe("*");

redis.on("pmessage", function (pattern, channel, message) {
    message = JSON.parse(message);
    io.emit("test", message);
    console.log(message);
    console.log(channel);
    console.log(pattern);
});

server.listen(3000);

console.log("Server started");
