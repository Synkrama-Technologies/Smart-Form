<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>

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
                    <h2 class="text-light">Edit Form</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="white-space: nowrap;">
                            <thead>
                                <tr class="text-center" style="background-color: #fafafa;">
                                    <th class="w-25">Client Name</th>
                                    <th class="w-25">Form Name</th>
                                    <th>Assign the Changes</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($client_details as $row1) {
                                foreach ($form as $row) {
                                    echo "
                                    <tr class='text-center'>
                                        <td>$row1->client_name</td>
                                        <td>$row->form_name</td>
                                        <td class='text-center' width='100%'>
                                            <div class='btn-group'>
                                                <form method='POST' action='view_form'>
                                                    <input type='text' value='$row->form_id' name='form_id' hidden>
                                                    <button class='btn btn-yellow rounded-3 btn-md m-1' type='submit' name='view_button'>Edit Form</button>
                                                </form>
                                                <button class='btn btn-primary rounded-3 btn-md m-1' style='max-width: 150px;' data-bs-toggle='modal' data-bs-target='#view_$row->form_id'>View Form Tag</button>
                                                <form method='POST' action='submission_details'>
                                                    <input type='text' value='$row->form_id' name='form_id' hidden>
                                                    <button class='btn btn-green rounded-3 btn-md m-1' type='submit' name='view_submission_button'>View Submission</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr> 
                                ";

                            ?>
                                    <!-- Modal View Form-->
                                    <div class="modal fade" id="view_<?php echo $row->form_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">View Form</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <?php
                                                    $id_temp = $row->form_id;
                                                    $name_temp = $row->form_name;
                                                    ?>

                                                    <h5 class="my-4">
                                                        <span id="copy_textarea">[contact-form-7|id="<?php echo $id_temp; ?>"|name="<?php echo $name_temp; ?>"]</span>
                                                        <button class=" btn-sm" style="float:right;" onclick="copy()" id="btn_click"><img src="<?php echo base_url('images/icons/copy.png'); ?>" alt="sort-icon"></button>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        // function copy() {
                                        //     var copy_textarea = document.getElementById("copy_textarea");
                                        //     copy_textarea.select();
                                        //     document.execCommand("copy");
                                        // }

                                        // document.getElementById("cp_btn").addEventListener("click", copy_password);

                                        function copy() {
                                            var copyText = document.getElementById("copy_textarea");
                                            var textArea = document.createElement("textarea");
                                            textArea.value = copyText.textContent;
                                            document.body.appendChild(textArea);
                                            textArea.select();
                                            document.execCommand("Copy");
                                            textArea.remove();
                                        }
                                    </script>
                            <?php
                                }
                            }
                            ?>



                        </table>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <a href="manage_client" class="btn btn-orange m-4 btn1">Back</a>
                </div>
            </div>

        </section>
    </section>


    <script src="<?php echo base_url('js/bootstrap.js'); ?>">
    </script>

</body>

</html>