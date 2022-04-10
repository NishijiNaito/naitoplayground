<div class="row justify-content-center py-5 ">
    <div class="col-lg-9">
        <div class="card mb-3">
            <div class="card-body text-center" style="font-size: 25px;">
                <h4 class="card-title">ยินดีต้อนรับ, <?= $this->session->userdata('name') ?></h4>


            </div>
        </div>
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                How much is enough Menu
            </div>
            <div class="card-body text-center">

                <p class="card-text">
                    <a href="<?= base_url('howmuch/view') ?>" class="btn btn-success" role="button">
                        Game Viewer
                    </a><br>
                    <a href="<?= base_url('howmuch/play') ?>" class="btn btn-primary" role="button">
                        Player
                    </a><br>
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
                        <a href="<?= base_url('howmuch/admin') ?>" class="btn btn-primary" role="button">
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