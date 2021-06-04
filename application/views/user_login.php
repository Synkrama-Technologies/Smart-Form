<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/registeration_form.css'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon/favicon-16x16.png'); ?>">

    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

</head>


<body style="background-color: black;">

    <section class="container mt-3 mb-3">
        <section class="login_1">
            <div class="card">
                <div class="card-header bg-purple text-center">
                    <h2 class="text-light">Smartboost</h2>
                </div>
                <div class="card-body">
                    <form action="verify_login" method="POST" class="needs-validation" novalidate>
                        <div style="display:all" class="">
                            <section class="row g-3">
                                <div class="col-12">
                                    <label for="">Login ID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="user_login_id" placeholder="Enter the Login ID" required>
                                        <div class="input-group-text"><img src="<?php echo base_url('images/icons/user.png'); ?>" alt=""></div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <label for="">Password</label>
                                    <div class="input-group">
                                        <input type="password" minlength="8" class="form-control" name="user_password" placeholder="Enter the Password" title="Password should be atleast 8 digits" required>
                                        <div class="input-group-text"><img src="<?php echo base_url('images/icons/padlock.png'); ?>" alt=""></div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <br><br>
                        <div class="text-center">
                            <button class="btn btn-orange m-4 btn1" type="submit">Login</button>
                        </div>

                    </form>
                    <br>

                </div>
            </div>
        </section>
    </section>


    <div class="div_hidden_3">
    </div>


    <script src="<?php echo base_url('js/form_validation.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.js'); ?>">
    </script>


</body>

</html>