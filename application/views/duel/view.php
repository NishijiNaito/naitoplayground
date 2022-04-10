<div id="question_group">
    <div class="row justify-content-center pt-5 pb-5 ">
        <div class="col-lg-12">
            <div class="card" style="background-color: #4922B9; color: #FFFFFF;">
                <div class="card-body text-center" id="board_question" style="font-size: 30px;">
                    Question

                </div>
            </div>
        </div>

    </div>
</div>

<div id="choice_group">
    <div class="row justify-content-center pb-3">
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_a_blue" style="font-size: 30px;  color: #FFFFFF;">
                    A

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card h-100" style="background-color: #4922B9; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_a" style="font-size: 30px;  color: #FFFFFF;">
                    Choice A

                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_a_yellow" style="font-size: 30px;  color: #FFFFFF;">
                    A

                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center pb-3 ">
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_b_blue" style="font-size: 30px;  color: #FFFFFF;">
                    B

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card h-100" style="background-color: #4922B9; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_b" style="font-size: 30px;  color: #FFFFFF;">
                    Choice B

                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_b_yellow" style="font-size: 30px;  color: #FFFFFF;">
                    B

                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center pb-3 ">
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_c_blue" style="font-size: 30px;  color: #FFFFFF;">
                    C

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card h-100" style="background-color: #4922B9; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_c" style="font-size: 30px;  color: #FFFFFF;">
                    Choice C

                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_c_yellow" style="font-size: 30px;  color: #FFFFFF;">
                    C

                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center pb-3 ">
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_d_blue" style="font-size: 30px;  color: #FFFFFF;">
                    D

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card h-100" style="background-color: #4922B9; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_d" style="font-size: 30px;  color: #FFFFFF;">
                    Choice D

                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card h-100" style="background-color: #576057; color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="choice_d_yellow" style="font-size: 30px;  color: #FFFFFF;">
                    D

                </div>
            </div>
        </div>

    </div>
</div>

<div id="options_group">
    <div class="row justify-content-center pt-3 ">
        <div class="col-sm-3">
            <div class="card h-100" style="background-color: #1181FF;color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="chips_blue" style="font-size: 50px;">
                    10

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card h-100" style="background-color: #1181FF;color: #FFFFFF;">
                <div class="card-body text-center align-middle" id="acc_blue" style="font-size: 50px;">
                    <i class="fa fa-chevron-right pe-5" aria-hidden="true"></i>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card h-100" style="background-color: #FFFF02;color: #000000;">
                <div class="card-body text-center align-middle" id="acc_yellow" style="font-size: 50px;">
                    <i class="fa fa-chevron-left pe-5" aria-hidden="true"></i>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card h-100" style="background-color: #FFFF02;color: #000000;">
                <div class="card-body text-center align-middle" id="chips_yellow" style="font-size: 50px; ">
                    10

                </div>
            </div>
        </div>

    </div>




</div>

<script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/myip.js') ?>"></script>
<script>
    var locked_down = new Audio('<?= base_url('/assets/sound/locked_down.wav') ?>');
    var acc_start = new Audio('<?= base_url('/assets/sound/acc-7sec.wav') ?>');
</script>
<script src="<?= base_url('/assets/js/duel_view.js') ?>"></script>