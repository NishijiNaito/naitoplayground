// const ip = "101.51.253.23"
const socket = io.connect("ws://" + ip + ":10252");
const cho = ['a', 'b', 'c', 'd'];
data = { type: "blue" }

let player_blue = {
    name: "",
    a: false,
    b: false,
    c: false,
    d: false,
    chip_set: 10,
    chip_cal: 10,
    acc: 2,
    f_acc: false,
    locked_down: false,
}

socket.on("play_sound_locked_down", () => {
    acc_start.pause()
    acc_start.currentTime = 0;
    locked_down.play()
})

socket.on("ask_status", () => {
    socket.emit("send_status", data)
})

socket.on("set_viewer_status", (data) => {
    // console.log(data)
    set_status(data)
})

function set_status(data) {
    player_blue = data['player_blue']
    $('#board_question').html(data['question'].question)
    $('#choice_a').html(data['question'].a)
    $('#choice_b').html(data['question'].b)
    $('#choice_c').html(data['question'].c)
    $('#choice_d').html(data['question'].d)
    $('#chips_blue').html(data['player_blue'].chip_cal)

    if (player_blue.locked_down || data['question'].step != 1) {
        $('#submit_ans').hide()
        if (player_blue.acc > 0 && player_blue.f_acc == false) {
            $('#acc_blue').show()
        }
    } else {
        $('#submit_ans').show()
        $('#acc_blue').hide()
    }

    if (data['question'].step == 3) {
        answer_blue(data['player_blue'], data['question'].answer)
    } else {
        status_blue(data['player_blue'])
    }


    if (data['question'].step == 0) {
        $('#question_group').hide()
        $('#choice_group').hide()

    } else {
        $('#question_group').show()
        $('#choice_group').show()
    }

}

$("#choice_a").click(function(e) {
    e.preventDefault();
    // alert('a')
    if (player_blue.locked_down == false) {
        player_blue.a = !player_blue.a
        choice_blue(player_blue.a, player_blue.b, player_blue.c, player_blue.d)
    }



});
$("#choice_b").click(function(e) {
    e.preventDefault();
    // alert('b')
    if (player_blue.locked_down == false) {
        player_blue.b = !player_blue.b

        choice_blue(player_blue.a, player_blue.b, player_blue.c, player_blue.d)
    }



});
$("#choice_c").click(function(e) {
    e.preventDefault();
    // alert('c')
    if (player_blue.locked_down == false) {
        player_blue.c = !player_blue.c

        choice_blue(player_blue.a, player_blue.b, player_blue.c, player_blue.d)
    }



});
$("#choice_d").click(function(e) {
    e.preventDefault();
    // alert('d')
    if (player_blue.locked_down == false) {
        player_blue.d = !player_blue.d

        choice_blue(player_blue.a, player_blue.b, player_blue.c, player_blue.d)
    }



});
$("#submit_ans").click(function(e) {
    e.preventDefault();
    // alert('d')
    if (player_blue.locked_down == false) {

        blue_locked_down()
    }



});


function blue_locked_down() {
    isacc = false
    socket.emit('blue_locked_down')
}

function choice_blue(a = false, b = false, c = false, d = false) {
    data = {
        a: a,
        b: b,
        c: c,
        d: d,
    }
    socket.emit("send_choice_from_blue", data)
}

function status_blue(data) {
    cho.forEach(ch => {
        if (data[ch]) {
            if (data['locked_down']) {
                $('#choice_' + ch + '').css('background-color', '#FFFFFF');
                $('#choice_' + ch + '').css('color', '#1181FF');

            } else {
                $('#choice_' + ch + '').css('background-color', '#1181FF');
                $('#choice_' + ch + '').css('color', '');


            }
        } else {
            $('#choice_' + ch + '').css('background-color', '');
            $('#choice_' + ch + '').css('color', '');

        }
    })
}

function answer_blue(data, ans) {

    cho.forEach(ch => {
        if (data[ch]) {
            if (ch == ans) { //correct
                $('#choice_' + ch + '').css('background-color', '#24D619');
                $('#choice_' + ch + '').css('color', '');

            } else { // wrong
                $('#choice_' + ch + '').css('background-color', 'red');
                $('#choice_' + ch + '').css('color', '');


            }
        } else {
            $('#choice_' + ch + '').css('background-color', '');
            $('#choice_' + ch + '').css('color', '');

        }
    })


}


$("#acc_blue").click(function(e) {
    e.preventDefault();
    // alert('d')
    if (player_blue.locked_down == true && player_blue.acc > 0) {
        socket.emit("blue_acc")
        $('#acc_blue').hide()
    }



});


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
$('#acc_group').hide();
var acctime = window.setInterval(function() {

    if (isacc) {
        $('#acc_group').show();
        if (acctime == 0) {
            isacc = false
            socket.emit('blue_locked_down')
        } else {
            acctime--
            $('#acc_time').html(acctime + " Second to Locked Down");
        }


    } else {
        $('#acc_group').hide();
    }


}, 1000);

socket.on('all_acc', (data) => {
    if (data['player'] == "yellow" || data['player'] == "all") {

        acctime = 7
        isacc = true


        acc_start.play()
    }

})