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

</head>

<body>
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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="password_required" class="form-check-input" onchange="password_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_Label" onchange="password_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_Text" onchange="password_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_DefaultValue" onchange="password_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_ID" onchange="password_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="password_Class" onchange="password_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="password_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="password_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var password_ID = document.getElementById("password_ID").value;
                                    var password_DefaultValue = document.getElementById("password_DefaultValue").value;
                                    var password_Text = document.getElementById("password_Text").value;
                                    var password_Class = document.getElementById("password_Class").value;
                                    var password_Label = document.getElementById("password_Label").value;

                                    var password_tag_temp = document.getElementById("password_tag");

                                    password_tag_temp.value = "[password]";
                                    password_basic = "password";

                                    function password_checkbox() {
                                        if (document.getElementById('password_required').checked) {
                                            password_basic = 'password "required:' + 'required"';
                                        } else {
                                            password_basic = "password";
                                        }
                                        password_tag_temp.value = password_basic + password_Text + password_DefaultValue +
                                            password_ID + password_Class;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
                                    }

                                    function password_name(input1) {
                                        password_Text = ' "name:' + input1.value + '"';
                                        password_tag_temp.value = password_basic + password_Label + password_Text + password_DefaultValue +
                                            password_ID + password_Class;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
                                    }

                                    function password_default_value(input2) {
                                        password_DefaultValue = ' "default_value:' + input2.value + '"';
                                        password_tag_temp.value = password_basic + password_Label + password_Text + password_DefaultValue +
                                            password_ID + password_Class;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
                                    }

                                    function password_class(input3) {
                                        password_Class = ' "class:' + input3.value + '"';
                                        password_tag_temp.value = password_basic + password_Label + password_Text + password_DefaultValue +
                                            password_ID + password_Class;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
                                    }

                                    function password_id(input4) {
                                        password_ID = ' "id:' + input4.value + '"';
                                        password_tag_temp.value = password_basic + password_Label + password_Text + password_DefaultValue +
                                            password_ID + password_Class;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
                                    }

                                    function password_label(input5) {
                                        password_Label = ' "label:' + input5.value + '"';
                                        password_tag_temp.value = password_basic + password_Label + password_Text + password_DefaultValue +
                                            password_ID + password_Class;
                                        password_tag_temp.value = "[" + password_tag_temp.value + "]";
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
                                            var html_password_input = l1 + password_Label + l2;
                                            // alert(html_password_input);
                                            var textarea_html_code = $("#textarea_html_code");
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            var html_password_input = 'type="password" ';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            var html_password_input = 'name="' + password_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            var html_password_input = 'value="' + password_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            var html_password_input = 'class="' + password_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            var html_password_input = 'id="' + password_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_password_input);

                                            if (document.getElementById('password_required').checked) {
                                                html_password_input = 'required>';
                                            } else {
                                                html_password_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_password_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            // $("#new_textarea").insertAtCaret(password_tag);

                                            $("#new_textarea").insertAtCaret("\n\n");

                                            document.getElementById("formPassword").reset();

                                            password_basic = "password";
                                            password_Text = "";
                                            password_DefaultValue = "";
                                            password_ID = "";
                                            password_Class = "";
                                            password_Label = "";

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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="text_required" class="form-check-input" onchange="text_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_Label" onchange="text_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_Text" onchange="text_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_DefaultValue" onchange="text_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_ID" onchange="text_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="text_Class" onchange="text_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="text_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="text_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var text_ID = document.getElementById("text_ID").value;
                                    var text_DefaultValue = document.getElementById("text_DefaultValue").value;
                                    var text_Text = document.getElementById("text_Text").value;
                                    var text_Class = document.getElementById("text_Class").value;
                                    var text_Label = document.getElementById("text_Label").value;

                                    var text_tag_temp = document.getElementById("text_tag");

                                    text_tag_temp.value = "[text]";
                                    text_basic = "text";

                                    function text_checkbox() {
                                        if (document.getElementById('text_required').checked) {
                                            text_basic = 'text "required:' + 'required"';
                                        } else {
                                            text_basic = "text";
                                        }
                                        text_tag_temp.value = text_basic + text_Label + text_Text + text_DefaultValue + text_ID + text_Class;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";
                                    }

                                    function text_name(input1) {
                                        text_Text = ' "name:' + input1.value + '"';
                                        text_tag_temp.value = text_basic + text_Label + text_Text + text_DefaultValue + text_ID + text_Class;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";
                                    }

                                    function text_default_value(input2) {
                                        text_DefaultValue = ' "default_value:' + input2.value + '"';
                                        text_tag_temp.value = text_basic + text_Label + text_Text + text_DefaultValue + text_ID + text_Class;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";
                                    }

                                    function text_class(input3) {
                                        text_Class = ' "class:' + input3.value + '"';
                                        text_tag_temp.value = text_basic + text_Label + text_Text + text_DefaultValue + text_ID + text_Class;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";
                                    }

                                    function text_id(input4) {
                                        text_ID = ' "id:' + input4.value + '"';
                                        text_tag_temp.value = text_basic + text_Label + text_Text + text_DefaultValue + text_ID + text_Class;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";
                                    }

                                    function text_label(input5) {
                                        text_Label = ' "label:' + input5.value + '"';
                                        text_tag_temp.value = text_basic + text_Label + text_Text + text_DefaultValue + text_ID + text_Class;
                                        text_tag_temp.value = "[" + text_tag_temp.value + "]";
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
                                            var html_text_input = l1 + text_Label + l2;
                                            // alert(html_password_input);
                                            var textarea_html_code = $("#textarea_html_code");
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);


                                            var html_text_input = 'type="text" ';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            var html_text_input = 'name="' + text_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            var html_text_input = 'value="' + text_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            var html_text_input = 'class="' + text_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            var html_text_input = 'id="' + text_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_text_input);

                                            if (document.getElementById('text_required').checked) {
                                                html_text_input = 'required>';
                                            } else {
                                                html_text_input = '>';
                                            }


                                            $("#textarea_html_code").insertAtCaret(html_text_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");


                                            document.getElementById("formText").reset();

                                            text_basic = "text";
                                            text_Text = "";
                                            text_DefaultValue = "";
                                            text_ID = "";
                                            text_Class = "";
                                            text_Label = "";

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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="email_required" class="form-check-input" onchange="email_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_Label" onchange="email_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_Text" onchange="email_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="email" class="form-control col-sm-12" id="email_DefaultValue" onchange="email_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_ID" onchange="email_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="email_Class" onchange="email_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="email_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="email_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var email_ID = document.getElementById("email_ID").value;
                                    var email_DefaultValue = document.getElementById("email_DefaultValue").value;
                                    var email_Text = document.getElementById("email_Text").value;
                                    var email_Class = document.getElementById("email_Class").value;
                                    var email_Label = document.getElementById("email_Label").value;

                                    var email_tag_temp = document.getElementById("email_tag");

                                    email_tag_temp.value = "[email]";
                                    email_basic = "email";

                                    function email_checkbox() {
                                        if (document.getElementById('email_required').checked) {
                                            email_basic = 'email "required:' + 'required"';
                                        } else {
                                            email_basic = "email";
                                        }
                                        email_tag_temp.value = email_basic + email_Label + email_Text + email_DefaultValue + email_ID +
                                            email_Class;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
                                    }

                                    function email_name(input1) {
                                        email_Text = ' "name:' + input1.value + '"';
                                        email_tag_temp.value = email_basic + email_Label + email_Text + email_DefaultValue + email_ID +
                                            email_Class;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
                                    }

                                    function email_default_value(input2) {
                                        email_DefaultValue = ' "default_value:' + input2.value + '"';
                                        email_tag_temp.value = email_basic + email_Label + email_Text + email_DefaultValue + email_ID +
                                            email_Class;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
                                    }

                                    function email_class(input3) {
                                        email_Class = ' "class:' + input3.value + '"';
                                        email_tag_temp.value = email_basic + email_Label + email_Text + email_DefaultValue + email_ID +
                                            email_Class;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
                                    }

                                    function email_id(input4) {
                                        email_ID = ' "id:' + input4.value + '"';
                                        email_tag_temp.value = email_basic + email_Label + email_Text + email_DefaultValue + email_ID +
                                            email_Class;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
                                    }

                                    function email_label(input5) {
                                        email_Label = ' "label:' + input5.value + '"';
                                        email_tag_temp.value = email_basic + email_Label + email_Text + email_DefaultValue + email_ID +
                                            email_Class;
                                        email_tag_temp.value = "[" + email_tag_temp.value + "]";
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
                                            var html_email_input = l1 + email_Label + l2;
                                            // alert(html_password_input);
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            var html_email_input = 'type="email" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            var html_email_input = 'name="' + email_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            var html_email_input = 'value="' + email_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            var html_email_input = 'class="' + email_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            var html_email_input = 'id="' + email_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_email_input);

                                            if (document.getElementById('email_required').checked) {
                                                html_email_input = 'required>';
                                            } else {
                                                html_email_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_email_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");




                                            // $('#email_required').prop("checked", false);
                                            // $('#email_Text').val("");
                                            // $('#email_DefaultValue').val("");
                                            // $('#email_ID').val("");
                                            // $('#email_Class').val("");
                                            // $('#email_Label').val("");
                                            // $('#email_tag').val("[email]");

                                            document.getElementById("formEmail").reset();

                                            email_basic = "email";
                                            email_Text.value = "";
                                            email_DefaultValue.value = "";
                                            email_ID.value = "";
                                            email_Class.value = "";
                                            email_Label = "";
                                            email_tag = "[email]";
                                            email_tag_temp.value = "";



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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="URL_required" class="form-check-input" onchange="URL_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_Label" onchange="URL_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_Text" onchange="URL_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="url" class="form-control col-sm-12" id="URL_DefaultValue" onchange="URL_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_ID" onchange="URL_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="URL_Class" onchange="URL_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="URL_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="URL_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var URL_ID = document.getElementById("URL_ID").value;
                                    var URL_DefaultValue = document.getElementById("URL_DefaultValue").value;
                                    var URL_Text = document.getElementById("URL_Text").value;
                                    var URL_Class = document.getElementById("URL_Class").value;
                                    var URL_Label = document.getElementById("URL_Label").value;

                                    var URL_tag_temp = document.getElementById("URL_tag");

                                    URL_tag_temp.value = "[url]";
                                    URL_basic = "url";

                                    function URL_checkbox() {
                                        if (document.getElementById('URL_required').checked) {
                                            URL_basic = 'url "required:' + 'required"';
                                        } else {
                                            URL_basic = "url";
                                        }
                                        URL_tag_temp.value = URL_basic + URL_Label + URL_Text + URL_DefaultValue + URL_ID +
                                            URL_Class;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
                                    }

                                    function URL_name(input1) {
                                        URL_Text = ' "name:' + input1.value + '"';
                                        URL_tag_temp.value = URL_basic + URL_Label + URL_Text + URL_DefaultValue + URL_ID +
                                            URL_Class;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
                                    }

                                    function URL_default_value(input2) {
                                        URL_DefaultValue = ' "default_value:' + input2.value + '"';
                                        URL_tag_temp.value = URL_basic + URL_Label + URL_Text + URL_DefaultValue + URL_ID +
                                            URL_Class;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
                                    }

                                    function URL_class(input3) {
                                        URL_Class = ' "class:' + input3.value + '"';
                                        URL_tag_temp.value = URL_basic + URL_Label + URL_Text + URL_DefaultValue + URL_ID +
                                            URL_Class;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
                                    }

                                    function URL_id(input4) {
                                        URL_ID = ' "id:' + input4.value + '"';
                                        URL_tag_temp.value = URL_basic + URL_Label + URL_Text + URL_DefaultValue + URL_ID +
                                            URL_Class;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
                                    }

                                    function URL_label(input5) {
                                        URL_Label = ' "label:' + input5.value + '"';
                                        URL_tag_temp.value = URL_basic + URL_Label + URL_Text + URL_DefaultValue + URL_ID +
                                            URL_Class;
                                        URL_tag_temp.value = "[" + URL_tag_temp.value + "]";
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
                                            var html_URL_input = l1 + URL_Label + l2;
                                            // alert(html_password_input);
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            var html_URL_input = 'type="url" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            var html_URL_input = 'name="' + URL_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            var html_URL_input = 'value="' + URL_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            var html_URL_input = 'class="' + URL_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            var html_URL_input = 'id="' + URL_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_URL_input);

                                            if (document.getElementById('URL_required').checked) {
                                                html_URL_input = 'required>';
                                            } else {
                                                html_URL_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_URL_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");




                                            document.getElementById("formURL").reset();

                                            URL_basic = "url";
                                            URL_Text = "";
                                            URL_DefaultValue = "";
                                            URL_ID = "";
                                            URL_Class = "";
                                            URL_Label = "";

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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="tel_required" class="form-check-input" onchange="tel_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_Label" onchange="tel_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_Text" onchange="tel_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="tel" class="form-control col-sm-12" id="tel_DefaultValue" onchange="tel_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_ID" onchange="tel_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="tel_Class" onchange="tel_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="tel_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="tel_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var tel_ID = document.getElementById("tel_ID").value;
                                    var tel_DefaultValue = document.getElementById("tel_DefaultValue").value;
                                    var tel_Text = document.getElementById("tel_Text").value;
                                    var tel_Class = document.getElementById("tel_Class").value;
                                    var tel_Label = document.getElementById("tel_Label").value;

                                    var tel_tag_temp = document.getElementById("tel_tag");

                                    tel_tag_temp.value = "[tel]";
                                    tel_basic = "tel";

                                    function tel_checkbox() {
                                        if (document.getElementById('tel_required').checked) {
                                            tel_basic = 'tel "required:' + 'required"';
                                        } else {
                                            tel_basic = "tel";
                                        }
                                        tel_tag_temp.value = tel_basic + tel_Label + tel_Text + tel_DefaultValue + tel_ID +
                                            tel_Class;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
                                    }

                                    function tel_name(input1) {
                                        tel_Text = ' "name:' + input1.value + '"';
                                        tel_tag_temp.value = tel_basic + tel_Label + tel_Text + tel_DefaultValue + tel_ID +
                                            tel_Class;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
                                    }

                                    function tel_default_value(input2) {
                                        tel_DefaultValue = ' "default_value:' + input2.value + '"';
                                        tel_tag_temp.value = tel_basic + tel_Label + tel_Text + tel_DefaultValue + tel_ID +
                                            tel_Class;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
                                    }

                                    function tel_class(input3) {
                                        tel_Class = ' "class:' + input3.value + '"';
                                        tel_tag_temp.value = tel_basic + tel_Label + tel_Text + tel_DefaultValue + tel_ID +
                                            tel_Class;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
                                    }

                                    function tel_id(input4) {
                                        tel_ID = ' "id:' + input4.value + '"';
                                        tel_tag_temp.value = tel_basic + tel_Label + tel_Text + tel_DefaultValue + tel_ID +
                                            tel_Class;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
                                    }

                                    function tel_label(input5) {
                                        tel_Label = ' "label:' + input5.value + '"';
                                        tel_tag_temp.value = tel_basic + tel_Label + tel_Text + tel_DefaultValue + tel_ID +
                                            tel_Class;
                                        tel_tag_temp.value = "[" + tel_tag_temp.value + "]";
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
                                            var html_tel_input = l1 + tel_Label + l2;
                                            // alert(html_password_input);
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            var html_tel_input = 'type="tel" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            var html_tel_input = 'name="' + tel_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            var html_tel_input = 'value="' + tel_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            var html_tel_input = 'class="' + tel_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            var html_tel_input = 'id="' + tel_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_tel_input);

                                            if (document.getElementById('tel_required').checked) {
                                                html_tel_input = 'required>';
                                            } else {
                                                html_tel_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_tel_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");




                                            document.getElementById("formTel").reset();

                                            tel_basic = "tel";
                                            tel_Text = "";
                                            tel_DefaultValue = "";
                                            tel_ID = "";
                                            tel_Class = "";
                                            tel_Label = "";

                                            $("#tel_modal").modal('hide');
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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="textarea_required" class="form-check-input" onchange="textarea_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_Label" onchange="textarea_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_Text" onchange="textarea_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_DefaultValue" onchange="textarea_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_ID" onchange="textarea_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="textarea_Class" onchange="textarea_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="textarea_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="textarea_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var textarea_ID = document.getElementById("textarea_ID").value;
                                    var textarea_DefaultValue = document.getElementById("textarea_DefaultValue").value;
                                    var textarea_Text = document.getElementById("textarea_Text").value;
                                    var textarea_Class = document.getElementById("textarea_Class").value;
                                    var textarea_Label = document.getElementById("textarea_Label").value;

                                    var textarea_tag_temp = document.getElementById("textarea_tag");

                                    textarea_tag_temp.value = "[textarea]";
                                    textarea_basic = "textarea";

                                    function textarea_checkbox() {
                                        if (document.getElementById('textarea_required').checked) {
                                            textarea_basic = 'textarea "required:' + 'required"';
                                        } else {
                                            textarea_basic = "textarea";
                                        }
                                        textarea_tag_temp.value = textarea_basic + textarea_Label + textarea_Text + textarea_DefaultValue +
                                            textarea_ID + textarea_Class;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
                                    }

                                    function textarea_name(input1) {
                                        textarea_Text = ' "name:' + input1.value + '"';
                                        textarea_tag_temp.value = textarea_basic + textarea_Label + textarea_Text + textarea_DefaultValue +
                                            textarea_ID + textarea_Class;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
                                    }

                                    function textarea_default_value(input2) {
                                        textarea_DefaultValue = ' "default_value:' + input2.value + '"';
                                        textarea_tag_temp.value = textarea_basic + textarea_Label + textarea_Text + textarea_DefaultValue +
                                            textarea_ID + textarea_Class;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
                                    }

                                    function textarea_class(input3) {
                                        textarea_Class = ' "class:' + input3.value + '"';
                                        textarea_tag_temp.value = textarea_basic + textarea_Label + textarea_Text + textarea_DefaultValue +
                                            textarea_ID + textarea_Class;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
                                    }

                                    function textarea_id(input4) {
                                        textarea_ID = ' "id:' + input4.value + '"';
                                        textarea_tag_temp.value = textarea_basic + textarea_Label + textarea_Text + textarea_DefaultValue +
                                            textarea_ID + textarea_Class;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
                                    }

                                    function textarea_label(input5) {
                                        textarea_Label = ' "label:' + input5.value + '"';
                                        textarea_tag_temp.value = textarea_basic + textarea_Label + textarea_Text + textarea_DefaultValue +
                                            textarea_ID + textarea_Class;
                                        textarea_tag_temp.value = "[" + textarea_tag_temp.value + "]";
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
                                            var html_textarea_input = l1 + textarea_Label + l2;
                                            // alert(html_password_input);
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l8);

                                            var html_textarea_input = 'name="' + textarea_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            var html_textarea_input = 'value="' + textarea_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            var html_textarea_input = 'class="' + textarea_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            var html_textarea_input = 'id="' + textarea_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);

                                            if (document.getElementById('textarea_required').checked) {
                                                html_textarea_input = 'required>';
                                            } else {
                                                html_textarea_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_textarea_input);
                                            $("#textarea_html_code").insertAtCaret(l9);
                                            $("#textarea_html_code").insertAtCaret("\n\n");




                                            document.getElementById("formTextarea").reset();

                                            textarea_basic = "textarea";
                                            textarea_Text = "";
                                            textarea_DefaultValue = "";
                                            textarea_ID = "";
                                            textarea_Class = "";
                                            textarea_Label = "";

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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="number_required" class="form-check-input" onchange="number_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_Label" onchange="number_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_Text" onchange="number_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control col-sm-12" id="number_DefaultValue" onchange="number_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Range </label>
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Min </label>
                                            <input type="number" class="form-control col-sm-12" id="number_MinValue" onchange="number_min_value(this)">
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Max </label>
                                            <input type="number" class="form-control col-sm-12" id="number_MaxValue" onchange="number_max_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_ID" onchange="number_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="number_Class" onchange="number_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="number_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="number_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


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

                                    function number_checkbox() {
                                        if (document.getElementById('number_required').checked) {
                                            number_basic = 'number "required:' + 'required"';
                                        } else {
                                            number_basic = "number";
                                        }
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_name(input1) {
                                        number_Text = ' "name:' + input1.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_default_value(input2) {
                                        number_DefaultValue = ' "default_value:' + input2.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_class(input3) {
                                        number_Class = ' "class:' + input3.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_id(input4) {
                                        number_ID = ' "id:' + input4.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_min_value(input5) {
                                        number_MinValue = ' "min:' + input5.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_max_value(input6) {
                                        number_MaxValue = ' "max:' + input6.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
                                    }

                                    function number_label(input7) {
                                        number_Label = ' "label:' + input7.value + '"';
                                        number_tag_temp.value = number_basic + number_Label + number_Text + number_DefaultValue +
                                            number_MinValue + number_MaxValue + number_ID + number_Class;
                                        number_tag_temp.value = "[" + number_tag_temp.value + "]";
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
                                            var html_number_input = l1 + number_Label + l2;
                                            // alert(html_password_input);
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            var html_number_input = 'type="number" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            var html_number_input = 'name="' + number_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            var html_number_input = 'value="' + number_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);

                                            var html_number_input = 'min="' + number_MinValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            var html_number_input = 'max="' + number_MaxValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            var html_number_input = 'class="' + number_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            var html_number_input = 'id="' + number_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            if (document.getElementById('number_required').checked) {
                                                html_number_input = 'required>';
                                            } else {
                                                html_number_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_number_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");



                                            document.getElementById("formNumber").reset();

                                            number_basic = "number";
                                            number_Text = "";
                                            number_DefaultValue = "";
                                            number_ID = "";
                                            number_Class = "";
                                            number_MaxValue = "";
                                            number_MinValue = "";
                                            number_Label = "";

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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="date_required" class="form-check-input" onchange="date_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_Label" onchange="date_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_Text" onchange="date_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Default Value </label>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control col-sm-12" id="date_DefaultValue" onchange="date_default_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>


                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Range </label>
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Min </label>
                                            <input type="date" class="form-control col-sm-12" id="date_MinValue" onchange="date_min_value(this)">
                                        </div>
                                        <div class="col input-group">
                                            <label class="input-group-text">Max </label>
                                            <input type="date" class="form-control col-sm-12" id="date_MaxValue" onchange="date_max_value(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>


                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_ID" onchange="date_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="date_Class" onchange="date_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="date_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="date_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


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

                                    function date_checkbox() {
                                        if (document.getElementById('date_required').checked) {
                                            date_basic = 'date "required:' + 'required"';
                                        } else {
                                            date_basic = "date";
                                        }
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_name(input1) {
                                        date_Text = ' "name:' + input1.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_default_value(input2) {
                                        date_DefaultValue = ' "default_value:' + input2.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_class(input3) {
                                        date_Class = ' "class:' + input3.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_id(input4) {
                                        date_ID = ' "id:' + input4.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_min_value(input5) {
                                        date_MinValue = ' "min:' + input5.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_max_value(input6) {
                                        date_MaxValue = ' "max:' + input6.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
                                    }

                                    function date_label(input7) {
                                        date_Label = ' "label:' + input7.value + '"';
                                        date_tag_temp.value = date_basic + date_Label + date_Text + date_DefaultValue +
                                            date_MinValue + date_MaxValue + date_ID + date_Class;
                                        date_tag_temp.value = "[" + date_tag_temp.value + "]";
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
                                            var html_date_input = l1 + date_Label + l2;
                                            // alert(html_password_input);
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l3);

                                            var html_date_input = 'type="date" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            var html_date_input = 'name="' + date_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            var html_date_input = 'value="' + date_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            var html_date_input = 'min="' + date_MinValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            var html_date_input = 'max="' + date_MaxValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            var html_date_input = 'class="' + date_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            var html_date_input = 'id="' + date_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            if (document.getElementById('date_required').checked) {
                                                html_date_input = 'required>';
                                            } else {
                                                html_date_input = '>';
                                            }

                                            $("#textarea_html_code").insertAtCaret(html_date_input);
                                            $("#textarea_html_code").insertAtCaret("\n\n");



                                            document.getElementById("formDate").reset();

                                            date_basic = "date";
                                            date_Text = "";
                                            date_DefaultValue = "";
                                            date_ID = "";
                                            date_Class = "";
                                            date_MaxValue = "";
                                            date_MinValue = "";
                                            date_Label = "";

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

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_Label" onchange="submit_label(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_ID" onchange="submit_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="submit_Class" onchange="submit_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="submit_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="submit_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


                                <script type="text/javascript">
                                    var submit_ID = document.getElementById("submit_ID").value;
                                    var submit_Label = document.getElementById("submit_Label").value;
                                    var submit_Class = document.getElementById("submit_Class").value;

                                    var submit_tag_temp = document.getElementById("submit_tag");

                                    submit_tag_temp.value = "[submit]";
                                    submit_basic = "submit";

                                    function submit_label(input1) {
                                        submit_Label = ' "label:' + input1.value + '"';
                                        submit_tag_temp.value = submit_basic + submit_Label + submit_ID + submit_Class;
                                        submit_tag_temp.value = "[" + submit_tag_temp.value + "]";
                                    }

                                    function submit_class(input2) {
                                        submit_Class = ' "class:' + input2.value + '"';
                                        submit_tag_temp.value = submit_basic + submit_Label + submit_ID + submit_Class;
                                        submit_tag_temp.value = "[" + submit_tag_temp.value + "]";
                                    }

                                    function submit_id(input3) {
                                        submit_ID = ' "id:' + input3.value + '"';
                                        submit_tag_temp.value = submit_basic + submit_Label + submit_ID + submit_Class;
                                        submit_tag_temp.value = "[" + submit_tag_temp.value + "]";
                                    }


                                    function submitFormSubmit(event) {
                                        event.preventDefault();

                                        var submit_tag = document.getElementById("submit_tag").value;

                                        new_input_Submit = submit_tag;
                                        $("#new_textarea").insertAtCaret(new_input_Submit);
                                        $("#new_textarea").insertAtCaret("\n\n");


                                        var submit_ID = document.getElementById("submit_ID").value;
                                        var submit_Label = document.getElementById("submit_Label").value;
                                        var submit_Class = document.getElementById("submit_Class").value;
                                        // var html_submit_input = l1 + submit_Label + l2;
                                        // alert(html_password_input);
                                        // $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        // $("#textarea_html_code").insertAtCaret("\n");
                                        $("#textarea_html_code").insertAtCaret(l3);


                                        var html_submit_input = 'type="submit" ';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        var html_submit_input = 'value="' + submit_Label + '" ';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        var html_submit_input = 'class="' + submit_Class + '" ';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        var html_submit_input = 'id="' + submit_ID + '">';
                                        $("#textarea_html_code").insertAtCaret(html_submit_input);
                                        $("#textarea_html_code").insertAtCaret("\n\n");



                                        document.getElementById("formSubmit").reset();

                                        submit_basic = "submit";
                                        submit_Label = "";
                                        submit_ID = "";
                                        submit_Class = "";

                                        $("#submit_modal").modal('hide');
                                        // alert(new_input_text);
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
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div>Field Type </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="dropdown_required" class="form-check-input" onchange="dropdown_checkbox()">
                                        </div>
                                        <div class="col">
                                            <label class="form-check-label">
                                                Required field
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Label </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_Label" onchange="dropdown_label(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_Text" onchange="dropdown_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Options </label>
                                        </div>
                                        <div class="col">
                                            <textarea id="dropdown_Options" cols="30" rows="5" onchange="dropdown_options(this)"></textarea> One option per line
                                            <br>
                                            <input type="checkbox" id="dropdown_Options_Multiple" class="form-check-input" onchange="dropdown_options_multiple()"> Allow Multiple Selections
                                            <br>
                                            <input type="checkbox" id="dropdown_Options_Include_Blank" class="form-check-input" onchange="dropdown_options_include_blank()"> Insert a blank item as the first option
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_ID" onchange="dropdown_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="dropdown_Class" onchange="dropdown_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="dropdown_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="dropdown_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


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

                                    function dropdown_checkbox() {
                                        if (document.getElementById('dropdown_required').checked) {
                                            dropdown_basic = 'dropdown "required:' + 'required"';
                                        } else {
                                            dropdown_basic = "dropdown";
                                        }
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }


                                    function dropdown_options_multiple() {
                                        if (document.getElementById('dropdown_Options_Multiple').checked) {
                                            dropdown_multiple = ' "multiple:multiple"';
                                        } else {
                                            dropdown_multiple = "";
                                        }
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }

                                    function dropdown_options_include_blank() {
                                        if (document.getElementById('dropdown_Options_Include_Blank').checked) {
                                            dropdown_include_blank = ' "include_blank:include_blank"';
                                        } else {
                                            dropdown_include_blank = "";
                                        }
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }

                                    function dropdown_name(input1) {
                                        dropdown_Text = ' "name:' + input1.value + '"';
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }

                                    function dropdown_options(input2) {
                                        var lines = input2.value.split(/\n/);
                                        dropdown_Options = ' "options:' + lines + '"';
                                        // dropdown_Options = dropdown_Options.replace(/,/g, '""');

                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }

                                    function dropdown_class(input3) {
                                        dropdown_Class = ' "class:' + input3.value + '"';
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }

                                    function dropdown_id(input4) {
                                        dropdown_ID = ' "id:' + input4.value + '"';
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
                                    }


                                    function dropdown_label(input5) {
                                        dropdown_Label = ' "label:' + input5.value + '"';
                                        dropdown_tag_temp.value = dropdown_basic + dropdown_Label + dropdown_Text + dropdown_multiple + dropdown_include_blank + dropdown_Options + dropdown_ID +
                                            dropdown_Class;
                                        dropdown_tag_temp.value = "[" + dropdown_tag_temp.value + "]";
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

                                            var dropdown_Options = dropdown_Options.split(/\n/);

                                            var html_dropdown_input = l1 + dropdown_Label + l2;
                                            // alert(html_dropdown_input);
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            $("#textarea_html_code").insertAtCaret("\n");
                                            $("#textarea_html_code").insertAtCaret(l4);

                                            var html_dropdown_input = 'name="' + dropdown_Text + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            var html_dropdown_input = 'value="' + tel_DefaultValue + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            var html_dropdown_input = 'class="' + dropdown_Class + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);
                                            var html_dropdown_input = 'id="' + dropdown_ID + '" ';
                                            $("#textarea_html_code").insertAtCaret(html_dropdown_input);

                                            if (document.getElementById('dropdown_required').checked) {
                                                html_dropdown_input = 'required>';
                                            } else {
                                                html_dropdown_input = '>';
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

                                            dropdown_basic = "dropdown";
                                            dropdown_Text = "";
                                            dropdown_Options = "";
                                            dropdown_ID = "";
                                            dropdown_Class = "";
                                            dropdown_multiple = "";
                                            dropdown_include_blank = "";
                                            dropdown_Label = "";

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

                                <input type="checkbox" id="radio_required" class="form-check-input" onchange="radio_checkbox()" hidden>
                                <input type="text" class="form-control col-sm-12" id="radio_Label" onchange="radio_label(this)" hidden>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Enter Name </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="radio_Text" onchange="radio_name(this)" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Options </label>
                                        </div>
                                        <div class="col">
                                            <textarea id="radio_Options" cols="30" rows="5" onchange="radio_options(this)"></textarea> One option per line
                                            <br>
                                            <input type="checkbox" id="radio_Label_First" class="form-check-input" onchange="radio_label_first_()"> Put a label first, a checkbox last
                                            <br>
                                            <input type="checkbox" id="radio_Use_Label_Element" class="form-check-input" onchange="radio_use_label_element_()"> Wrap each item with label element
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>ID Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="radio_ID" onchange="radio_id(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Class Attribute </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control col-sm-12" id="radio_Class" onchange="radio_class(this)">
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Tag </label>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="radio_tag" class="form-control col-sm-12" disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-orange btn-md btn1" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Insert" id="radio_form" class="btn btn-purple btn-md btn1">
                                    </div>
                                    <br>
                                </div>


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

                                    function radio_checkbox() {
                                        if (document.getElementById('radio_required').checked) {
                                            radio_basic = 'radio "required:' + 'required"';
                                        } else {
                                            radio_basic = "radio";
                                        }
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }


                                    function radio_label_first_() {
                                        if (document.getElementById('radio_Label_First').checked) {
                                            radio_label_first = ' "label_first:label_first"';
                                        } else {
                                            radio_label_first = "";
                                        }
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }

                                    function radio_use_label_element_() {
                                        if (document.getElementById('radio_Use_Label_Element').checked) {
                                            radio_use_label_element = ' "use_label_element:use_label_element"';
                                        } else {
                                            radio_use_label_element = "";
                                        }
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }

                                    function radio_name(input1) {
                                        radio_Text = ' "name:' + input1.value + '"';
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }

                                    function radio_options(input2) {
                                        var lines = input2.value.split(/\n/);
                                        radio_Options = ' "options:' + lines + '"';
                                        // radio_Options = radio_Options.replace(/,/g, '""');

                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }

                                    function radio_class(input3) {
                                        radio_Class = ' "class:' + input3.value + '"';
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }

                                    function radio_id(input4) {
                                        radio_ID = ' "id:' + input4.value + '"';
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
                                    }

                                    function radio_label(input5) {
                                        radio_Label = ' "label:' + input5.value + '"';
                                        radio_tag_temp.value = radio_basic + radio_Label + radio_Text + radio_label_first + radio_use_label_element + radio_Options + radio_ID +
                                            radio_Class;
                                        radio_tag_temp.value = "[" + radio_tag_temp.value + "]";
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

                                            var radio_Options = radio_Options.split(/\n/);

                                            var str_array = radio_Options;

                                            for (var i = 0; i < str_array.length; i++) {
                                                // Trim the excess whitespace.
                                                str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                                                // Add additional code here, such as:
                                                // alert(str_array[i]);

                                                var option = str_array[i];

                                                $("#textarea_html_code").insertAtCaret(l3);
                                                var html_radio_input = 'type="radio" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                var html_radio_input = 'name="' + radio_Text + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                var html_radio_input = 'class="' + radio_Class + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                var html_radio_input = 'id="' + radio_ID + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                var html_radio_input = 'value="' + option + '">';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);

                                                $("#textarea_html_code").insertAtCaret("\n");

                                                $("#textarea_html_code").insertAtCaret(l0);
                                                var html_radio_input = 'for="' + option + '" ';
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                var html_radio_input = '>' + option + l2;
                                                $("#textarea_html_code").insertAtCaret(html_radio_input);
                                                $("#textarea_html_code").insertAtCaret("\n");
                                            }

                                            $("#textarea_html_code").insertAtCaret("\n");




                                            document.getElementById("formRadio").reset();

                                            radio_basic = "radio";
                                            radio_Text = "";
                                            radio_Options = "";
                                            radio_ID = "";
                                            radio_Class = "";
                                            radio_label_first = "";
                                            radio_use_label_element = "";
                                            radio_Label = "";

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

        $value_textarea_template = '[text "required:required" "label:Your Name" "name:user_name"]' . $space_double . '[email "required:required" "label:Your Email Address" "name:user_email"]' . $space_double . '[submit "label:Submit"]';
        $value_textarea_html_code = '<label>Your Name</label>' . $space_single . '<input type="text" name="user_name" value="" class="" id="" required>' . $space_double . '<label>Your Email Address</label>' . $space_single . '<input type="email" name="user_email" value="" class="" id="" required>' . $space_double . '<input type="submit" value="Submit" class="" id="">';

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
                    <button type="button" id="btn_password" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#password_modal">password</button>
                    <button type="button" id="btn_text" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#text_modal">text</button>
                    <button type="button" id="btn_email" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#email_modal">email</button>
                    <button type="button" id="btn_url" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#URL_modal">URL</button>
                    <button type="button" id="btn_tel" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tel_modal">tel</button>
                    <button type="button" id="btn_number" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#number_modal">number</button>
                    <button type="button" id="btn_date" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#date_modal">date</button>
                    <button type="button" id="btn_textarea" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#textarea_modal">textarea</button>
                    <button type="button" id="btn_dropdown" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dropdown_modal">drop-down menu</button>
                    <button type="button" id="btn_radio" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#radio_modal">radio buttons</button>
                    <button type="button" id="btn_submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#submit_modal">submit</button>
                </div>

                <br>

                <div class="form-group">
                    <label class="fw-bold">Form Template</label>
                    <textarea name="textarea_tags" id="new_textarea" class="form-control" style="min-height:250px;" required><?php echo $value_textarea_template; ?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label class="fw-bold">HTML Code</label>
                    <textarea name="textarea_html_tags" id="textarea_html_code" class="form-control" style="min-height:250px;" required><?php echo $value_textarea_html_code; ?></textarea>
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
                    <input type="text" name="form_redirect_path" class="form-control" placeholder="Enter Redirect Path" required>
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
        var l5 = "</select>";
        var l6 = "<option ";
        var l7 = "</option>";
        var l8 = "<textarea ";
        var l9 = "</textarea>";
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