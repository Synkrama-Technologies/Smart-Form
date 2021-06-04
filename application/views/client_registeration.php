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
                    <form action="add_client" method="POST" class="needs-validation" novalidate>
                        <section class="row g-3">
                            <div class="col-lg-12">
                                <label for="">Client Name</label>
                                <input type="text" class="form-control" name="client_name" placeholder="Enter the Client Name" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Client URL</label>
                                <input type="url" class="form-control" name="client_url" placeholder="Enter the Client URL" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Client Primary Email</label>
                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="client_primary_email" placeholder="Enter the Client Primary Email" required>
                            </div>
                        </section>
                        <br><br>
                        <div class="text-center">
                            <a href="home" class="btn btn-orange m-4 btn1">Back</a>
                            <button class="btn btn-purple m-4 btn1" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>

    <div class="div_hidden_2">
    </div>


    <script src="<?php echo base_url('js/form_validation.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.js'); ?>">
    </script>


</body>

</html>