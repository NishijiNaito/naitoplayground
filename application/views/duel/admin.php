<div class="row justify-content-center py-5 ">
    <div class="col-lg-9">
        <div class="card mb-3">
            <div class="card-body text-center" style="font-size: 25px;">
                <h4 class="card-title">ยินดีต้อนรับ, <?= $this->session->userdata('name') ?></h4>


            </div>
        </div>
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                Admin Console Menu
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <select class="form-control" name="question" id="quiz_id" onchange="chquiz()" style="font-size: 25px;">
                                <option>question</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="board_question">
                        Question
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="choice_a">
                        Choice A
                    </div>
                    <div class="col-md-6" id="choice_b">
                        Choice B
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="choice_c">
                        Choice C
                    </div>
                    <div class="col-md-6" id="choice_d">
                        Choice D
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6" id="answer">
                        Choice C
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-md-4">
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" onclick="set_question()" id="sq" class="btn btn-success" disabled>Set Question</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" onclick="show_answer()" id="sa" class="btn btn-success" disabled>Show Answer</button>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" onclick="reset_round()" id="rs"  class="btn btn-success" disabled>Reset Question</button>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" onclick="reset_game()" id="rg"  class="btn btn-success">Reset game</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</div>

<script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/myip.js') ?>"></script>
<script src="<?= base_url('/assets/js/duel_admin.js') ?>"></script>
<script>
    var locked_down = new Audio('<?= base_url('/assets/sound/locked_down.wav') ?>');
    var acc_start = new Audio('<?= base_url('/assets/sound/acc-7sec.wav') ?>');
    load_quiz()

    let question = {
        question: "",
        choice_a: "",
        choice_b: "",
        choice_c: "",
        choice_d: "",
        answer: "",
    }

    function load_quiz() {
        $.ajax({
            type: "post",
            url: "<?= base_url('duel/question_list') ?>",
            data: {},
            dataType: "json",
            success: function(response) {
                $('#quiz_id').html('<option style="display:none;">question</option>')

                $.each(response, function(i, ar) {
                    $('#quiz_id').append(new Option(ar['question'], ar['quiz_id']))

                });
            }
        });
    }

    function chquiz() {
        $.ajax({
            type: "post",
            url: "<?= base_url('duel/question_list') ?>",
            data: {
                quiz_id: $('#quiz_id').val()
            },
            dataType: "json",
            success: function(response) {
                quiz = response[0]
                question = quiz
                console.log(question)
                $('#board_question').html(question.question)
                $('#choice_a').html(question.choice_a)
                $('#choice_b').html(question.choice_b)
                $('#choice_c').html(question.choice_c)
                $('#choice_d').html(question.choice_d)
                $('#answer').html(question.answer)
                $('#sq').prop('disabled', false);
            }
        });

    }
</script>