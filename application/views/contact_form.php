<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Form</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon/favicon-16x16.png'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/registeration_form.css'); ?>">

    <style>
        @media only screen and (min-width: 768px) {
            .form-check-input {
                margin-top: 10px;
            }
        }
    </style>

</head>

<body>

    <?php include('includes/navbar.php') ?>

    <br>

    <div class="container">



        <!-- MODALS -->
        <section>

            <!-- Modal password-->
            <div class="modal fade" id="password_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formPassword" onsubmit="submitFormPassword(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Field Type </label>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="password_required" class="form-check-input" onchange="all_password_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_Label" onchange="all_password_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_Text" onchange="all_password_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_DefaultValue" onchange="all_password_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_ID" onchange="all_password_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_Class" onchange="all_password_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="password_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="password_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>

                                <script type="text/javascript">
                                    var password_ID = document.getElementById("password_ID").value;
                                    var password_DefaultValue = document.getElementById("password_DefaultValue").value;
                                    var password_Text = document.getElementById("password_Text").value;
                                    var password_Class = document.getElementById("password_Class").value;
                                    var password_Label = document.getElementById("password_Label").value;
                                    var password_tag_temp = document.getElementById("password_tag");

                                    password_tag_temp.value = "[password]";
                                    password_basic = "password";

                                    function all_password_onchange() {
                                        get_all_variable_value_for_password();

                                        var password_Label_val = '';
                                        var password_Text_val = '';
                                        var password_DefaultValue_val = '';
                                        var password_ID_val = '';
                                        var password_Class_val = '';

                                        if (document.getElementById('password_required').checked) {
                                            password_basic = 'password "required:' + 'required"';
                                        } else {
                                            password_basic = "password";
                                        }

                                        if (password_Label != "") {
                                            password_Label_val = ' "label:' + password_Label + '"';
                                        }
                                        if (password_Text != "") {
                                            password_Text_val = ' "name:' + password_Text + '"';
                                        }
                                        if (password_DefaultValue != "") {
                                            password_DefaultValue_val = ' "default_value:' + password_DefaultValue + '"';
                                        }
                                        if (password_ID != "") {
                                            password_ID_val = ' "id:' + password_ID + '"';
                                        }
                                        if (password_Class != "") {
                                            password_Class_val = ' "class:' + password_Class + '"';
                                        }

                                        password_tag_temp.value = password_basic + password_Label_val + password_Text_val + password_DefaultValue_val +
                                            password_ID_val + password_Class_val;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_password() {
                                        password_ID = document.getElementById("password_ID").value;
                                        password_DefaultValue = document.getElementById("password_DefaultValue").value;
                                        password_Text = document.getElementById("password_Text").value;
                                        password_Class = document.getElementById("password_Class").value;
                                        password_Label = document.getElementById("password_Label").value;
                                        password_tag_temp = document.getElementById("password_tag");
                                    }


                                    function submitFormPassword(event) {
                                        event.preventDefault();
                                        var password_Text = document.getElementById("password_Text").value;

                                        if (password_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var password_tag = document.getElementById("password_tag").value;

                                            new_input_password = password_tag;

                                            var new_textarea = $("#new_textarea");
                                            $("#new_textarea").insertAtCaret(new_input_password);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var password_ID = document.getElementById("password_ID").value;
                                            var password_DefaultValue = document.getElementById("password_DefaultValue").value;
                                            var password_Text = document.getElementById("password_Text").value;
                                            var password_Class = document.getElementById("password_Class").value;
                                            var password_Label = document.getElementById("password_Label").value;


                                            var html_password_input = '<div class="' + password_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            html_password_input = l1 + password_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            html_password_input = 'type="password" ';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);

                                            if (password_Text != "") {
                                                html_password_input = 'name="' + password_Text + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_password_input);
                                            }
                                            if (password_DefaultValue != "") {
                                                html_password_input = 'value="' + password_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_password_input);
                                            }
                                            if (password_Class != "") {
                                                html_password_input = 'class="' + password_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_password_input);
                                            }
                                            if (password_ID != "") {
                                                html_password_input = 'id="' + password_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_password_input);
                                            }


                                            if (document.getElementById('password_required').checked) {
                                                html_password_input = l10;
                                            } else {
                                                html_password_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formPassword").reset();

                                            var password_tag_temp = document.getElementById("password_tag");
                                            password_tag_temp.value = "[password]";

                                            $("#password_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal text-->
            <div class="modal fade" id="text_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: text</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formText" onsubmit="submitFormText(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="text_required" class="form-check-input" onchange="all_text_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_Label" onchange="all_text_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_Text" onchange="all_text_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_DefaultValue" onchange="all_text_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_ID" onchange="all_text_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_Class" onchange="all_text_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="text_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="text_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var text_ID = document.getElementById("text_ID").value;
                                    var text_DefaultValue = document.getElementById("text_DefaultValue").value;
                                    var text_Text = document.getElementById("text_Text").value;
                                    var text_Class = document.getElementById("text_Class").value;
                                    var text_Label = document.getElementById("text_Label").value;
                                    var text_tag_temp = document.getElementById("text_tag");

                                    text_tag_temp.value = "[text]";
                                    text_basic = "text";

                                    function all_text_onchange() {
                                        get_all_variable_value_for_text();

                                        var text_Label_val = '';
                                        var text_Text_val = '';
                                        var text_DefaultValue_val = '';
                                        var text_ID_val = '';
                                        var text_Class_val = '';

                                        if (document.getElementById('text_required').checked) {
                                            text_basic = 'text "required:' + 'required"';
                                        } else {
                                            text_basic = "text";
                                        }

                                        if (text_Label != "") {
                                            text_Label_val = ' "label:' + text_Label + '"';
                                        }
                                        if (text_Text != "") {
                                            text_Text_val = ' "name:' + text_Text + '"';
                                        }
                                        if (text_DefaultValue != "") {
                                            text_DefaultValue_val = ' "default_value:' + text_DefaultValue + '"';
                                        }
                                        if (text_ID != "") {
                                            text_ID_val = ' "id:' + text_ID + '"';
                                        }
                                        if (text_Class != "") {
                                            text_Class_val = ' "class:' + text_Class + '"';
                                        }


                                        text_tag_temp.value = text_basic + text_Label_val + text_Text_val + text_DefaultValue_val +
                                            text_ID_val + text_Class_val;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";

                                    }


                                    function get_all_variable_value_for_text() {
                                        text_ID = document.getElementById("text_ID").value;
                                        text_DefaultValue = document.getElementById("text_DefaultValue").value;
                                        text_Text = document.getElementById("text_Text").value;
                                        text_Class = document.getElementById("text_Class").value;
                                        text_Label = document.getElementById("text_Label").value;
                                        text_tag_temp = document.getElementById("text_tag");
                                    }


                                    function submitFormText(event) {
                                        event.preventDefault();
                                        var text_Text = document.getElementById("text_Text").value;
                                        if (text_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var text_tag = document.getElementById("text_tag").value;

                                            new_input_text = text_tag;

                                            $("#new_textarea").insertAtCaret(new_input_text);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var text_ID = document.getElementById("text_ID").value;
                                            var text_DefaultValue = document.getElementById("text_DefaultValue").value;
                                            var text_Text = document.getElementById("text_Text").value;
                                            var text_Class = document.getElementById("text_Class").value;
                                            var text_Label = document.getElementById("text_Label").value;


                                            var html_text_input = '<div class="' + text_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            html_text_input = l1 + text_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);


                                            var html_text_input = 'type="text" ';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);

                                            if (text_Text != "") {
                                                var html_text_input = 'name="' + text_Text + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_text_input);
                                            }
                                            if (text_DefaultValue != "") {
                                                var html_text_input = 'value="' + text_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_text_input);
                                            }
                                            if (text_Class != "") {
                                                var html_text_input = 'class="' + text_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_text_input);
                                            }
                                            if (text_ID != "") {
                                                var html_text_input = 'id="' + text_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_text_input);
                                            }

                                            if (document.getElementById('text_required').checked) {
                                                html_text_input = l10;
                                            } else {
                                                html_text_input = l11;
                                            }


                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formText").reset();
                                            var text_tag_temp = document.getElementById("text_tag");
                                            text_tag_temp.value = "[text]";

                                            $("#text_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>

                            </form>


                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal email-->
            <div class="modal fade" id="email_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: email</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formEmail" onsubmit="submitFormEmail(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="email_required" class="form-check-input" onchange="all_email_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_Label" onchange="all_email_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_Text" onchange="all_email_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="email" class="form-control col-sm-12" id="email_DefaultValue" onchange="all_email_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_ID" onchange="all_email_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_Class" onchange="all_email_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="email_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="email_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var email_ID = document.getElementById("email_ID").value;
                                    var email_DefaultValue = document.getElementById("email_DefaultValue").value;
                                    var email_Text = document.getElementById("email_Text").value;
                                    var email_Class = document.getElementById("email_Class").value;
                                    var email_Label = document.getElementById("email_Label").value;
                                    var email_tag_temp = document.getElementById("email_tag");

                                    email_tag_temp.value = "[email]";
                                    email_basic = "email";


                                    function all_email_onchange() {
                                        get_all_variable_value_for_email();

                                        var email_Label_val = '';
                                        var email_Text_val = '';
                                        var email_DefaultValue_val = '';
                                        var email_ID_val = '';
                                        var email_Class_val = '';

                                        if (document.getElementById('email_required').checked) {
                                            email_basic = 'email "required:' + 'required"';
                                        } else {
                                            email_basic = "email";
                                        }

                                        if (email_Label != "") {
                                            email_Label_val = ' "label:' + email_Label + '"';
                                        }
                                        if (email_Text != "") {
                                            email_Text_val = ' "name:' + email_Text + '"';
                                        }
                                        if (email_DefaultValue != "") {
                                            email_DefaultValue_val = ' "default_value:' + email_DefaultValue + '"';
                                        }
                                        if (email_ID != "") {
                                            email_ID_val = ' "id:' + email_ID + '"';
                                        }
                                        if (email_Class != "") {
                                            email_Class_val = ' "class:' + email_Class + '"';
                                        }

                                        email_tag_temp.value = email_basic + email_Label_val + email_Text_val + email_DefaultValue_val + email_ID_val +
                                            email_Class_val;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_email() {
                                        email_ID = document.getElementById("email_ID").value;
                                        email_DefaultValue = document.getElementById("email_DefaultValue").value;
                                        email_Text = document.getElementById("email_Text").value;
                                        email_Class = document.getElementById("email_Class").value;
                                        email_Label = document.getElementById("email_Label").value;
                                        email_tag_temp = document.getElementById("email_tag");
                                    }


                                    function submitFormEmail(event) {
                                        event.preventDefault();
                                        var email_Text = document.getElementById("email_Text").value;
                                        if (email_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var email_tag = document.getElementById("email_tag").value;

                                            new_input_email = email_tag;
                                            $("#new_textarea").insertAtCaret(new_input_email);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var email_ID = document.getElementById("email_ID").value;
                                            var email_DefaultValue = document.getElementById("email_DefaultValue").value;
                                            var email_Text = document.getElementById("email_Text").value;
                                            var email_Class = document.getElementById("email_Class").value;
                                            var email_Label = document.getElementById("email_Label").value;


                                            var html_email_input = '<div class="' + email_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            html_email_input = l1 + email_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            html_email_input = 'type="email" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            html_email_input = 'name="' + email_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);

                                            if (email_DefaultValue != "") {
                                                html_email_input = 'value="' + email_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_email_input);
                                            }
                                            if (email_Class != "") {
                                                html_email_input = 'class="' + email_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_email_input);
                                            }
                                            if (email_ID != "") {
                                                html_email_input = 'id="' + email_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_email_input);
                                            }

                                            if (document.getElementById('email_required').checked) {
                                                html_email_input = l10;
                                            } else {
                                                html_email_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formEmail").reset();

                                            email_tag_temp = document.getElementById("email_tag");
                                            email_tag_temp.value = "[email]";

                                            $("#email_modal").modal('hide');


                                            return false;
                                        }
                                    }
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal URL-->
            <div class="modal fade" id="URL_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: URL</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formURL" onsubmit="submitFormURL(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="URL_required" class="form-check-input" onchange="all_url_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_Label" onchange="all_url_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_Text" onchange="all_url_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="url" class="form-control col-sm-12" id="URL_DefaultValue" onchange="all_url_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_ID" onchange="all_url_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_Class" onchange="all_url_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="URL_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="URL_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var URL_ID = document.getElementById("URL_ID").value;
                                    var URL_DefaultValue = document.getElementById("URL_DefaultValue").value;
                                    var URL_Text = document.getElementById("URL_Text").value;
                                    var URL_Class = document.getElementById("URL_Class").value;
                                    var URL_Label = document.getElementById("URL_Label").value;
                                    var URL_tag_temp = document.getElementById("URL_tag");

                                    URL_tag_temp.value = "[url]";
                                    URL_basic = "url";


                                    function all_url_onchange() {
                                        get_all_variable_value_for_url();

                                        var URL_Label_val = '';
                                        var URL_Text_val = '';
                                        var URL_DefaultValue_val = '';
                                        var URL_ID_val = '';
                                        var URL_Class_val = '';

                                        if (document.getElementById('URL_required').checked) {
                                            URL_basic = 'url "required:' + 'required"';
                                        } else {
                                            URL_basic = "url";
                                        }

                                        if (URL_Label != "") {
                                            URL_Label_val = ' "label:' + URL_Label + '"';
                                        }
                                        if (URL_Text != "") {
                                            URL_Text_val = ' "name:' + URL_Text + '"';
                                        }
                                        if (URL_DefaultValue != "") {
                                            URL_DefaultValue_val = ' "default_value:' + URL_DefaultValue + '"';
                                        }
                                        if (URL_ID != "") {
                                            URL_ID_val = ' "id:' + URL_ID + '"';
                                        }
                                        if (URL_Class != "") {
                                            URL_Class_val = ' "class:' + URL_Class + '"';
                                        }

                                        URL_tag_temp.value = URL_basic + URL_Label_val + URL_Text_val + URL_DefaultValue_val + URL_ID_val +
                                            URL_Class_val;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
                                    }

                                    function get_all_variable_value_for_url() {
                                        URL_ID = document.getElementById("URL_ID").value;
                                        URL_DefaultValue = document.getElementById("URL_DefaultValue").value;
                                        URL_Text = document.getElementById("URL_Text").value;
                                        URL_Class = document.getElementById("URL_Class").value;
                                        URL_Label = document.getElementById("URL_Label").value;
                                        URL_tag_temp = document.getElementById("URL_tag");
                                    }


                                    function submitFormURL(event) {
                                        event.preventDefault();
                                        var URL_Text = document.getElementById("URL_Text").value;
                                        if (URL_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var URL_tag = document.getElementById("URL_tag").value;

                                            new_input_URL = URL_tag;
                                            $("#new_textarea").insertAtCaret(new_input_URL);
                                            $("#new_textarea").insertAtCaret("\n\n");

                                            var URL_ID = document.getElementById("URL_ID").value;
                                            var URL_DefaultValue = document.getElementById("URL_DefaultValue").value;
                                            var URL_Text = document.getElementById("URL_Text").value;
                                            var URL_Class = document.getElementById("URL_Class").value;
                                            var URL_Label = document.getElementById("URL_Label").value;

                                            var html_URL_input = '<div class="' + URL_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            html_URL_input = l1 + URL_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            html_URL_input = 'type="url" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            html_URL_input = 'name="' + URL_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);

                                            if (URL_DefaultValue != "") {
                                                html_URL_input = 'value="' + URL_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            }
                                            if (URL_Class != "") {
                                                html_URL_input = 'class="' + URL_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            }
                                            if (URL_ID != "") {
                                                html_URL_input = 'id="' + URL_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            }

                                            if (document.getElementById('URL_required').checked) {
                                                html_URL_input = l10;
                                            } else {
                                                html_URL_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formURL").reset();

                                            URL_tag_temp = document.getElementById("URL_tag");
                                            URL_tag_temp.value = "[url]";

                                            $("#URL_modal").modal('hide');
                                            // alert(new_input_text);
                                            return false;
                                        }
                                    }
                                </script>

                            </form>


                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal tel-->
            <div class="modal fade" id="tel_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: telephone</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formTel" onsubmit="submitFormTel(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="tel_required" class="form-check-input" onchange="all_tel_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_Label" onchange="all_tel_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_Text" onchange="all_tel_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="tel" class="form-control col-sm-12" id="tel_DefaultValue" onchange="all_tel_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_ID" onchange="all_tel_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_Class" onchange="all_tel_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="tel_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="tel_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var tel_ID = document.getElementById("tel_ID").value;
                                    var tel_DefaultValue = document.getElementById("tel_DefaultValue").value;
                                    var tel_Text = document.getElementById("tel_Text").value;
                                    var tel_Class = document.getElementById("tel_Class").value;
                                    var tel_Label = document.getElementById("tel_Label").value;
                                    var tel_tag_temp = document.getElementById("tel_tag");

                                    tel_tag_temp.value = "[tel]";
                                    tel_basic = "tel";


                                    function all_tel_onchange() {
                                        get_all_variable_value_for_tel();

                                        var tel_Label_val = '';
                                        var tel_Text_val = '';
                                        var tel_DefaultValue_val = '';
                                        var tel_ID_val = '';
                                        var tel_Class_val = '';

                                        if (document.getElementById('tel_required').checked) {
                                            tel_basic = 'tel "required:' + 'required"';
                                        } else {
                                            tel_basic = "tel";
                                        }

                                        if (tel_Label != "") {
                                            tel_Label_val = ' "label:' + tel_Label + '"';
                                        }
                                        if (tel_Text != "") {
                                            tel_Text_val = ' "name:' + tel_Text + '"';
                                        }
                                        if (tel_DefaultValue != "") {
                                            tel_DefaultValue_val = ' "default_value:' + tel_DefaultValue + '"';
                                        }
                                        if (tel_ID != "") {
                                            tel_ID_val = ' "id:' + tel_ID + '"';
                                        }
                                        if (tel_Class != "") {
                                            tel_Class_val = ' "class:' + tel_Class + '"';
                                        }

                                        tel_tag_temp.value = tel_basic + tel_Label_val + tel_Text_val + tel_DefaultValue_val + tel_ID_val +
                                            tel_Class_val;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
                                    }

                                    function get_all_variable_value_for_tel() {
                                        tel_ID = document.getElementById("tel_ID").value;
                                        tel_DefaultValue = document.getElementById("tel_DefaultValue").value;
                                        tel_Text = document.getElementById("tel_Text").value;
                                        tel_Class = document.getElementById("tel_Class").value;
                                        tel_Label = document.getElementById("tel_Label").value;
                                    }


                                    function submitFormTel(event) {
                                        event.preventDefault();
                                        var tel_Text = document.getElementById("tel_Text").value;
                                        if (tel_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var tel_tag = document.getElementById("tel_tag").value;

                                            new_input_Tel = tel_tag;
                                            $("#new_textarea").insertAtCaret(new_input_Tel);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var tel_ID = document.getElementById("tel_ID").value;
                                            var tel_DefaultValue = document.getElementById("tel_DefaultValue").value;
                                            var tel_Text = document.getElementById("tel_Text").value;
                                            var tel_Class = document.getElementById("tel_Class").value;
                                            var tel_Label = document.getElementById("tel_Label").value;

                                            var html_tel_input = '<div class="' + tel_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            html_tel_input = l1 + tel_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            html_tel_input = 'type="tel" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            html_tel_input = 'name="' + tel_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);

                                            if (tel_DefaultValue != "") {
                                                html_tel_input = 'value="' + tel_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            }
                                            if (tel_Class != "") {
                                                html_tel_input = 'class="' + tel_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            }
                                            if (tel_ID != "") {
                                                html_tel_input = 'id="' + tel_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            }

                                            if (document.getElementById('tel_required').checked) {
                                                html_tel_input = l10;
                                            } else {
                                                html_tel_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formTel").reset();

                                            tel_tag_temp = document.getElementById("tel_tag");
                                            tel_tag_temp.value = "[tel]";

                                            $("#tel_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>

                            </form>


                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal textarea-->
            <div class="modal fade" id="textarea_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: textarea</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formTextarea" onsubmit="submitFormTextarea(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="textarea_required" class="form-check-input" onchange="all_textarea_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_Label" onchange="all_textarea_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_Text" onchange="all_textarea_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_DefaultValue" onchange="all_textarea_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_ID" onchange="all_textarea_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_Class" onchange="all_textarea_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="textarea_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="textarea_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var textarea_ID = document.getElementById("textarea_ID").value;
                                    var textarea_DefaultValue = document.getElementById("textarea_DefaultValue").value;
                                    var textarea_Text = document.getElementById("textarea_Text").value;
                                    var textarea_Class = document.getElementById("textarea_Class").value;
                                    var textarea_Label = document.getElementById("textarea_Label").value;
                                    var textarea_tag_temp = document.getElementById("textarea_tag");

                                    textarea_tag_temp.value = "[textarea]";
                                    textarea_basic = "textarea";


                                    function all_textarea_onchange() {
                                        get_all_variable_value_for_textarea();

                                        var textarea_Label_val = '';
                                        var textarea_Text_val = '';
                                        var textarea_DefaultValue_val = '';
                                        var textarea_ID_val = '';
                                        var textarea_Class_val = '';

                                        if (document.getElementById('textarea_required').checked) {
                                            textarea_basic = 'textarea "required:' + 'required"';
                                        } else {
                                            textarea_basic = "textarea";
                                        }

                                        if (textarea_Label != "") {
                                            textarea_Label_val = ' "label:' + textarea_Label + '"';
                                        }
                                        if (textarea_Text != "") {
                                            textarea_Text_val = ' "name:' + textarea_Text + '"';
                                        }
                                        if (textarea_DefaultValue != "") {
                                            textarea_DefaultValue_val = ' "default_value:' + textarea_DefaultValue + '"';
                                        }
                                        if (textarea_ID != "") {
                                            textarea_ID_val = ' "id:' + textarea_ID + '"';
                                        }
                                        if (textarea_Class != "") {
                                            textarea_Class_val = ' "class:' + textarea_Class + '"';
                                        }

                                        textarea_tag_temp.value = textarea_basic + textarea_Label_val + textarea_Text_val + textarea_DefaultValue_val +
                                            textarea_ID_val + textarea_Class_val;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_textarea() {
                                        textarea_ID = document.getElementById("textarea_ID").value;
                                        textarea_DefaultValue = document.getElementById("textarea_DefaultValue").value;
                                        textarea_Text = document.getElementById("textarea_Text").value;
                                        textarea_Class = document.getElementById("textarea_Class").value;
                                        textarea_Label = document.getElementById("textarea_Label").value;
                                        textarea_tag_temp = document.getElementById("textarea_tag");
                                    }


                                    function submitFormTextarea(event) {
                                        event.preventDefault();
                                        var textarea_Text = document.getElementById("textarea_Text").value;
                                        if (textarea_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var textarea_tag = document.getElementById("textarea_tag").value;

                                            new_input_Textarea = textarea_tag;
                                            $("#new_textarea").insertAtCaret(new_input_Textarea);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var textarea_ID = document.getElementById("textarea_ID").value;
                                            var textarea_DefaultValue = document.getElementById("textarea_DefaultValue").value;
                                            var textarea_Text = document.getElementById("textarea_Text").value;
                                            var textarea_Class = document.getElementById("textarea_Class").value;
                                            var textarea_Label = document.getElementById("textarea_Label").value;

                                            var html_textarea_input = '<div class="' + textarea_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            html_textarea_input = l1 + textarea_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l8);

                                            html_textarea_input = 'name="' + textarea_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);

                                            if (textarea_DefaultValue != '') {
                                                html_textarea_input = 'value="' + textarea_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            }
                                            if (textarea_Class != '') {
                                                html_textarea_input = 'class="' + textarea_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            }
                                            if (textarea_ID != '') {
                                                html_textarea_input = 'id="' + textarea_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            }

                                            if (document.getElementById('textarea_required').checked) {
                                                html_textarea_input = l10;
                                            } else {
                                                html_textarea_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            $("#textarea_html_code").insertAtCaret(l9);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formTextarea").reset();

                                            var textarea_tag_temp = document.getElementById("textarea_tag");
                                            textarea_tag_temp.value = "[textarea]";

                                            $("#textarea_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal number-->
            <div class="modal fade" id="number_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: number</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formNumber" onsubmit="submitFormNumber(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="number_required" class="form-check-input" onchange="all_number_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_Label" onchange="all_number_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_Text" onchange="all_number_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control col-sm-12" id="number_DefaultValue" onchange="all_number_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Range </label>
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Min </label>
                                            <input type="number" class="form-control col-sm-12" id="number_MinValue" onchange="all_number_onchange()">
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Max </label>
                                            <input type="number" class="form-control col-sm-12" id="number_MaxValue" onchange="all_number_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_ID" onchange="all_number_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_Class" onchange="all_number_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="number_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="number_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var number_ID = document.getElementById("number_ID").value;
                                    var number_DefaultValue = document.getElementById("number_DefaultValue").value;
                                    var number_Text = document.getElementById("number_Text").value;
                                    var number_Class = document.getElementById("number_Class").value;
                                    var number_MinValue = document.getElementById("number_MinValue").value;
                                    var number_MaxValue = document.getElementById("number_MaxValue").value;
                                    var number_Label = document.getElementById("number_Label").value;
                                    var number_tag_temp = document.getElementById("number_tag");

                                    number_tag_temp.value = "[number]";
                                    number_basic = "number";


                                    function all_number_onchange() {
                                        get_all_variable_value_for_number();

                                        var number_Label_val = '';
                                        var number_Text_val = '';
                                        var number_DefaultValue_val = '';
                                        var number_ID_val = '';
                                        var number_Class_val = '';
                                        var number_MinValue_val = '';
                                        var number_MaxValue_val = '';

                                        if (document.getElementById('number_required').checked) {
                                            number_basic = 'number "required:' + 'required"';
                                        } else {
                                            number_basic = "number";
                                        }

                                        if (number_Label != "") {
                                            number_Label_val = ' "label:' + number_Label + '"';
                                        }
                                        if (number_Text != "") {
                                            number_Text_val = ' "name:' + number_Text + '"';
                                        }
                                        if (number_DefaultValue != "") {
                                            number_DefaultValue_val = ' "default_value:' + number_DefaultValue + '"';
                                        }
                                        if (number_MinValue != "") {
                                            number_MinValue_val = ' "min:' + number_MinValue + '"';
                                        }
                                        if (number_MaxValue != "") {
                                            number_MaxValue_val = ' "max:' + number_MaxValue + '"';
                                        }
                                        if (number_ID != "") {
                                            number_ID_val = ' "id:' + number_ID + '"';
                                        }
                                        if (number_Class != "") {
                                            number_Class_val = ' "class:' + number_Class + '"';
                                        }

                                        number_tag_temp.value = number_basic + number_Label_val + number_Text_val + number_DefaultValue_val +
                                            number_MinValue_val + number_MaxValue_val + number_ID_val + number_Class_val;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_number() {
                                        number_ID = document.getElementById("number_ID").value;
                                        number_DefaultValue = document.getElementById("number_DefaultValue").value;
                                        number_Text = document.getElementById("number_Text").value;
                                        number_Class = document.getElementById("number_Class").value;
                                        number_MinValue = document.getElementById("number_MinValue").value;
                                        number_MaxValue = document.getElementById("number_MaxValue").value;
                                        number_Label = document.getElementById("number_Label").value;
                                        number_tag_temp = document.getElementById("number_tag");
                                    }


                                    function submitFormNumber(event) {
                                        event.preventDefault();
                                        var number_Text = document.getElementById("number_Text").value;
                                        if (number_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var number_tag = document.getElementById("number_tag").value;

                                            new_input_Number = number_tag;
                                            $("#new_textarea").insertAtCaret(new_input_Number);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var number_ID = document.getElementById("number_ID").value;
                                            var number_DefaultValue = document.getElementById("number_DefaultValue").value;
                                            var number_Text = document.getElementById("number_Text").value;
                                            var number_Class = document.getElementById("number_Class").value;
                                            var number_MinValue = document.getElementById("number_MinValue").value;
                                            var number_MaxValue = document.getElementById("number_MaxValue").value;
                                            var number_Label = document.getElementById("number_Label").value;

                                            var html_number_input = '<div class="' + number_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            html_number_input = l1 + number_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            html_number_input = 'type="number" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            html_number_input = 'name="' + number_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);

                                            if (number_DefaultValue != '') {
                                                html_number_input = 'value="' + number_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_number_input);
                                            }
                                            if (number_MinValue != '') {
                                                html_number_input = 'min="' + number_MinValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_number_input);
                                            }
                                            if (number_MaxValue != '') {
                                                html_number_input = 'max="' + number_MaxValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_number_input);
                                            }
                                            if (number_Class != '') {
                                                html_number_input = 'class="' + number_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_number_input);
                                            }
                                            if (number_ID != '') {
                                                html_number_input = 'id="' + number_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_number_input);
                                            }

                                            if (document.getElementById('number_required').checked) {
                                                html_number_input = l10;
                                            } else {
                                                html_number_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formNumber").reset();

                                            var number_tag_temp = document.getElementById("number_tag");
                                            number_tag_temp.value = "[number]";

                                            $("#number_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal date-->
            <div class="modal fade" id="date_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: date</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formDate" onsubmit="submitFormDate(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="date_required" class="form-check-input" onchange="all_date_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_Label" onchange="all_date_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_Text" onchange="all_date_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control col-sm-12" id="date_DefaultValue" onchange="all_date_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Range </label>
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Min </label>
                                            <input type="date" class="form-control col-sm-12" id="date_MinValue" onchange="all_date_onchange()">
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Max </label>
                                            <input type="date" class="form-control col-sm-12" id="date_MaxValue" onchange="all_date_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_ID" onchange="all_date_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_Class" onchange="all_date_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="date_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="date_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var date_ID = document.getElementById("date_ID").value;
                                    var date_DefaultValue = document.getElementById("date_DefaultValue").value;
                                    var date_Text = document.getElementById("date_Text").value;
                                    var date_Class = document.getElementById("date_Class").value;
                                    var date_MinValue = document.getElementById("date_MinValue").value;
                                    var date_MaxValue = document.getElementById("date_MaxValue").value;
                                    var date_Label = document.getElementById("date_Label").value;
                                    var date_tag_temp = document.getElementById("date_tag");

                                    date_tag_temp.value = "[date]";
                                    date_basic = "date";

                                    function all_date_onchange() {
                                        get_all_variable_value_for_date();

                                        var date_Label_val = '';
                                        var date_Text_val = '';
                                        var date_DefaultValue_val = '';
                                        var date_ID_val = '';
                                        var date_Class_val = '';
                                        var date_MinValue_val = '';
                                        var date_MaxValue_val = '';

                                        if (document.getElementById('date_required').checked) {
                                            date_basic = 'date "required:' + 'required"';
                                        } else {
                                            date_basic = "date";
                                        }

                                        if (date_Label != "") {
                                            date_Label_val = ' "label:' + date_Label + '"';
                                        }
                                        if (date_Text != "") {
                                            date_Text_val = ' "name:' + date_Text + '"';
                                        }
                                        if (date_DefaultValue != "") {
                                            date_DefaultValue_val = ' "default_value:' + date_DefaultValue + '"';
                                        }
                                        if (date_MinValue != "") {
                                            date_MinValue_val = ' "min:' + date_MinValue + '"';
                                        }
                                        if (date_MaxValue != "") {
                                            date_MaxValue_val = ' "max:' + date_MaxValue + '"';
                                        }
                                        if (date_ID != "") {
                                            date_ID_val = ' "id:' + date_ID + '"';
                                        }
                                        if (date_Class != "") {
                                            date_Class_val = ' "class:' + date_Class + '"';
                                        }

                                        date_tag_temp.value = date_basic + date_Label_val + date_Text_val + date_DefaultValue_val +
                                            date_MinValue_val + date_MaxValue_val + date_ID_val + date_Class_val;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function get_all_variable_value_for_date() {
                                        date_ID = document.getElementById("date_ID").value;
                                        date_DefaultValue = document.getElementById("date_DefaultValue").value;
                                        date_Text = document.getElementById("date_Text").value;
                                        date_Class = document.getElementById("date_Class").value;
                                        date_MinValue = document.getElementById("date_MinValue").value;
                                        date_MaxValue = document.getElementById("date_MaxValue").value;
                                        date_Label = document.getElementById("date_Label").value;
                                        date_tag_temp = document.getElementById("date_tag");
                                    }


                                    function submitFormDate(event) {
                                        event.preventDefault();
                                        var date_Text = document.getElementById("date_Text").value;
                                        if (date_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var date_tag = document.getElementById("date_tag").value;

                                            new_input_Date = date_tag;
                                            $("#new_textarea").insertAtCaret(new_input_Date);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var date_ID = document.getElementById("date_ID").value;
                                            var date_DefaultValue = document.getElementById("date_DefaultValue").value;
                                            var date_Text = document.getElementById("date_Text").value;
                                            var date_Class = document.getElementById("date_Class").value;
                                            var date_MinValue = document.getElementById("date_MinValue").value;
                                            var date_MaxValue = document.getElementById("date_MaxValue").value;
                                            var date_Label = document.getElementById("date_Label").value;

                                            var html_date_input = '<div class="' + date_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            html_date_input = l1 + date_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            html_date_input = 'type="date" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            html_date_input = 'name="' + date_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);

                                            if (date_DefaultValue != '') {
                                                html_date_input = 'value="' + date_DefaultValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_date_input);
                                            }
                                            if (date_MinValue != '') {
                                                html_date_input = 'min="' + date_MinValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_date_input);
                                            }
                                            if (date_MaxValue != '') {
                                                html_date_input = 'max="' + date_MaxValue + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_date_input);
                                            }
                                            if (date_Class != '') {
                                                html_date_input = 'class="' + date_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_date_input);
                                            }
                                            if (date_ID != '') {
                                                html_date_input = 'id="' + date_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_date_input);
                                            }

                                            if (document.getElementById('date_required').checked) {
                                                html_date_input = l10;
                                            } else {
                                                html_date_input = l11;
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formDate").reset();

                                            var date_tag_temp = document.getElementById("date_tag");
                                            date_tag_temp.value = "[date]";

                                            $("#date_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal submit-->
            <div class="modal fade" id="submit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: submit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formSubmit" onsubmit="submitFormSubmit(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_Label" onchange="all_submit_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_Name" onchange="all_submit_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_ID" onchange="all_submit_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_Class" onchange="all_submit_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="submit_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="submit_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var submit_ID = document.getElementById("submit_ID").value;
                                    var submit_Label = document.getElementById("submit_Label").value;
                                    var submit_Name = document.getElementById("submit_Name").value;
                                    var submit_Class = document.getElementById("submit_Class").value;
                                    var submit_tag_temp = document.getElementById("submit_tag");

                                    submit_tag_temp.value = "[submit]";
                                    submit_basic = "submit";


                                    function all_submit_onchange() {
                                        get_all_variable_value_for_submit();

                                        var submit_Label_val = '';
                                        var submit_Name_val = '';
                                        var submit_ID_val = '';
                                        var submit_Class_val = '';

                                        if (submit_Label != "") {
                                            submit_Label_val = ' "label:' + submit_Label + '"';
                                        }
                                        if (submit_Name != "") {
                                            submit_Name_val = ' "name:' + submit_Name + '"';
                                        }
                                        if (submit_ID != "") {
                                            submit_ID_val = ' "id:' + submit_ID + '"';
                                        }
                                        if (submit_Class != "") {
                                            submit_Class_val = ' "class:' + submit_Class + '"';
                                        }

                                        submit_tag_temp.value = submit_basic + submit_Label_val + submit_Name + submit_ID_val + submit_Class_val;
                                        submit_tag_temp.value = "[" + submit_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_submit() {
                                        submit_ID = document.getElementById("submit_ID").value;
                                        submit_Label = document.getElementById("submit_Label").value;
                                        submit_Name = document.getElementById("submit_Name").value;
                                        submit_Class = document.getElementById("submit_Class").value;
                                        submit_tag_temp = document.getElementById("submit_tag");
                                    }


                                    function submitFormSubmit(event) {
                                        event.preventDefault();

                                        var submit_tag = document.getElementById("submit_tag").value;

                                        new_input_Submit = submit_tag;
                                        $("#new_textarea").insertAtCaret(new_input_Submit);
                                        $("#new_textarea").insertAtCaret("\n\n");


                                        var submit_ID = document.getElementById("submit_ID").value;
                                        var submit_Label = document.getElementById("submit_Label").value;
                                        var submit_Name = document.getElementById("submit_Name").value;
                                        var submit_Class = document.getElementById("submit_Class").value;


                                        var html_submit_input = '<div class="' + submit_Name + '">\n';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        // var html_submit_input = l1 + submit_Label + l2;
                                        // alert(html_password_input);
                                        // $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        // $("#textarea_html_code").insertAtCaret("\n");
                                        $("#textarea_html_code").insertAtCaret(l3);


                                        html_submit_input = 'type="submit" ';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        html_submit_input = 'value="' + submit_Label + '" ';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        html_submit_input = 'class="' + submit_Class + '" ';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        html_submit_input = 'id="' + submit_ID + '">\n</div>';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        $("#textarea_html_code").insertAtCaret("\n\n");


                                        document.getElementById("formSubmit").reset();

                                        var submit_tag_temp = document.getElementById("submit_tag");
                                        submit_tag_temp.value = "[submit]";

                                        $("#submit_modal").modal('hide');
                                        return false;
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal dropdown-->
            <div class="modal fade" id="dropdown_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: dropdown</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formDropdown" onsubmit="submitFormDropdown(event)">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="dropdown_required" class="form-check-input" onchange="all_dropdown_onchange()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_Label" onchange="all_dropdown_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_Text" onchange="all_dropdown_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Options </label>
                                        </div>
                                        <div class="col">
                                            <textarea id="dropdown_Options" cols="30" rows="5" onchange="all_dropdown_onchange()"></textarea> One option per line
                                            <!-- <br>
                                            <input type="checkbox" id="dropdown_Options_Multiple" class="form-check-input" onchange="all_dropdown_onchange()"> Allow Multiple Selections
                                            <br>
                                            <input type="checkbox" id="dropdown_Options_Include_Blank" class="form-check-input" onchange="all_dropdown_onchange()"> Insert a blank item as the first option -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_ID" onchange="all_dropdown_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_Class" onchange="all_dropdown_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="dropdown_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="dropdown_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var dropdown_ID = document.getElementById("dropdown_ID").value;
                                    var dropdown_Options = document.getElementById("dropdown_Options").value;
                                    var dropdown_Text = document.getElementById("dropdown_Text").value;
                                    var dropdown_Class = document.getElementById("dropdown_Class").value;
                                    var dropdown_Label = document.getElementById("dropdown_Label").value;
                                    var dropdown_tag_temp = document.getElementById("dropdown_tag");

                                    dropdown_tag_temp.value = "[dropdown]";
                                    dropdown_basic = "dropdown";
                                    dropdown_multiple = "";
                                    dropdown_include_blank = "";


                                    function all_dropdown_onchange() {
                                        get_all_variable_value_for_dropdown();

                                        var dropdown_Label_val = '';
                                        var dropdown_Text_val = '';
                                        var dropdown_Options_val = '';
                                        var dropdown_include_blank_val = '';
                                        var dropdown_multiple_val = '';
                                        var dropdown_ID_val = '';
                                        var dropdown_Class_val = '';
                                        var lines = '';

                                        if (document.getElementById('dropdown_required').checked) {
                                            dropdown_basic = 'dropdown "required:' + 'required"';
                                        } else {
                                            dropdown_basic = "dropdown";
                                        }
                                        // if (document.getElementById('dropdown_Options_Multiple').checked) {
                                        //     dropdown_multiple_val = ' "multiple:multiple"';
                                        // } else {
                                        //     dropdown_multiple_val = "";
                                        // }
                                        // if (document.getElementById('dropdown_Options_Include_Blank').checked) {
                                        //     dropdown_include_blank_val = ' "include_blank:include_blank"';
                                        // } else {
                                        //     dropdown_include_blank_val = "";
                                        // }

                                        if (dropdown_Label != "") {
                                            dropdown_Label_val = ' "label:' + dropdown_Label + '"';
                                        }
                                        if (dropdown_Text != "") {
                                            dropdown_Text_val = ' "name:' + dropdown_Text + '"';
                                        }
                                        if (dropdown_Options != "") {
                                            dropdown_Options = dropdown_Options.trim();
                                            lines = dropdown_Options.split(/\n/);
                                            dropdown_Options_val = ' "options:' + lines + '"';
                                        }
                                        if (dropdown_ID != "") {
                                            dropdown_ID_val = ' "id:' + dropdown_ID + '"';
                                        }
                                        if (dropdown_Class != "") {
                                            dropdown_Class_val = ' "class:' + dropdown_Class + '"';
                                        }

                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label_val + dropdown_Text_val + dropdown_multiple_val + dropdown_include_blank_val +
                                            dropdown_Options_val + dropdown_ID_val + dropdown_Class_val;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_dropdown() {
                                        dropdown_ID = document.getElementById("dropdown_ID").value;
                                        dropdown_Options = document.getElementById("dropdown_Options").value;
                                        dropdown_Text = document.getElementById("dropdown_Text").value;
                                        dropdown_Class = document.getElementById("dropdown_Class").value;
                                        dropdown_Label = document.getElementById("dropdown_Label").value;
                                        dropdown_tag_temp = document.getElementById("dropdown_tag");
                                    }



                                    function submitFormDropdown(event) {
                                        event.preventDefault();
                                        var dropdown_Text = document.getElementById("dropdown_Text").value;
                                        if (dropdown_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var dropdown_tag = document.getElementById("dropdown_tag").value;

                                            new_input_dropdown = dropdown_tag;
                                            $("#new_textarea").insertAtCaret(new_input_dropdown);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var dropdown_ID = document.getElementById("dropdown_ID").value;
                                            var dropdown_Options = document.getElementById("dropdown_Options").value;
                                            var dropdown_Text = document.getElementById("dropdown_Text").value;
                                            var dropdown_Class = document.getElementById("dropdown_Class").value;
                                            var dropdown_Label = document.getElementById("dropdown_Label").value;

                                            var dropdown_Options = dropdown_Options.trim();
                                            dropdown_Options = dropdown_Options.split(/\n/);

                                            var html_dropdown_input = '<div class="' + dropdown_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            html_dropdown_input = l1 + dropdown_Label + l2;
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l4);

                                            html_dropdown_input = 'name="' + dropdown_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);

                                            if (dropdown_Class != '') {
                                                html_dropdown_input = 'class="' + dropdown_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            }
                                            if (dropdown_ID != '') {
                                                html_dropdown_input = 'id="' + dropdown_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            }

                                            if (document.getElementById('dropdown_required').checked) {
                                                html_dropdown_input = "required>";
                                            } else {
                                                html_dropdown_input = ">";
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            $("#textarea_html_code").insertAtCaret("\n");

                                            var str_array = dropdown_Options;
                                            // var str_array = dropdown_Options.split(',');

                                            for (var i = 0; i < str_array.length; i++) {
                                                // Trim the excess whitespace.
                                                str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                                                // Add additional code here, such as:
                                                // alert(str_array[i]);

                                                var option = str_array[i];


                                                $("#textarea_html_code").insertAtCaret(l6);
                                                var html_dropdown_input = 'value="' + option + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                                var html_dropdown_input = '>' + option + l7;
                                                $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                                $("#textarea_html_code").insertAtCaret("\n");
                                            }

                                            $("#textarea_html_code").insertAtCaret(l5);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formDropdown").reset();

                                            var dropdown_tag_temp = document.getElementById("dropdown_tag");
                                            dropdown_tag_temp.value = "[dropdown]";

                                            $("#dropdown_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal radio-->
            <div class="modal fade" id="radio_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form-tag Generator: radio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="formRadio" onsubmit="submitFormRadio(event)">
                                <section>
                                    <div>
                                        <input type="checkbox" id="radio_required" class="form-check-input" onchange="all_radio_onchange()" hidden>
                                        <input type="text" class="form-control col-sm-12" id="radio_Label" onchange="all_radio_onchange()" hidden>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="radio_Text" onchange="all_radio_onchange()" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Options </label>
                                        </div>
                                        <div class="col">
                                            <textarea id="radio_Options" cols="30" rows="5" onchange="all_radio_onchange()"></textarea> One option per line
                                            <!-- <br>
                                            <input type="checkbox" id="radio_Label_First" class="form-check-input" onchange="all_radio_onchange()"> Put a label first, a checkbox last
                                            <br>
                                            <input type="checkbox" id="radio_Use_Label_Element" class="form-check-input" onchange="all_radio_onchange()"> Wrap each item with label element -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="radio_ID" onchange="all_radio_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="radio_Class" onchange="all_radio_onchange()">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="radio_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="radio_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </section>


                                <script type="text/javascript">
                                    var radio_ID = document.getElementById("radio_ID").value;
                                    var radio_Options = document.getElementById("radio_Options").value;
                                    var radio_Text = document.getElementById("radio_Text").value;
                                    var radio_Class = document.getElementById("radio_Class").value;
                                    var radio_Label = document.getElementById("radio_Label").value;
                                    var radio_tag_temp = document.getElementById("radio_tag");

                                    radio_tag_temp.value = "[radio]";
                                    radio_basic = "radio";
                                    radio_label_first = "";
                                    radio_use_label_element = "";


                                    function all_radio_onchange() {
                                        get_all_variable_value_for_radio();

                                        var radio_Label_val = '';
                                        var radio_Text_val = '';
                                        var radio_Options_val = '';
                                        var radio_label_first_val = '';
                                        var radio_use_label_element_val = '';
                                        var radio_ID_val = '';
                                        var radio_Class_val = '';
                                        var lines = '';

                                        if (document.getElementById('radio_required').checked) {
                                            radio_basic = 'radio "required:' + 'required"';
                                        } else {
                                            radio_basic = "radio";
                                        }
                                        // if (document.getElementById('radio_Label_First').checked) {
                                        //     radio_label_first_val = ' "label_first:label_first"';
                                        // } else {
                                        //     radio_label_first_val = "";
                                        // }
                                        // if (document.getElementById('radio_Use_Label_Element').checked) {
                                        //     radio_use_label_element_val = ' "use_label_element:use_label_element"';
                                        // } else {
                                        //     radio_use_label_element_val = "";
                                        // }

                                        if (radio_Label != "") {
                                            radio_Label_val = ' "label:' + radio_Label + '"';
                                        }
                                        if (radio_Text != "") {
                                            radio_Text_val = ' "name:' + radio_Text + '"';
                                        }
                                        if (radio_Options != "") {
                                            radio_Options = radio_Options.trim();
                                            lines = radio_Options.split(/\n/);
                                            radio_Options_val = ' "options:' + lines + '"';
                                        }
                                        if (radio_ID != "") {
                                            radio_ID_val = ' "id:' + radio_ID + '"';
                                        }
                                        if (radio_Class != "") {
                                            radio_Class_val = ' "class:' + radio_Class + '"';
                                        }

                                        radio_tag_temp.value = radio_basic + radio_Label_val + radio_Text_val + radio_label_first_val + radio_use_label_element_val +
                                            radio_Options_val + radio_ID_val + radio_Class_val;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }


                                    function get_all_variable_value_for_radio() {
                                        radio_ID = document.getElementById("radio_ID").value;
                                        radio_Options = document.getElementById("radio_Options").value;
                                        radio_Text = document.getElementById("radio_Text").value;
                                        radio_Class = document.getElementById("radio_Class").value;
                                        radio_Label = document.getElementById("radio_Label").value;
                                        radio_tag_temp = document.getElementById("radio_tag");
                                    }


                                    function submitFormRadio(event) {
                                        event.preventDefault();
                                        var radio_Text = document.getElementById("radio_Text").value;
                                        if (radio_Text == "") {
                                            alert("Name must be filled out");
                                            return false;
                                        } else {
                                            var radio_tag = document.getElementById("radio_tag").value;

                                            new_input_radio = radio_tag;
                                            $("#new_textarea").insertAtCaret(new_input_radio);
                                            $("#new_textarea").insertAtCaret("\n\n");


                                            var radio_ID = document.getElementById("radio_ID").value;
                                            var radio_Options = document.getElementById("radio_Options").value;
                                            var radio_Text = document.getElementById("radio_Text").value;
                                            var radio_Class = document.getElementById("radio_Class").value;
                                            var radio_Label = document.getElementById("radio_Label").value;

                                            var radio_Options = radio_Options.trim();
                                            radio_Options = radio_Options.split(/\n/);

                                            var str_array = radio_Options;

                                            var html_radio_input = '<div class="' + radio_Text + '">\n';
                                            $("#textarea_html_code").insertAtCaret(html_radio_input);

                                            for (var i = 0; i < str_array.length; i++) {
                                                // Trim the excess whitespace.
                                                str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                                                // Add additional code here, such as:
                                                // alert(str_array[i]);

                                                var option = str_array[i];

                                                $("#textarea_html_code").insertAtCaret(l3);
                                                html_radio_input = 'type="radio" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                html_radio_input = 'name="' + radio_Text + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                if (radio_Class != '') {
                                                    html_radio_input = 'class="' + radio_Class + '" ';
                                                    $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                }
                                                if (radio_ID != '') {
                                                    html_radio_input = 'id="' + radio_ID + '" ';
                                                    $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                }
                                                html_radio_input = 'value="' + option + '">';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);

                                                $("#textarea_html_code").insertAtCaret("\n");

                                                $("#textarea_html_code").insertAtCaret(l0);
                                                var html_radio_input = 'for="' + option + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                var html_radio_input = '>' + option + l2;
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                $("#textarea_html_code").insertAtCaret("\n");
                                            }

                                            $("#textarea_html_code").insertAtCaret("</div>\n\n");


                                            document.getElementById("formRadio").reset();

                                            var radio_tag_temp = document.getElementById("radio_tag");
                                            radio_tag_temp.value = "[radio]";

                                            $("#radio_modal").modal('hide');
                                            return false;
                                        }
                                    }
                                </script>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </section>


        <?php

        $value_textarea_template = "";
        $value_textarea_html_code = "";
        $space_single = "\n";
        $space_double = "\n\n";

        $value_textarea_template = '[text "required:required" "label:Your Name" "name:user_name"]' .
            $space_double . '[email "required:required" "label:Your Email Address" "name:user_email"]' .
            $space_double . '[submit "label:Submit" name="user_submit"]' . $space_double;

        $value_textarea_html_code = '<div class="user_name">' . $space_single . '<label>Your Name</label>' . $space_single . '<input type="text" name="user_name" required>' . $space_single . '</div>' .
            $space_double . '<div class="user_email">' . $space_single . '<label>Your Email Address</label>' . $space_single . '<input type="email" name="user_email" required>' . $space_single . '</div>' .
            $space_double . '<div class="user_submit">' . $space_single . '<input type="submit" value="Submit" name="user_submit">' . $space_single . '</div>' . $space_double;

        $value_textarea_template = trim($value_textarea_template);
        $value_textarea_html_code = trim($value_textarea_html_code);

        // echo $value_textarea_template;
        // echo $value_textarea_html_code;
        ?>


        <div>
            <h2 class="text-center text-uppercase fw-bold">Contact Form
        </div>
        <br>

        <form action="regular_expression" method="POST">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="row">
                        <div class="col-lg-3 m-0">
                            <label class="form-label pt-1">Select the Client </label>
                        </div>
                        <div class="col-lg-3 m-0">
                            <select class="form-control" name="client_id" title="Please select the Client" required>
                                <option value="" selected disabled hidden>Select Client</option>
                                <?php
                                foreach ($client as $row) {
                                    echo '<option value="' . $row->client_id  . '">' . $row->client_name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="form-label pt-1">Form Name</label>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="form_title" class="form-control" placeholder="Enter Form Name" required>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <!-- <label for="textarea_tags" class="col-auto form-label">Form Template</label> -->
                <br>
                <div>
                    <button type="button" id="btn_password" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#password_modal">password</button>
                    <button type="button" id="btn_text" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#text_modal">text</button>
                    <button type="button" id="btn_email" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#email_modal">email</button>
                    <button type="button" id="btn_url" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#URL_modal">URL</button>
                    <button type="button" id="btn_tel" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#tel_modal">tel</button>
                    <button type="button" id="btn_number" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#number_modal">number</button>
                    <button type="button" id="btn_date" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#date_modal">date</button>
                    <button type="button" id="btn_textarea" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#textarea_modal">textarea</button>
                    <button type="button" id="btn_dropdown" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#dropdown_modal">drop-down menu</button>
                    <button type="button" id="btn_radio" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#radio_modal">radio buttons</button>
                    <button type="button" id="btn_submit" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#submit_modal">submit</button>
                </div>

                <br>

                <div class="form-group">
                    <label class="fw-bold">Form Template</label>
                    <textarea name="textarea_tags" id="new_textarea" class="form-control" style="min-height:320px;" required><?php echo $value_textarea_template; ?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label class="fw-bold">HTML Code</label>
                    <textarea name="textarea_html_tags" id="textarea_html_code" class="form-control" style="min-height:320px;" required><?php echo $value_textarea_html_code; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="form-label pt-1">Thank you Message</label>
                </div>
                <div class="col-lg-6">
                    <input type="text" name="form_thank_you_message" class="form-control" placeholder="Enter Thank you Message" value="Thank you for submitting the form" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="form-label pt-1">Error Message</label>
                </div>
                <div class="col-lg-6">
                    <input type="text" name="form_error_message" class="form-control" placeholder="Enter Error Message" value="Something went wrong. Try Later" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="form-label pt-1">Redirect Path</label>
                </div>
                <div class="col-lg-6">
                    <input type="url" name="form_redirect_path" class="form-control" placeholder="Enter Redirect Path">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="form-label pt-1">Lead Page</label>
                </div>
                <div class="col-lg-6">
                    <input type="url" name="form_lead_page" class="form-control" placeholder="Enter Lead Page">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="form-label pt-1">Landing Page</label>
                </div>
                <div class="col-lg-6">
                    <input type="url" name="form_landing_page" class="form-control" placeholder="Enter Landing Page">
                </div>
            </div>
            <br>
            <div class="text-center">
                <a href="home" class="btn btn-orange m-4 btn1">Back</a>
                <button type="submit" name="save_data" class="btn btn-purple m-4 btn1">Save</button>
            </div>
        </form>

    </div>

    <br>


    <script>
        // var textarea_html_code = document.getElementById("textarea_html_code");
        var new_textarea = $("#new_textarea");
        var textarea_html_code = $("#textarea_html_code");
        var l0 = "<label ";
        var l1 = "<label>";
        var l2 = "</label>";
        var l3 = "<input ";
        var l4 = "<select ";
        var l5 = "</select>\n</div>";
        var l6 = "<option ";
        var l7 = "</option>";
        var l8 = "<textarea ";
        var l9 = "</textarea>\n</div>";
        var l10 = "required>\n</div>";
        var l11 = ">\n</div>";
    </script>

    <script>
        jQuery.fn.extend({
            insertAtCaret: function(myValue) {
                return this.each(function(i) {
                    if (document.selection) {
                        //For browsers like Internet Explorer
                        this.focus();
                        sel = document.selection.createRange();
                        sel.text = myValue;
                        this.focus();
                    } else if (this.selectionStart || this.selectionStart == '0') {
                        //For browsers like Firefox and Webkit based
                        var startPos = this.selectionStart;
                        var endPos = this.selectionEnd;
                        var scrollTop = this.scrollTop;
                        this.value = this.value.substring(0, startPos) + myValue + this.value.substring(endPos, this.value.length);
                        this.focus();
                        this.selectionStart = startPos + myValue.length;
                        this.selectionEnd = startPos + myValue.length;
                        this.scrollTop = scrollTop;
                    } else {
                        this.value += myValue;
                        this.focus();
                    }
                })
            }
        });
    </script>

    <script src="<?php echo base_url('js/bootstrap.js'); ?>"></script>

</body>

</html>