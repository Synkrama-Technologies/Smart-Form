<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submissions</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/registeration_form.css'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon/favicon-16x16.png'); ?>">

    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/Export/dist/jquery.table2excel.js'); ?>"></script>

</head>

<body>

    <?php include('includes/navbar.php') ?>

    <section class="container mt-3 mb-3">
        <section class="register_1">
            <div class="card">
                <div class="card-header bg-purple text-center">
                    <h2 class="text-light">View Submissions</h2>
                </div>
                <div class="card-body">
                    <div>
                        <button id="exportToExcel" class="btn btn-md btn-orange">Excel</button>
                        <div style="float: right;">
                            <button onclick="reply_click()" class="btn btn-md btn-green">Excel</button>
                        </div>
                    </div>
                    <div class="table-responsive table_padding">
                        <table class="table table-bordered table-striped table2excel" style="white-space: nowrap;" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr class="text-center" style="background-color: #fafafa;">
                                    <th>Sr. No. <img src="<?php echo base_url('images/icons/sort.png'); ?>" alt="sort-icon"></th>
                                    <?php
                                    $count = 0;
                                    foreach ($submission_with_group as $row) {
                                    ?>
                                        <th><?php echo $row->form_label; ?>&nbsp;<img src="<?php echo base_url('images/icons/sort.png'); ?>" alt="sort-icon"></th>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tr>
                            </thead>

                            <?php
                            // echo $count;
                            $counter = 0;
                            foreach ($submission as $row) {
                                if ($counter % $count == 0) {
                            ?>
                                    <tr class="text-center" data-test="<?php echo $counter; ?>">
                                    <td><?php echo ($counter/3)+1; ?></td>
                                    <?php
                                }
                                    ?>
                                    <td><?php echo $row->value; ?></td>
                                    <?php
                                    if ($counter % $count == $count - 1) {
                                    ?>
                                    </tr>
                            <?php
                                    }
                                    $counter++;
                                }
                            ?>

                        </table>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <a href="submission_details" class="btn btn-orange m-4 btn1">Back</a>
                </div>
            </div>

        </section>
    </section>

    <script>
        $(function() {
            $("#exportToExcel").click(function(e) {
                var table = $(this).prev('.table2excel');
                if (table && table.length) {
                    var preserveColors = (table.hasClass('table2excel_with_colors') ? true :
                        false);
                    $(table).table2excel({
                        // exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "FileName-" + new Date().toISOString().replace(
                            /[\-\:\.]/g, "") + ".xls",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true,
                        preserveColors: preserveColors
                    });
                }
            });
        });

        document.getElementById('exportToExcel').style.visibility = 'hidden';

        function reply_click() {
            document.getElementById('exportToExcel').click();
        }
    </script>


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