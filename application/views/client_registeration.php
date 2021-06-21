<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/registeration_form.css'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon/favicon-16x16.png'); ?>">

    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

</head>


<body>

    <?php include('includes/navbar.php') ?>

    <section class="container mt-3 mb-3">
        <section class="register_1">
            <div class="card">
                <div class="card-header bg-purple text-center">
                    <h2 class="text-light">Add New Client</h2>
                </div>
                <div class="card-body">
                    <form action="add_client" method="POST" class="add_client">

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
                                    <div class="alert alert-danger">
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
                            <div class="form-group col-lg-12">
                                <label for="client_name">Client Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Enter the Client Name" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="client_url">Client URL <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="client_url" name="client_url" placeholder="Enter the Client URL" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="client_primary_email">Client Primary Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="client_primary_email" name="client_primary_email" placeholder="Enter the Client Primary Email" required>
                            </div>
                        </section>
                        <br><br>
                        <div class="text-center">
                            <a href="home" class="btn btn-orange m-4 btn1">Back</a>
                            <button class="btn btn-purple m-4 btn1" type="submit" name="add_client">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>

    <!-- <div class="div_hidden_2">
    </div> -->

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