<div class="row justify-content-center py-5 " id="info_zone" style="display: none;">
  <div class="col-lg-9">
    <div class="card mb-3" style="font-size: 25px;">
      <div class="card-header text-center">
        รายชื่อผู้เล่น
      </div>
      <div class="card-body text-center">

        <p class="card-text" id="info_amo">

        </p>
        <p class="card-text" id="info_player">

        </p>
        <p class="card-text">
        <form id="start_form">
          <div class="input-group mb-3">

            <label class="input-group-text" for="game_mode">Game Mode</label>
            <select class="form-select" id="game_mode" name="game_mode" required>
              <option value="" selected disabled>Game Mode</option>
              <option value="1">Normal Mode [3 / (1/0) / 0 Points]</option>
              <!-- <option value="2">Two</option> -->
              <!-- <option value="3">Three</option> -->
            </select>

          </div>
          <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-success">เล่น</button>
          </div>
        </form>
        </p>


      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center py-5 " id="question_zone" style="display: none;">
  <div class="col-lg-9">
    <div class="card mb-3" style="font-size: 25px;">
      <div class="card-header text-center">
        Console
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
        <form id="question_form">
          <div class="input-group mb-3">
            <span class="input-group-text">คำถาม</span>
            <input type="text" id="question" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">อธิบายคำถาม</span>
            <input type="text" id="questionexplain" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">
              ลิ้งก์คำถาม
            </span>
            <input type="text" id="questionpicture" class="form-control">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">คำตอบ</span>
            <input type="text" id="answerPrefix" placeholder="หน่วยหัว" class="form-control">
            <input type="text" id="answer" pattern="^\d*(\.\d{0,3})?$" placeholder="ตัวเลขคำตอบ ทศนิยมไม่เกิน3"
              class="form-control text-center" required>
            <input type="text" id="answerSuffix" placeholder="หน่วยท้าย" class="form-control">
          </div>
          <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-success">ส่งคำถาม</button>
          </div>
          <div class="d-grid gap-2 mb-3">
            <button type="button" onclick="reset_game()" id="rg" class="btn btn-danger">Reset game</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center py-5 " id="console_zone" style="display: none;">
  <div class="col-lg-9">
    <div class="card mb-3" style="font-size: 25px;">
      <div class="card-header text-center">
        Console
      </div>
      <div class="card-body text-center">
        <form id="question_form">
          <p class="card-text" id="c_question">

          </p>
          <p class="card-text" id="c_questionexplain">

          </p>

          <p class="card-text" id="c_answer">

          </p>

        </form>
        <div class="row  mt-3">
          <div class="col-md-4">
            <div class="d-grid gap-2 mb-3">
              <button type="button" onclick="reset_question()" id="rq" class="btn btn-danger">Reset Question</button>
            </div>
          </div>

          <div class="col-md-4">
            <div class="d-grid gap-2 mb-3">
              <button type="button" onclick="show_Player_answer()" id="spa" class="btn btn-info">Show Player
                Answer</button>
            </div>

          </div>

          <div class="col-md-4">
            <div class="d-grid gap-2 mb-3">
              <button type="button" onclick="Reveal_answer()" id="ra" class="btn btn-success" disabled>Reveal
                Answer</button>
            </div>

          </div>


          <div class="col-md-4">
            <div class="d-grid gap-2 mb-3">
              <button type="button" onclick="reset_game()" id="rg" class="btn btn-danger">Reset game</button>
            </div>
          </div>

        </div>
        <img id="c_questionpicture" src="" width="100%" alt="Question">
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center py-5 " id="player_zone" style="display: none;">
  <div class="col-lg-12">
    <div class="row justify-content-center py-5 " id="player_detail">
      <!-- <div class="col-md-auto">
                <div class="card mb-3" style="font-size: 25px;">
                    <div class="card-header text-center">
                        [Playername] ([point])
                    </div>
                    <div class="card-body text-center">
                        <form id="question_form">
                            <p class="card-text">
                                [Status]/[Rangemin-Rangemax]
                            </p>
                            <p class="card-text">
                                [size]
                            </p>
                        </form>

                    </div>
                </div>
            </div> -->
    </div>
  </div>
</div>



<script src="https://cdn.socket.io/4.4.1/socket.io.min.js"
  integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/myip.js') ?>"></script>
<script>
load_quiz()

function load_quiz() {
  $.ajax({
    type: "post",
    url: "<?= base_url('confident/question_list') ?>",
    data: {},
    dataType: "json",
    success: function(response) {
      $('#quiz_id').html('<option style="display:none;">question</option>')

      $.each(response, function(i, ar) {
        $('#quiz_id').append(new Option(ar['question'], ar['cfd_id']))

      });
    }
  });
}

function chquiz() {
  $.ajax({
    type: "post",
    url: "<?= base_url('confident/question_list') ?>",
    data: {
      cfd_id: $('#quiz_id').val()
    },
    dataType: "json",
    success: function(response) {
      quiz = response[0]
      // question = quiz
      console.log(quiz)
      $('#question').val(quiz.question)
      $('#questionexplain').val(quiz.questionexplain)
      $('#answerPrefix').val(quiz.answerPrefix)
      $('#answerSuffix').val(quiz.answerSuffix)
      $('#answer').val(quiz.answer)
      // $('#sq').prop('disabled', false);
    }
  });

}
</script>
<script src="<?= base_url('/assets/js/cfd_admin.js') ?>"></script>