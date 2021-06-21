$(document).ready(function () {
	$("form.add_client").validate({
		rules: {
			client_name: { required: true },
			client_url: {
				required: true,
				url: true,
			},
			client_primary_email: {
				required: true,
				email: true,
			},
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
	});

	$("form.verify_login").validate({
		rules: {
			user_login_id: { required: true },
			user_password: {
				required: true,
				minlength: 8,
				maxlength:15
			},
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
	});
});
