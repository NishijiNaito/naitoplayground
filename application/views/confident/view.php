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



            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center py-2 " id="question_zone" style="display: none;">
    <div class="col-lg-9">
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                Question
            </div>
            <div class="card-body text-center">
                <p class="card-text" id="q_question">

                </p>
                <p class="card-text" id="q_questionexplain">

                </p>
                <p class="card-text" id="q_answer">

                </p>


            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center " id="player_zone" style="display: none;">
    <div class="col-lg-12">
        <div class="row justify-content-center py-3" id="player_detail">
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


<script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/myip.js') ?>"></script>
<script src="<?= base_url('/assets/js/cfd_view.js') ?>"></script>
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