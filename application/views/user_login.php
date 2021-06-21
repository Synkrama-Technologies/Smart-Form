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
                    <form action="verify_login" method="POST" class="verify_login">
                        <div>
                            <?php
                            if ($this->session->flashdata('message')) {
                                echo '
                                    <div class="alert alert-danger">
                                        ' . $this->session->flashdata("message") . '
                                    </div>
                                ';
                                $this->session->set_flashdata('message', '');
                            }
                            if ($this->session->flashdata('success_message')) {
                                echo '
                                    <div class="alert alert-success">
                                    ' . $this->session->flashdata("success_message") . '
                                    </div>
                                ';
                                $this->session->set_flashdata('success_message', '');
                            }
                            ?>

                            <?php if (!empty(validation_errors())) : ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                            <?php echo validation_errors(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <section class="row g-3">
                                <div class="form-group col-12">
                                    <label for="user_login_id">Login ID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="user_login_id" name="user_login_id" placeholder="Enter the Login ID" required>
                                        <div class="input-group-text"><img src="<?php echo base_url('images/icons/user.png'); ?>" alt=""></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-12">
                                    <label for="user_password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter the Password" required>
                                        <div class="input-group-text"><img src="<?php echo base_url('images/icons/padlock.png'); ?>" alt=""></div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <br><br>
                        <div class="text-center">
                            <button class="btn btn-orange m-4 btn1" type="submit" name="login_button">Login</button>
                        </div>

                    </form>
                    <br>

                </div>
            </div>
        </section>
    </section>



    <script type="application/javascript">
        /** After windod Load */
        $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        });
    </script>


    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.js'); ?>">
    </script>

    <script src="<?php echo base_url('js/jquery.validate.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/additional-methods.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/form_validator.js'); ?>"></script>


</body>

</html>