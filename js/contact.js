var myString = document.getElementById("form_id").innerHTML;
var myString = "'" + myString + "'";
// alert(myString);
var matches = myString.match(/\[(.*?)\]/);
// console.log(matches);
if (matches) {
	var submatch = matches[1];

	var submatch = submatch.replaceAll('"', "");
	// alert(submatch);
	// var submatch = submatch.match("contact-form-7,");
	if (submatch) {
		var item = submatch.replace("contact-form-7|", "");

		// alert(res);

		var item = item.split("|");
		// alert(item[0]);

		var id = item[0].split("=");
		var form_id = id[1];
		// alert(form_id);

		var submatch2 = matches[1];

		var key = submatch2.split("|");
		// alert(key[2]);

		var value = key[2];
		var value = value.replaceAll('"', "");
		// alert(value);
		var value = value.split("=");
		var form_name = value[1];
		// alert(form_name);

		if (form_id) {
			// alert("Form ID = " + form_id);
			$.ajax({
				// url: "http://localhost/form7/request_api/",
				url: "https://smartform.synkrama.dev/request_api/",
				type: "POST",
				data: {
					form_id: form_id,
				},
				cache: false,
				error: function (error) {
					console.log(error);
				},
				success: function (result) {
					// console.log(result);
					var temp = JSON.parse(result);
					var form_name = temp["form_name"];
					var form_id = temp["form_id"];
					var form_html = temp["form_html"];
					// alert(form_html);
					if (form_id) {
						var form_html = form_html.replaceAll("\n", "<br>");
						$("#form_id").html(form_html);
						$("#form_id").show();

						
						var queryString = window.location.search;
						// console.log(queryString);
						var urlParams = new URLSearchParams(queryString);
						// console.log(urlParams);

						//Get individual UTM value
						var utm_source = urlParams.get("utm_source");
						// utm_source="whatsapp";
						console.log(utm_source);

						//Place UTM value in input
						if (utm_source != "") {
							$("#utm_source").val(utm_source);
						}
					} else {
						alert("Data not found");
					}
				},
			});
		} else {
			alert("Data not found");
		}
	} else {
		alert("Please check the format of form tag");
	}
} else {
	alert("Please check the format of form tag");
}
