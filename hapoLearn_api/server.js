const express = require('express')
const app = express()
const http = require('http')
const server = http.createServer(app)
const { Server } = require("socket.io")

const io = new Server(server, {
    cors: "*"
})

io.on('connection', (socket) => {
    console.log("client " + socket.id + ": ket noi!!!");
    socket.on('stream', (data) => {
        // if (data instanceof Buffer) {
        //   // Xử lý dữ liệu dạng Buffer tại đây
        io.emit('stream', data)
        // }
    });
    socket.on("disconnect", () => {
        console.log("Client " + socket.id + ": ngat ket noi");
    });
})

server.listen(33399, () => {
    console.log('Listening on *:33399')
})