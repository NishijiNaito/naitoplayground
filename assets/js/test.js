const ip = "101.51.254.191"
const socket = io.connect("ws://" + ip + ":10252");

socket.on("yeet", data => {
    alert(data.username + " you are yeet!!!")
});
socket.on("yeet_everyone", data => {
    alert(" you are yeeted by " + data.username)
});

function yeet() {
    socket.emit("yeet")
}

function yeet_everyone() {
    socket.emit("yeet_everyone")
}