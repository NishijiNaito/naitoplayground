<div class="row justify-content-center py-5 ">
    <div class="col-lg-9">
        <div class="card mb-3">
            <div class="card-body text-center" style="font-size: 25px;">
                <h4 class="card-title">ยินดีต้อนรับ, <?= $this->session->userdata('name') ?></h4>


            </div>
        </div>
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                Confident Question
            </div>
            <div class="card-body text-center">
                <!-- <div class="d-grid gap-2 mb-3">
                    <button type="button" onclick="add_question()" class="btn btn-success">เพิ่ม</button>
                </div> -->
                <form id="question_form">
                    <input type="hidden" name="cfd_id" value="">
                    <div class="input-group mb-3">
                        <span class="input-group-text">คำถาม</span>
                        <input type="text" id="question" name="question" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">อธิบายคำถาม</span>
                        <input type="text" id="questionexplain" name="questionexplain" class="form-control">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">คำตอบ</span>
                        <input type="text" id="answerPrefix" name="answerPrefix" placeholder="หน่วยหัว" class="form-control">
                        <input type="text" id="answer" name="answer" pattern="^\d*(\.\d{0,3})?$" placeholder="ตัวเลขคำตอบ ทศนิยมไม่เกิน3" class="form-control text-center" required>
                        <input type="text" id="answerSuffix" name="answerSuffix" placeholder="หน่วยท้าย" class="form-control">
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="button" class="btn btn-danger" onclick="clear_question()">ล้างคำถาม</button>
                        <button type="submit" class="btn btn-success">ส่งคำถาม</button>
                    </div>
                </form>
                <hr>
                <p class="card-text">
                <div class="table-responsive" style="font-size: 20px;">
                    <table class="table" id="tbl_list">
                        <thead>
                            <tr>
                                <th>Manage</th>
                                <th>Question</th>
                                <th>explain</th>
                                <th>Answer</th>
                            </tr>
                        </thead>

                    </table>

                </div>






                </p>

            </div>
            <!-- Modal -->
            <!-- <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">เพิ่มข้อมูล</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form_question">
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <span class="input-group-text">คำถาม</span>
                                    <input type="text" class="form-control" id="a_question" name="question" required>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">A</span>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="answer" value="a" required>
                                    </div>
                                    <input type="text" class="form-control" name="choice_a" placeholder="Choice A" required>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">B</span>
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="answer" value="b" required>
                                    </div>
                                    <input type="text" class="form-control" name="choice_b" placeholder="Choice B" required>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">C</span>

                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="answer" value="c" required>
                                    </div>
                                    <input type="text" class="form-control" name="choice_c" placeholder="Choice C" required>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">D</span>

                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="answer" value="d" required>
                                    </div>
                                    <input type="text" class="form-control" name="choice_d" placeholder="Choice D" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">เพิ่มคำถาม</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div> -->
        </div>

        <div class="card mb-3">
            <div class="card-body text-center" style="font-size: 25px;">
                <p class="card-text">
                    <a href="<?= base_url('login/logout') ?>" class="btn btn-danger" role="button">
                        ออกจากระบบ
                    </a>
                </p>

            </div>
        </div>

    </div>

</div>

<script type="text/javascript">
    /*
    var modal_add = new bootstrap.Modal(document.getElementById('modal_add'), {
        keyboard: false
    })
    */

    $('#tbl_list').DataTable({
        processing: true,
        autoWidth: false,
        // paging: false,
        ajax: {
            type: "POST",
            url: '<?= site_url('confident/question_list') ?>',
            data: (d) => {
                // d.registration_id = '';
            },
            dataSrc: ''
        },
        order: [
            [1, 'asc']
        ],

        columns: [{
                data: null,
                searchable: false,
                orderable: false,
                className: 'nowrap',
                render: function(data, type, full) {
                    return `
                            <a onclick="edit_quiz('${data['cfd_id']}')" class="btn btn-primary" role="button">
                                    แก้ไข
                                </a>
                                <a onclick="delete_user('${data['cfd_id']}')" class="btn btn-danger" role="button">
                                    ลบ
                                </a>
                            
                            `;
                },

            }, {
                data: 'question',
                orderable: true,
                className: '',
                render: function(data, type, full) {
                    return data;
                },

            },
            {
                data: 'questionexplain',
                orderable: true,
                className: 'nowrap',
                render: function(data, type, full) {
                    return data;
                },

            },
            {
                data: null,
                orderable: true,
                className: 'nowrap',
                render: function(data, type, full) {
                    return `${data['answerPrefix']} ${data['answer']} ${data['answerSuffix']}`;
                },

            },
        ],

    });

    function add_question() {
        modal_add.toggle();
    }

    $('#question_form').submit(function(e) {
        e.preventDefault();
        // console.log($('#question_form').serializeArray())

        $.ajax({
            type: "post",
            url: "<?= base_url('confident/addquestion') ?>",
            data: $('#question_form').serialize(),
            dataType: "json",
            success: function(response) {
                if (response['status'] == 0) {
                    Swal.fire(
                        'ไม่สำเร็จ',
                        response['txt'],
                        'error'
                    )
                } else {
                    Swal.fire(
                        'สำเร็จ',
                        response['txt'],
                        'success'
                    )


                    // $('[name^="answer"]').prop('checked', false);
                    $('[name^="cfd_id"]').val('')
                    $('[name^="question"]').val('')
                    $('[name^="questionexplain"]').val('')
                    $('[name^="answerPrefix"]').val('')
                    $('[name^="answer"]').val('')
                    $('[name^="answerSuffix"]').val('')
                    // modal_add.toggle();
                    $('#tbl_list').DataTable().ajax.reload()
                }
            }
        });



    });

    function clear_question() {
        $('[name^="cfd_id"]').val('')
        $('[name^="question"]').val('')
        $('[name^="questionexplain"]').val('')
        $('[name^="answerPrefix"]').val('')
        $('[name^="answer"]').val('')
        $('[name^="answerSuffix"]').val('')
    }

    function edit_quiz(id) {
        $.ajax({
            type: "post",
            url: "<?= base_url('confident/question_list') ?>",
            data: {
                cfd_id: id
            },
            dataType: "json",
            success: function(response) {
                quiz = response[0]
                // question = quiz
                console.log(quiz)
                $('[name^="cfd_id"]').val(id)
                $('#question').val(quiz.question)
                $('#questionexplain').val(quiz.questionexplain)
                $('#answerPrefix').val(quiz.answerPrefix)
                $('#answerSuffix').val(quiz.answerSuffix)
                $('#answer').val(quiz.answer)
                // $('#sq').prop('disabled', false);
            }
        });
    }



    //$('[name^="answer"]').prop('checked', false);
    //$('[name^="choice"]').val('')
</script>