// (
//     function connect() {
//         let socket = io.connect('http://localhost:10252');
//         socket.emit("change_data", { nsj_data: "Haha" })
//     }
// )();

// ทำการเชื่อม Websocket Server ตาม url ที่กำหนด
var connection = new WebSocket('ws://localhost:10252')
connection.onopen = function() {
    // จะทำงานเมื่อเชื่อมต่อสำเร็จ
    console.log("connect webSocket");
    connection.send("Hello ABCDEF"); // ส่ง Data ไปที่ Server
};
connection.onerror = function(error) {
    console.error('WebSocket Error ' + error);
};
connection.onmessage = function(e) {
    // log ค่าที่ถูกส่งมาจาก server
    console.log("message from server: ", e.data);
};
connection.addEventListener('yeet', (data) => {
    console.log(data.data)
})