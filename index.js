const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.php');
});

io.on('connection', (socket) => {
    console.log('Kullanıcı bağlandı!');
    socket.on('send-data',function(data){
        console.log(data);
        io.emit('datas',data);
    });

    socket.on('new-data',function(data){
      io.emit('newdata',data);
    });

    socket.on('disconnect', () => {
        console.log('Kullanıcı ayrıldı');
      });
    });

server.listen(5000, () => {
  console.log('listening on : 5000');
});