<div class="row justify-content-center py-5 ">
    <div class="col-lg-9">
        <div class="card mb-3">
            <div class="card-body text-center" style="font-size: 25px;">
                <h4 class="card-title">ยินดีต้อนรับ, <?= $this->session->userdata('name') ?></h4>


            </div>
        </div>
        <div class="card mb-3" style="font-size: 25px;">
            <div class="card-header text-center">
                รายการ
            </div>
            <div class="card-body text-center">

                <p class="card-text">
                    <a href="<?= base_url('duel') ?>" class="btn btn-primary" role="button">
                        Duel Game Show
                    </a>
                </p>
                <p class="card-text">
                    <a href="<?= base_url('confident') ?>" class="btn btn-primary" role="button">
                        Confident มั่นใจป่าว
                    </a>
                </p>
                <p class="card-text">
                    <a href="<?= base_url('howmuch') ?>" class="btn btn-primary" role="button">
                        How much is Enough ? <br> เท่าไหร่ถึงจะพอ
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
                        <a href="<?= base_url('main/user') ?>" class="btn btn-primary" role="button">
                            รายการผู้ใช้
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