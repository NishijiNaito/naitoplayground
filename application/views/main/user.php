<div class="row justify-content-center py-5 h-100">
    <div class="col-lg-9">
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body text-center" style="font-size: 25px;">
                        <h4 class="card-title">ยินดีต้อนรับ, <?= $this->session->userdata('name') ?></h4>


                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3 ">
                <div class="card mb-3 h-100" style="font-size: 25px; ">
                    <div class="card-header text-center">
                        เมนู
                    </div>
                    <div class="card-body text-center " style="font-size: 20px;">
                        <a href="<?= base_url('main') ?>" class="btn btn-primary" role="button">
                            ย้อนกลับ
                        </a>



                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card h-100" style="font-size: 25px;">
                    <div class="card-header text-center">
                        จัดการผู้ใช้
                    </div>
                    <div class="card-body text-center" style="font-size: 20px;">
                        <div class="d-grid gap-2 mb-3">
                            <button type="button" onclick="add_user()" class="btn btn-success">เพิ่ม</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tbl_list">
                                <thead>
                                    <tr>
                                        <th>Manage</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>

                            </table>

                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">เพิ่มข้อมูล</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // var modal_add = document.getElementById('modal_add');

                            // modal_add.addEventListener('show.bs.modal', function(event) {
                            //     // Button that triggered the modal
                            //     let button = event.relatedTarget;
                            //     // Extract info from data-bs-* attributes
                            //     let recipient = button.getAttribute('data-bs-whatever');

                            //     // Use above variables to manipulate the DOM
                            // });
                        </script>



                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
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



    </div>

</div>

<script type="text/javascript">
    var modal_add = new bootstrap.Modal(document.getElementById('modal_add'), {
        keyboard: false
    })

    $('#tbl_list').DataTable({
        processing: true,
        autoWidth: false,
        // paging: false,
        ajax: {
            type: "POST",
            url: '<?= site_url('main/user_list') ?>',
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
                    <a onclick="edit_user('${data['username']}')" class="btn btn-primary" role="button">
                            แก้ไข
                        </a>
                        <a onclick="delete_user('${data['username']}')" class="btn btn-danger" role="button">
                ลบ
                        </a>
                    
                    `;
                },

            }, {
                data: 'username',
                orderable: true,
                className: 'nowrap',
                render: function(data, type, full) {
                    return data;
                },

            },
            {
                data: 'name',
                orderable: true,
                className: 'nowrap',
                render: function(data, type, full) {
                    return data;
                },

            },
        ],

    });

    function add_user() {
        modal_add.toggle();
    }
</script>