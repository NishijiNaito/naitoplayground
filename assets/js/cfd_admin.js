const socket = io.connect("ws://" + ip + ":10252");
let info_data = {}
socket.on("connect", () => {
    socket.emit("adm_logon")
})

socket.on('adm_info', (data) => {
    info_data = data
    console.log(data)
    $('#info_zone').show()
    $('#info_amo').html(`ผู้เล่น ${data.arrPlayerlist.length} คน`)
    $('#info_player').html(data.arrPlayerlist.join(" , "))
})

socket.on('game_info', (data) => {
    console.log(data)
    $('#info_zone').hide()
    $('#console_zone').hide()
    $('#player_zone').show()
        // if (data.gameMode == 1) { // Normal Mode
        //     normal_game(data)
        // }

    if (data.inGameStage == 0) { //Prepare Question
        $('#question_zone').show()
        $('#player_zone').show()

        $('#question').val("")
        $('#questionexplain').val("")
        $('#answerPrefix').val("")
        $('#answerSuffix').val("")
        $('#answer').val("")


    } else if (data.inGameStage == 1) {
        console.log(data)
        $('#console_zone').show()
        $('#player_zone').show()

        $('#c_question').html(data['question'].question)
        $('#c_questionexplain').html(data['question'].questionexplain)
        $('#c_answer').html(data['question'].answerPrefix + " " + data['question'].answer + " " + data['question'].answerSuffix)
        $('#spa').prop('disabled', false)
        $('#ra').prop('disabled', true)

    } else if (data.inGameStage == 2) {
        $('#console_zone').show()
        $('#player_zone').show()
        $('#c_question').html(data['question'].question)
        $('#c_questionexplain').html(data['question'].questionexplain)
        $('#c_answer').html(data['question'].answerPrefix + " " + data['question'].answer + " " + data['question'].answerSuffix)
        $('#spa').prop('disabled', true)
        $('#ra').prop('disabled', false)

    } else if (data.inGameStage == 3) {
        $('#console_zone').show()
        $('#player_zone').show()
        $('#c_question').html(data['question'].question)
        $('#c_questionexplain').html(data['question'].questionexplain)
        $('#c_answer').html(data['question'].answerPrefix + " " + data['question'].answer + " " + data['question'].answerSuffix)

    }


    player_update(data)
})

socket.on('reset_game', () => {
    location.reload();
})

$('#start_form').submit(function(e) {
    e.preventDefault();
    console.log($('#start_form').serializeArray())
        // localStorage.setItem("name", $('#name').val())
        // $('#register_zone').hide()
        // socket.emit("register", { name: localStorage.getItem("name") })
    socket.emit("start_game", { gamemode: $('#game_mode').val() })
});
$('#question_form').submit(function(e) {
    e.preventDefault();
    console.log($('#start_form').serializeArray())
    question = $('#question').val()
    questionexplain = $('#questionexplain').val()
    answer = parseFloat($('#answer').val())
    answerPrefix = $('#answerPrefix').val()
    answerSuffix = $('#answerSuffix').val()
    questionare = { question, questionexplain, answer, answerPrefix, answerSuffix }

    // console.log()
    $('#question_zone').hide()

    socket.emit("submit_question", questionare)

    // localStorage.setItem("name", $('#name').val())
    // $('#register_zone').hide()
    // socket.emit("register", { name: localStorage.getItem("name") })
    // socket.emit("start_game", { gamemode: $('#game_mode').val() })
});
/*
function normal_game(data) {
    $('#info_zone').hide()
    $('#console_zone').hide()
    if (data.inGameStage == 0) { //Prepare Question
        $('#question_zone').show()
        $('#player_zone').show()

    } else if (data.inGameStage == 1) {
        console.log(data)
        $('#console_zone').show()
        $('#player_zone').show()

        $('#c_question').html(data['question'].question)
        $('#c_questionexplain').html(data['question'].questionexplain)
        $('#c_answer').html(data['question'].answerPrefix + " " + data['question'].answer + " " + data['question'].answerSuffix)

    } else if (data.inGameStage == 2) {
        $('#console_zone').show()
        $('#player_zone').show()

    } else if (data.inGameStage == 3) {
        $('#console_zone').show()
        $('#player_zone').show()

    }
}
*/
function player_update(data) {
    playerdata = data['arrPlayerdata']
    txt = ""
    if (data.inGameStage == 1 || data.inGameStage == 0) {
        data['arrPlayerlist'].forEach(pl => {
            stat = playerdata[pl].lock_down ? "ตอบแล้ว" : "ยังไม่ตอบ"
            txt +=
                `
                <div class="col-md-3">
                    <div class="card mb-3" style="font-size: 25px;">
                        <div class="card-header text-center">
                            ${pl} (${playerdata[pl].score})
                        </div>
                        <div class="card-body text-center">
                            <form id="question_form">
                                <p class="card-text">
                                    ${stat}
                                </p>
                                <p class="card-text">
                                    
                                </p>
                            </form>
    
                        </div>
                    </div>
                </div>
            
            `

        });
    } else if (data.inGameStage == 2) {
        data['arrPlayerlist'].forEach(pl => {

            if (playerdata[pl].lock_down) {
                p_range = `Min : ${playerdata[pl].min} <br> Max : ${playerdata[pl].max}`
                p_size = playerdata[pl].size
            } else {
                p_range = `ไม่ได้ตอบ`
                p_size = "-"
            }


            // stat = playerdata[pl].lock_down ? "ตอบแล้ว" : "ยังไม่ตอบ"
            txt +=
                `
                <div class="col-md-3">
                    <div class="card mb-3" style="font-size: 25px;">
                        <div class="card-header text-center">
                            ${pl} (${playerdata[pl].score})
                        </div>
                        <div class="card-body text-center">
                            <form id="question_form">
                                <p class="card-text">
                                    ${p_range}
                                </p>
                                <p class="card-text">
                                    ${p_size}
                                </p>
                            </form>
    
                        </div>
                    </div>
                </div>
            
            `

        });

    } else if (data.inGameStage == 3) { //result
        data['arrPlayerlist'].forEach(pl => {

            if (playerdata[pl].lock_down) { // is lock down

                if (playerdata[pl].answer_status == "correct_smallest") {
                    card_col = "text-white bg-success"
                } else if (playerdata[pl].answer_status == "correct") {
                    card_col = "text-dark bg-primary"
                } else {
                    card_col = "text-white bg-danger"
                }




                p_range = `Min : ${playerdata[pl].min} <br> Max : ${playerdata[pl].max}`
                p_size = playerdata[pl].size
            } else {


                card_col = "text-white bg-dark"
                p_range = `ไม่ได้ตอบ`
                p_size = "-"
            }

            // text-white bg-primary
            // stat = playerdata[pl].lock_down ? "ตอบแล้ว" : "ยังไม่ตอบ"
            txt +=
                `
                <div class="col-md-3">
                    <div class="card ${card_col} mb-3" style="font-size: 25px;">
                        <div class="card-header text-center">
                            ${pl} (${playerdata[pl].score})
                        </div>
                        <div class="card-body text-center">
                            <form id="question_form">
                                <p class="card-text">
                                    ${p_range}
                                </p>
                                <p class="card-text">
                                    ${p_size}
                                </p>
                            </form>
    
                        </div>
                    </div>
                </div>
            
            `

        });

    }


    $('#player_detail').html(txt)

}

function show_Player_answer() {
    $('#spa').prop('disabled', true)
    $('#ra').prop('disabled', false)
    socket.emit("show_player_answer")
}

function Reveal_answer() {
    $('#ra').prop('disabled', true)
    socket.emit("reveal_answer")
}

function reset_question() {
    socket.emit("reset_question")
}

function reset_game() {
    socket.emit("reset_game")
}