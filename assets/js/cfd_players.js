const socket = io.connect("ws://" + ip + ":10252");

socket.on("connect", () => {
    console.log(socket.playername)
    console.log(socket.id + " connected")

    if (localStorage.getItem("name") == null) {
        $('#register_zone').show()
        socket.emit("check_can_register")
    } else {
        $('#register_zone').hide()
        socket.emit("register", { name: localStorage.getItem("name") })
    }

})

$('#register_form').submit(function(e) {
    e.preventDefault();
    // console.log($('#register_form').serializeArray())
    localStorage.setItem("name", $('#name').val())
    $('#register_zone').hide()
    socket.emit("register", { name: localStorage.getItem("name") })
        // localStorage.getItem("name")
});

socket.on("move_to_viewer", () => {
    localStorage.clear()
    $('#register_zone').hide()
    viewerpage()
        // alert("Game is Playing, move to viewer mode")
})

socket.on("waiting_time", () => {
    $("#detail_zone").show()
    $("#detail_name").html(`ยินดีต้อนรับนะ ${localStorage.getItem("name")}`)
    $("#detail_info").html(`โปรดรอสักครู่ กำลังอยู่ในช่วงลงทะเบียนเล่นเกม`)
})

socket.on('game_info', (data) => {
    // console.log(data)
    $('#detail_zone').hide()
    $('#question_zone').hide()
        // $('#detail_zone').hide()
        // $('#player_zone').show()
    if (data.inGameStage == 0) { // Prepapre
        // normal_game(data)
        // $('#q_question').html(data['question'].question)


    } else if (data.inGameStage == 1) { // Normal Mode
        // normal_game(data)
        $('#question_zone').show()
        $('#q_question').html(data['question'].question)
            // $('#min').val("")
            // $('#max').val("")
        playerdata = data['arrPlayerdata']
        if (playerdata[localStorage.getItem('name')].lock_down) { //lock_down
            $('#question_zone').hide()
        } else { // not suvmit
            $('#question_zone').show()
            $('#q_question').html(data['question'].question)
            $('#q_questionexplain').html(data['question'].questionexplain)
            $('#q_questionpicture').attr('src', data['question'].questionpicture)
            $('#q_answer').html(data['question'].answerPrefix + " ??? " + data['question'].answerSuffix)
        }


    }
    // player_update(data)
})

socket.on('reset_game', () => {
    location.reload();
})

$('#answer_form').submit(function(e) {
    e.preventDefault();

    min = parseFloat($('#min').val())
    max = parseFloat($('#max').val())

    if (min > max) { //error input
        Swal.fire(
            'ผิดพลาด',
            'โปรดป้อนคำตอบให้สัมพันธ์กัน',
            'error'
        ).then(() => {
            $('#min').val("")
            $('#max').val("")
        })
    } else {
        size = parseFloat(max - min)
        ansset = { min, max, size }

        // console.log(ansset)
        socket.emit("submit_answer", ansset)
        $('#min').val("")
        $('#max').val("")
    }




    // console.log($('#register_form').serializeArray())
    // localStorage.setItem("name", $('#name').val())
    // $('#register_zone').hide()
    // socket.emit("register", { name: localStorage.getItem("name") })
    // localStorage.getItem("name")

});