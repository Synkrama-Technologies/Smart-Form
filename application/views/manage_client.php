<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Client</title>

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
                    <h2 class="text-light">Manage Client</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive table_padding">
                        <table class="table table-bordered table-striped table-hover" style="white-space: nowrap;" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr class="text-center" style="background-color: #fafafa;">
                                    <th>ID <img src="<?php echo base_url('images/icons/sort.png'); ?>" alt="sort-icon"></th>
                                    <th>Client Name <img src="<?php echo base_url('images/icons/sort.png'); ?>" alt="sort-icon"></th>
                                    <th>Client URL <img src="<?php echo base_url('images/icons/sort.png'); ?>" alt="sort-icon"></th>
                                    <th>Client Primary Email <img src="<?php echo base_url('images/icons/sort.png'); ?>" alt="sort-icon"></th>
                                    <th>Assign the Changes</th>
                                </tr>
                            </thead>
                            <?php
                            $count = 1;
                            foreach ($client as $row) {

                                echo "
                                    <tr class='text-center'>
                                        <td>$count</td>
                                        <td>$row->client_name</td>
                                        <td>$row->client_url</td>
                                        <td>$row->client_primary_email </td>
                                        <td class='btn-group' width='100%'>
                                            <form method='POST' action='edit_form'>
                                                <input type='text' value='$row->client_id' name='client_id' hidden>
                                                <button class='btn btn-yellow rounded-3 btn-md m-1' type='submit' name='edit_button'>View Form</button>
                                            </form>
                                            <button class='btn btn-green rounded-3 btn-md m-1' data-bs-toggle='modal' data-bs-target='#update_$row->client_id'>Update</button>
                                            <button class='btn btn-red rounded-3 btn-md m-1' data-bs-toggle='modal' data-bs-target='#delete_$row->client_id'>Delete</button>
                                        </td>
                                    </tr> 
                                ";
                                $count++;
                            ?>


                                <!-- Modal Update client-->
                                <div class="modal fade" id="update_<?php echo $row->client_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">Update Client Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="update_client" method="POST" class="needs-validation" novalidate>
                                                    <section class="row g-3">
                                                        <div class="form-group col-sm-12">
                                                            <label for="client_name">Client Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="client_name" class="form-control mt-1" value="<?php echo $row->client_name; ?>">
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label for="client_url">Client URL <span class="text-danger">*</span></label>
                                                            <input type="text" name="client_url" class="form-control mt-1" value="<?php echo $row->client_url; ?>">
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label for="client_primary_email">Client Primary Email <span class="text-danger">*</span></label>
                                                            <input type="text" name="client_primary_email" class="form-control mt-1" value="<?php echo $row->client_primary_email; ?>">
                                                            <input type="text" name="client_id" value="<?php echo $row->client_id; ?>" hidden>
                                                        </div>
                                                    </section>
                                                    <br><br>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-orange btn1" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-green m-4 btn1" type="submit" name="update_confirm">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Delete client-->
                                <div class="modal fade" id="delete_<?php echo $row->client_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold text-uppercase" id="staticBackdropLabel">Delete Client</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="delete_client" method="POST" class="needs-validation" novalidate>
                                                    <br>
                                                    <h5 class="text-center">Are you sure you want to delete? </h5>
                                                    <input type="text" name="client_id" value="<?php echo $row->client_id; ?>" hidden>
                                                    <br>
                                                    <div class="text-center">
                                                        <!-- <button type="button" class="btn btn-orange btn1" data-bs-dismiss="modal">Close</button> -->
                                                        <button class="btn btn-red m-4 btn1" type="submit" name="delete_confirm">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <a href="home" class="btn btn-orange m-4 btn1">Back</a>
                </div>
            </div>

        </section>
    </section>

    <!-- 
    <div class="div_hidden_2">
    </div> -->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>admin/vendor/jquery/jquery.min.js"></script>

    <!-- Tables -->
    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>admin/js/demo/datatables-demo.js"></script>


    <script src="<?php echo base_url('js/bootstrap4.js'); ?>">
    </script>


</body>

</html>