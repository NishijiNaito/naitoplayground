// const ip = "101.51.253.23"
const socket = io.connect("ws://" + ip + ":10252");
const cho = ['a', 'b', 'c', 'd'];
data = { type: "admin" }

socket.on("ask_status", () => {
    socket.emit("send_status", data)
})

socket.on("set_viewer_status", (data) => {
    console.log(data)
    set_status(data)
})
socket.on("play_sound_locked_down", () => {
    acc_start.pause()
    acc_start.currentTime = 0;
    locked_down.play()
})

function set_status(data) {

    step = data['question'].step
    if (step == 0) {
        $('#sq').prop('disabled', true);
        $('#sa').prop('disabled', true);
        $('#rs').prop('disabled', true);
    } else if (step == 1) {
        $('#sq').prop('disabled', true);
        $('#sa').prop('disabled', true);
        $('#rs').prop('disabled', false);
    } else if (step == 2) {
        $('#sq').prop('disabled', true);
        $('#sa').prop('disabled', false);
        $('#rs').prop('disabled', false);
    } else if (step == 3) {
        $('#sq').prop('disabled', true);
        $('#sa').prop('disabled', true);
        $('#rs').prop('disabled', false);
    }
}

function set_question() {
    console.log(question)
    socket.emit("set_question", question)
}

function show_answer() {
    socket.emit("show_answer")
}

function reset_round() {
    socket.emit("reset_round")

}

function reset_game() {
    socket.emit("reset_game")

}