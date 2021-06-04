<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Form</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon/favicon-16x16.png'); ?>">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">

</head>

<body>

    <?php include('includes/navbar.php') ?>




    <div class="container">

        <div>
            <button type="button" id="btn_password" class="btn btn-primary btn-sm">password</button>
            <button type="button" id="btn_text" class="btn btn-primary btn-sm">text</button>
            <button type="button" id="btn_email" class="btn btn-primary btn-sm">email</button>
            <button type="button" id="btn_url" class="btn btn-primary btn-sm">URL</button>
            <button type="button" id="btn_tel" class="btn btn-primary btn-sm">tel</button>
            <button type="button" id="btn_number" class="btn btn-primary btn-sm">number</button>
            <button type="button" id="btn_date" class="btn btn-primary btn-sm">date</button>
            <button type="button" id="btn_textarea" class="btn btn-primary btn-sm">textarea</button>
            <button type="button" id="btn_dropdown" class="btn btn-primary btn-sm">drop-down</button>
            <button type="button" id="btn_radio" class="btn btn-primary btn-sm">radio button</button>
            <!-- <button type="button" id="btn_submit" class="btn btn-primary btn-sm">submit</button> -->
        </div>

        <hr><br>


        <form action="form_submit" method="POST" id="" class="needs-validation" novalidate>

            <div id="div_client_id">
                <div class="row">
                    <label>Select the client : </label>
                    <select class="form-select col-sm-12" aria-label="Default select example" name="client_id" required>
                        <option value="" selected disabled hidden>Select client</option>
                        <?php
                        foreach ($client as $row) {
                            echo '<option value="' . $row->client_id  . '">' . $row->client_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <br>
            </div>

            <div id="div_form_name">
                <div class="row">
                    <label>Form Name : </label>
                    <input type="text" class="form-control col-sm-12" placeholder="Enter the text" name="form_name" required>
                </div>
                <br>
            </div>

            <div id="div_text">
                <div class="row">
                    <label>Enter text : </label>
                    <input type="text" class="form-control col-sm-12" placeholder="Enter the text" name="userText">
                </div>
                <br>
            </div>

            <div id="div_password">
                <div class="row">
                    <label>Password : </label>
                    <input type="password" class="form-control col-sm-12" placeholder="Enter the password" name="userPassword">
                </div>
                <br>
            </div>

            <div id="div_date">
                <div class="row">
                    <label>Date : </label>
                    <input type="date" class="form-control col-sm-12" placeholder="Enter the date" name="userDate">
                </div>
                <br>
            </div>


            <div id="div_email">
                <div class="row" id="div1">
                    <label>Enter Email ID : </label>
                    <input type="mail" class="form-control col-sm-12" placeholder="Enter the email" name="userEmail">
                </div>
                <br>
            </div>



            <div id="div_url">
                <div class="row">
                    <label>URL : </label>
                    <input type="mail" class="form-control col-sm-12" placeholder="Enter the URL" name="userURL">
                </div>
                <br>
            </div>


            <div id="div_tel">
                <div class="row">
                    <label>Telephone number : </label>
                    <input type="tel" class="form-control col-sm-12" placeholder="Enter the telephone number" name="userTelephone">
                </div>
                <br>
            </div>


            <div id="div_number">
                <div class="row">
                    <label>Number : </label>
                    <input type="tel" class="form-control col-sm-12" placeholder="Enter the  number" name="userNumber">
                </div>
                <br>
            </div>


            <div id="div_textarea">
                <div class="row">
                    <div>Text Area : </div>
                    <textarea name="userTextarea" id="" class="form-control col-sm-12"></textarea>
                </div>
                <br>
            </div>


            <div id="div_dropdown">
                <div class="row">
                    <label>Dropdown : </label>
                    <select class="form-select col-sm-12" aria-label="Default select example" name="userDropdown">
                        <option value="" selected disabled hiddend>Select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <br>
            </div>


            <div id="div_radio">
                <div class="row">
                    <label>Radio-check : </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="userRadios" id="exampleRadios1" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            First radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="userRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Second radio
                        </label>
                    </div>
                </div>

                <br>
            </div>


            <div id="div_submit">
                <br>
                <div class="text-center">
                    <button class="btn btn-primary btn-lg btn1" type="submit" name="submit_button">
                        Submit
                    </button>
                </div>
                <br>
            </div>
        </form>


        <!--jQuery to show/hide div-->
        <script type="text/javascript">
            $("#btn_password").click(function() {
                $("#div_password").toggle();
            });
            $("#btn_text").click(function() {
                $("#div_text").toggle();
            });
            $("#btn_email").click(function() {
                $("#div_email").toggle();
            });
            $("#btn_url").click(function() {
                $("#div_url").toggle();
            });
            $("#btn_tel").click(function() {
                $("#div_tel").toggle();
            });
            $("#btn_number").click(function() {
                $("#div_number").toggle();
            });
            $("#btn_date").click(function() {
                $("#div_date").toggle();
            });
            $("#btn_textarea").click(function() {
                $("#div_textarea").toggle();
            });
            $("#btn_dropdown").click(function() {
                $("#div_dropdown").toggle();
            });
            $("#btn_radio").click(function() {
                $("#div_radio").toggle();
            });
            $("#btn_submit").click(function() {
                $("#div_submit").toggle();
            });
        </script>

    </div>

    <script src="<?php echo base_url('js/form_validation.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap.js'); ?>">
    </script>


</body>

</html>