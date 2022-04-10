<div class="row justify-content-center py-5 " id="register_zone" style="display: none;">
    <div class="col-lg-9">
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                ลงทะเบียน
            </div>
            <div class="card-body text-center">

                <p class="card-text">
                    โปรดลงชื่อเพื่อเข้าเล่นเกม
                </p>
                <form id="register_form">
                    <p class="card-text">
                    <div class="mb-3">
                        <input type="text" class="form-control text-center" name="name" id="name" aria-describedby="helpId" placeholder="โปรดกรอกชื่อ" required>
                    </div>
                    </p>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-success">เล่น</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center py-5 " id="detail_zone" style="display: none;">
    <div class="col-lg-9">
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                Welcome
            </div>
            <div class="card-body text-center">

                <p class="card-text" id="detail_name">

                </p>
                <p class="card-text" id="detail_info">

                </p>


            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center py-5 " id="question_zone" style="display: none;">
    <div class="col-lg-9">
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                Question
            </div>
            <div class="card-body text-center">
                <form id="answer_form">
                    <!-- 
                    <div class="input-group mb-3">
                        <span class="input-group-text">คำถาม</span>
                        <input type="text" id="question" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">อธิบายคำถาม</span>
                        <input type="text" id="questionexplain" class="form-control">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">คำตอบ</span>
                        <input type="text" id="answerPrefix" placeholder="หน่วยหัว" class="form-control">
                        <input type="text" id="answer" pattern="^\d*(\.\d{0,3})?$" placeholder="ตัวเลขคำตอบ ทศนิยมไม่เกิน3" class="form-control text-center" required>
                        <input type="text" id="answerSuffix" placeholder="หน่วยท้าย" class="form-control">
                    </div>
                     -->
                    <p class="card-text" id="q_question">

                    </p>
                    <p class="card-text" id="q_questionexplain">

                    </p>
                    <p class="card-text" id="q_answer">

                    </p>
                    <div class="input-group mb-3">
                        <span class="input-group-text">min</span>

                        <input type="text" id="min" pattern="^\d*(\.\d{0,3})?$" placeholder="ตัวเลขคำตอบ ทศนิยมไม่เกิน3" class="form-control text-center" required>
                        <span class="input-group-text">max</span>
                        <input type="text" id="max" pattern="^\d*(\.\d{0,3})?$" placeholder="ตัวเลขคำตอบ ทศนิยมไม่เกิน3" class="form-control text-center" required>


                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-success">ส่งคำคอบ</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/myip.js') ?>"></script>
<script src="<?= base_url('/assets/js/cfd_players.js') ?>"></script>
<script>
    function viewerpage() {
        Swal.fire(
            'ผิดพลาด',
            'เกมกำลังดำเนินการ โปรดไปที่หน้า View',
            'error'
        ).then(() => {
            window.location = "<?= base_url('/confident/view') ?>"
        })
    }
</script>