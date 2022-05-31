const socket = io.connect("ws://" + ip + ":10252");
let info_data = {}
socket.on("connect", () => {
    socket.emit("view_data")
})

socket.on('view_info', (data) => {
    info_data = data
    console.log(data)
    $('#info_zone').show()
    $('#info_amo').html(`ผู้เล่น ${data.arrPlayerlist.length}`)
    $('#info_player').html(data.arrPlayerlist.join(" , "))
})

socket.on('game_info', (data) => {
    console.log(data)
    $('#info_zone').hide()

    $('#question_zone').hide()
    $('#player_zone').show()

    // if (data.gameMode == 1) { // Normal Mode
    //     normal_game(data)
    // }

    if (data.inGameStage == 0) { // Prepapre
        // normal_game(data)
        // $('#q_question').html(data['question'].question)


    } else if (data.inGameStage == 1) { // Normal Mode
        // normal_game(data)
        $('#question_zone').show()
        $('#q_question').html(data['question'].question)

        $('#q_questionpicture').attr('src', data['question'].questionpicture)
        $('#q_questionexplain').html(data['question'].questionexplain)
        $('#q_answer').html(data['question'].answerPrefix + " ??? " + data['question'].answerSuffix)

        // playerdata = data['arrPlayerdata']



    } else if (data.inGameStage == 2) {
        $('#question_zone').show()
        $('#q_question').html(data['question'].question)

        $('#q_questionpicture').attr('src', data['question'].questionpicture);
        $('#q_questionexplain').html(data['question'].questionexplain)
        $('#q_answer').html(data['question'].answerPrefix + " ??? " + data['question'].answerSuffix)
    } else if (data.inGameStage == 3) {
        $('#question_zone').show()
        $('#q_question').html(data['question'].question)

        $('#q_questionpicture').attr('src', data['question'].questionpicture);
        $('#q_questionexplain').html(data['question'].questionexplain)
        $('#q_answer').html(data['question'].answerPrefix + " " + data['question'].answer + " " + data['question'].answerSuffix)

    }

    player_update(data)
})

socket.on('reset_game', () => {
    location.reload();
})

function player_update(data) {
    playerdata = data['arrPlayerdata']
    txt = ""
    if (data.inGameStage == 1 || data.inGameStage == 0) {
        data['arrPlayerlist'].forEach(pl => {
            stat = playerdata[pl].lock_down ? "ตอบแล้ว" : "ยังไม่ตอบ"
            card_col = playerdata[pl].lock_down ? "text-white bg-success" : "text-white bg-danger"
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
                    card_col = "text-white bg-primary"
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