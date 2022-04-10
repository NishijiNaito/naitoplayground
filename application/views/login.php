<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('/assets/vendor/jquery/jquery.min.js') ?>"></script>
    <!-- Custom styles for this template-->
    <!-- <link href="<?= base_url('/assets/css/sb-admin-2.min.css') ?>" rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href=" <?php echo site_url('assets/css/custom.css'); ?>" rel="stylesheet">
</head>

<body>

    <!-- <div class="row justify-content-center mt-5">
            <div class="col-lg-5 text-center " style="font-size: 20px;">
                sadfgaefaefeafgea
                เรื่องเศร้าวันเสาร์

            </div>
        </div> -->
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Log in Playground</h3>
                            <form id="login_form">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeUser">Username</label>
                                    <input type="text" id="typeUser" name="typeUser" class="form-control form-control-lg" required />

                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePwd">Password</label>
                                    <input type="password" id="typePwd" name="typePwd" class="form-control form-control-lg" required />

                                </div>

                                <!-- Checkbox -->
                                <!-- <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div> -->

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>
                            <!-- <hr class="my-4">

                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button> -->
                            <script>
                                $("#login_form").submit(function(e) {
                                    e.preventDefault();
                                    // alert($('#login_form').serialize())
                                    $.ajax({
                                        type: "post",
                                        url: "<?= base_url('login/llogin') ?>",
                                        data: $('#login_form').serialize(),
                                        dataType: "json",
                                        success: function(response) {
                                            console.log(response)

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
                                                window.location.replace("<?= base_url('') ?>");

                                            }

                                        }
                                    });


                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>