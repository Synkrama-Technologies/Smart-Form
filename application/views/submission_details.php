<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submissions</title>

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

    <section class="container-fluid mt-3 mb-3">
        <section class="register_1">
            <div class="card">
                <div class="card-header bg-purple text-center">
                    <h2 class="text-light">Form Submissions</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                            <thead>
                                <tr class="text-center" style="background-color: #fafafa;">
                                    <th>Form ID</th>
                                    <th>Form Name</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($form_detail as $row) {
                                echo "
                                <tr class='text-center'>
                                <td>$row->form_id</td>
                                <form method='POST' action='view_submission'>
                                        <input type='text' value='$row->form_id' name='form_id' hidden>
                                        <td class='p-0'><button class='text-primary pt-2 btn' type='submit' name='view_submission_button'>$row->form_name</button></td>
                                </form>
                                <td>$row->count</td>
                                </tr>
                            ";
                            }
                            ?>

                        </table>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <a href="edit_form" class="btn btn-orange m-4 btn1">Back</a>
                </div>
            </div>

        </section>
    </section>


    <script src="<?php echo base_url('js/bootstrap.js'); ?>">
    </script>

</body>

</html>