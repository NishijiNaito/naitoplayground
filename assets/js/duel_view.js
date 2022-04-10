// const ip = "101.51.253.23"
const socket = io.connect("ws://" + ip + ":10252");
const cho = ['a', 'b', 'c', 'd'];
data = { type: "viewer" }
let server_stat = []
socket.on("ask_status", () => {
    socket.emit("send_status", data)
})


socket.on("set_viewer_status", (data) => {
    // console.log(data)
    server_stat = data
    set_status(data)
})

socket.on("play_sound_locked_down", () => {
    acc_start.pause()
    acc_start.currentTime = 0;
    isacc = false
    locked_down.play()
})

socket.on('all_acc', (data) => {
    acctime = 7
    isacc = true
    acc_start.play()

})


var i = 0;
var col = ['#000000', '#FFFFFF']
var isacc = false
var acctime = 0;
var acc = window.setInterval(function() {

    if (isacc) {
        if (i == 1) {
            i = 0
        } else {
            i++
        }
        $('body').css('background-color', col[i]);
    } else {
        $('body').css('background-color', "#000000");
    }


}, 500);
// $('#acc_group').hide();
var acctime = window.setInterval(function() {

    if (isacc) {
        // $('#acc_group').show();
        if (acctime == 0) {
            isacc = false
                // socket.emit('yellow_locked_down')
        } else {
            acctime--
            // $('#acc_time').html(acctime + " Second to Locked Down");
        }


    } else {
        // $('#acc_group').hide();
    }


}, 1000);



function set_status(data) {
    $('#board_question').html(data['question'].question)
    $('#choice_a').html(data['question'].a)
    $('#choice_b').html(data['question'].b)
    $('#choice_c').html(data['question'].c)
    $('#choice_d').html(data['question'].d)



    $('#chips_blue').html(data['player_blue'].chip_cal)
    $('#chips_yellow').html(data['player_yellow'].chip_cal)

    $('#acc_blue').html("กดดัน > " + data['player_blue'].acc)
    $('#acc_yellow').html(data['player_yellow'].acc + " < กดดัน")

    if (data['question'].step == 3) {
        quest = data['question']

        cho.forEach(ch => {
            if (quest.answer == ch) {
                $('#choice_' + ch).css('background-color', '#24D619');
            } else {
                $('#choice_' + ch).css('background-color', '');
            }
        });
        answer_blue(data['player_blue'], data['question'].answer)
        answer_yellow(data['player_yellow'], data['question'].answer)

    } else {
        $('#choice_a').css('background-color', '');
        $('#choice_b').css('background-color', '');
        $('#choice_c').css('background-color', '');
        $('#choice_d').css('background-color', '');
        status_blue(data['player_blue'])
        status_yellow(data['player_yellow'])
    }
    if (data['question'].step == 2) {
        isacc = false
    }

    if (data['question'].step == 0) {
        $('#question_group').hide()
        $('#choice_group').hide()

    } else {
        $('#question_group').show()
        $('#choice_group').show()
    }

}

function answer_blue(data, ans) {

    cho.forEach(ch => {
        if (data[ch]) {
            if (ch == ans) { //correct
                $('#choice_' + ch + '_blue').css('background-color', '#24D619');
                $('#choice_' + ch + '_blue').css('color', '');

            } else { // wrong
                $('#choice_' + ch + '_blue').css('background-color', 'red');
                $('#choice_' + ch + '_blue').css('color', '');


            }
        } else {
            $('#choice_' + ch + '_blue').css('background-color', '');
            $('#choice_' + ch + '_blue').css('color', '');

        }
    })


}

function status_blue(data) {
    cho.forEach(ch => {
        if (data[ch]) {
            if (data['locked_down']) {
                $('#choice_' + ch + '_blue').css('background-color', '#FFFFFF');
                $('#choice_' + ch + '_blue').css('color', '#1181FF');

            } else {
                $('#choice_' + ch + '_blue').css('background-color', '#1181FF');
                $('#choice_' + ch + '_blue').css('color', '');


            }
        } else {
            $('#choice_' + ch + '_blue').css('background-color', '');
            $('#choice_' + ch + '_blue').css('color', '');

        }
    })
}

function answer_yellow(data, ans) {
    cho.forEach(ch => {
        if (data[ch]) {
            if (ch == ans) {
                $('#choice_' + ch + '_yellow').css('background-color', '#24D619');
                $('#choice_' + ch + '_yellow').css('color', '');

            } else {
                $('#choice_' + ch + '_yellow').css('background-color', 'red');
                $('#choice_' + ch + '_yellow').css('color', '');


            }
        } else {
            $('#choice_' + ch + '_yellow').css('background-color', '');
            $('#choice_' + ch + '_yellow').css('color', '');

        }

    })


}

function status_yellow(data) {
    cho.forEach(ch => {
        if (data[ch]) {
            if (data['locked_down']) {
                $('#choice_' + ch + '_yellow').css('background-color', '#FFFFFF');
                $('#choice_' + ch + '_yellow').css('color', '#D3D300');

            } else {
                $('#choice_' + ch + '_yellow').css('background-color', '#FFFF02');
                $('#choice_' + ch + '_yellow').css('color', '#000000');


            }
        } else {
            $('#choice_' + ch + '_yellow').css('background-color', '');
            $('#choice_' + ch + '_yellow').css('color', '');

        }

    })


}





/*
function choice_blue(a = false, b = false, c = false, d = false) {
    data = {
        a: a,
        b: b,
        c: c,
        d: d,
    }
    socket.emit("send_choice_from_blue", data)
}

function choice_yellow(a = false, b = false, c = false, d = false) {
    data = {
        a: a,
        b: b,
        c: c,
        d: d,
    }
    socket.emit("send_choice_from_yellow", data)
}

function blue_locked_down() {
    socket.emit('blue_locked_down')
}

function yellow_locked_down() {
    socket.emit('yellow_locked_down')
}

function show_answer() {
    socket.emit("show_answer")
}

function reset_round() {
    socket.emit("reset_round")

}

*/
/*
socket.on("yeet", data => {
    // alert(data.username + " you are yeet!!!")
});
socket.on("yeet_everyone", data => {
    // alert(" you are yeeted by " + data.username)
});

function yeet() {
    // socket.emit("yeet")
}

function yeet_everyone() {
    // socket.emit("yeet_everyone")
}

*/


/*
if (quest.answer == "a") {
    $('#choice_a').css('background-color', '#24D619');
    $('#choice_b').css('background-color', '');
    $('#choice_c').css('background-color', '');
    $('#choice_d').css('background-color', '');
} else if (quest.answer == "b") {
    $('#choice_a').css('background-color', '');
    $('#choice_b').css('background-color', '#24D619');
    $('#choice_c').css('background-color', '');
    $('#choice_d').css('background-color', '');
} else if (quest.answer == "c") {
    $('#choice_a').css('background-color', '');
    $('#choice_b').css('background-color', '');
    $('#choice_c').css('background-color', '#24D619');
    $('#choice_d').css('background-color', '');
} else {
    $('#choice_a').css('background-color', '');
    $('#choice_b').css('background-color', '');
    $('#choice_c').css('background-color', '');
    $('#choice_d').css('background-color', '#24D619');
}

*/


/*
if (data['a']) {
        if (data['locked_down']) {
            $('#choice_a_blue').css('background-color', '#FFFFFF');
            $('#choice_a_blue').css('color', '#1181FF');

        } else {
            $('#choice_a_blue').css('background-color', '#1181FF');
            $('#choice_a_blue').css('color', '');


        }
    } else {
        $('#choice_a_blue').css('background-color', '');
        $('#choice_a_blue').css('color', '');

    }

    if (data['b']) {
        if (data['locked_down']) {
            $('#choice_b_blue').css('background-color', '#FFFFFF');
            $('#choice_b_blue').css('color', '#1181FF');

        } else {
            $('#choice_b_blue').css('background-color', '#1181FF');
            $('#choice_b_blue').css('color', '');


        }
    } else {
        $('#choice_b_blue').css('background-color', '');
        $('#choice_b_blue').css('color', '');

    }
    if (data['c']) {
        if (data['locked_down']) {
            $('#choice_c_blue').css('background-color', '#FFFFFF');
            $('#choice_c_blue').css('color', '#1181FF');

        } else {
            $('#choice_c_blue').css('background-color', '#1181FF');
            $('#choice_c_blue').css('color', '');


        }
    } else {
        $('#choice_c_blue').css('background-color', '');
        $('#choice_c_blue').css('color', '');
    }
    if (data['d']) {
        if (data['locked_down']) {
            $('#choice_d_blue').css('background-color', '#FFFFFF');
            $('#choice_d_blue').css('color', '#1181FF');

        } else {
            $('#choice_d_blue').css('background-color', '#1181FF');
            $('#choice_d_blue').css('color', '');


        }
    } else {
        $('#choice_d_blue').css('background-color', '');
        $('#choice_d_blue').css('color', '');
    }

*/

/*

    if (data['a']) {
        if (data['locked_down']) {
            $('#choice_a_yellow').css('background-color', '#FFFFFF');
            $('#choice_a_yellow').css('color', '#D3D300');

        } else {
            $('#choice_a_yellow').css('background-color', '#FFFF02');
            $('#choice_a_yellow').css('color', '#000000');


        }
    } else {
        $('#choice_a_yellow').css('background-color', '');
        $('#choice_a_yellow').css('color', '');

    }
    if (data['b']) {
        if (data['locked_down']) {
            $('#choice_b_yellow').css('background-color', '#FFFFFF');
            $('#choice_b_yellow').css('color', '#D3D300');

        } else {
            $('#choice_b_yellow').css('background-color', '#FFFF02');
            $('#choice_b_yellow').css('color', '#000000');


        }
    } else {
        $('#choice_b_yellow').css('background-color', '');
        $('#choice_b_yellow').css('color', '');

    }
    if (data['c']) {
        if (data['locked_down']) {
            $('#choice_c_yellow').css('background-color', '#FFFFFF');
            $('#choice_c_yellow').css('color', '#D3D300');

        } else {
            $('#choice_c_yellow').css('background-color', '#FFFF02');
            $('#choice_c_yellow').css('color', '#000000');


        }
    } else {
        $('#choice_c_yellow').css('background-color', '');
        $('#choice_c_yellow').css('color', '');
    }
    if (data['d']) {
        if (data['locked_down']) {
            $('#choice_d_yellow').css('background-color', '#FFFFFF');
            $('#choice_d_yellow').css('color', '#D3D300');

        } else {
            $('#choice_d_yellow').css('background-color', '#FFFF02');
            $('#choice_d_yellow').css('color', '#000000');


        }
    } else {
        $('#choice_d_yellow').css('background-color', '');
        $('#choice_d_yellow').css('color', '');
    }

*/