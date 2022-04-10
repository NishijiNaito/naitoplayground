<div class="row justify-content-center py-5 ">
    <div class="col-lg-9">
        <div class="card mb-3">
            <div class="card-body text-center" style="font-size: 25px;">
                <h4 class="card-title">ยินดีต้อนรับ, <?= $this->session->userdata('name') ?></h4>


            </div>
        </div>
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                Duel Menu
            </div>
            <div class="card-body text-center">

                <p class="card-text">
                    <a href="<?= base_url('duel/view') ?>" class="btn btn-success" role="button">
                        Game Viewer
                    </a><br>
                    <a href="<?= base_url('duel/blue') ?>" class="btn btn-primary" role="button">
                        Board Blue
                    </a><br>
                    <a href="<?= base_url('duel/yellow') ?>" class="btn btn-warning" role="button">
                        Board Yellow
                    </a>
                </p>

            </div>
        </div>

        <?php if ($this->session->userdata('user_level') < 100) { ?>
            <div class="card mb-3" style="font-size: 25px;">

                <div class="card-header text-center">
                    Admin Console
                </div>
                <div class="card-body text-center">

                    <p class="card-text">
                        <a href="<?= base_url('duel/question') ?>" class="btn btn-primary" role="button">
                            Question
                        </a>
                    </p>
                    <p class="card-text">
                        <a href="<?= base_url('duel/admin') ?>" class="btn btn-primary" role="button">
                            Admin Console
                        </a>
                    </p>

                </div>

            </div>
        <?php } ?>

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