// const ip = "101.51.253.23"
const socket = io.connect("ws://" + ip + ":10252");
const cho = ['a', 'b', 'c', 'd'];
data = { type: "yellow" }

let player_yellow = {
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
    player_yellow = data['player_yellow']
    $('#board_question').html(data['question'].question)
    $('#choice_a').html(data['question'].a)
    $('#choice_b').html(data['question'].b)
    $('#choice_c').html(data['question'].c)
    $('#choice_d').html(data['question'].d)
    $('#chips_yellow').html(data['player_yellow'].chip_cal)

    if (player_yellow.locked_down || data['question'].step != 1) {
        $('#submit_ans').hide()
        if (player_yellow.acc > 0 && player_yellow.f_acc == false) {
            $('#acc_yellow').show()
        }
    } else {
        $('#submit_ans').show()
        $('#acc_yellow').hide()
    }


    if (data['question'].step == 3) {
        answer_yellow(data['player_yellow'], data['question'].answer)
    } else {
        status_yellow(data['player_yellow'])
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
    if (player_yellow.locked_down == false) {
        player_yellow.a = !player_yellow.a
        choice_yellow(player_yellow.a, player_yellow.b, player_yellow.c, player_yellow.d)
    }



});
$("#choice_b").click(function(e) {
    e.preventDefault();
    // alert('b')
    if (player_yellow.locked_down == false) {
        player_yellow.b = !player_yellow.b

        choice_yellow(player_yellow.a, player_yellow.b, player_yellow.c, player_yellow.d)
    }



});
$("#choice_c").click(function(e) {
    e.preventDefault();
    // alert('c')
    if (player_yellow.locked_down == false) {
        player_yellow.c = !player_yellow.c

        choice_yellow(player_yellow.a, player_yellow.b, player_yellow.c, player_yellow.d)
    }



});
$("#choice_d").click(function(e) {
    e.preventDefault();
    // alert('d')
    if (player_yellow.locked_down == false) {
        player_yellow.d = !player_yellow.d

        choice_yellow(player_yellow.a, player_yellow.b, player_yellow.c, player_yellow.d)
    }



});
$("#submit_ans").click(function(e) {
    e.preventDefault();
    // alert('d')
    if (player_yellow.locked_down == false) {

        yellow_locked_down()
    }



});

function yellow_locked_down() {
    isacc = false
    socket.emit('yellow_locked_down')
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

function status_yellow(data) {
    cho.forEach(ch => {
        if (data[ch]) {
            if (data['locked_down']) {
                $('#choice_' + ch + '').css('background-color', '#FFFFFF');
                $('#choice_' + ch + '').css('color', '#D3D300');

            } else {
                $('#choice_' + ch + '').css('background-color', '#FFFF02');
                $('#choice_' + ch + '').css('color', '#000000');


            }
        } else {
            $('#choice_' + ch + '').css('background-color', '');
            $('#choice_' + ch + '').css('color', '');

        }
    })
}

function answer_yellow(data, ans) {

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

$("#acc_yellow").click(function(e) {
    e.preventDefault();
    // alert('d')
    if (player_yellow.locked_down == true && player_yellow.acc > 0) {
        socket.emit("yellow_acc")
        $('#acc_yellow').hide()
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
            socket.emit('yellow_locked_down')
        } else {
            acctime--
            $('#acc_time').html(acctime + " Second to Locked Down");
        }


    } else {
        $('#acc_group').hide();
    }


}, 1000);

socket.on('all_acc', (data) => {
    if (data['player'] == "blue" || data['player'] == "all") {

        acctime = 7
        isacc = true


        acc_start.play()
    }

})