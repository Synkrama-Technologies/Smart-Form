<!DOCTYPE html>
<html>
	<head>
		<title>jQuery Boilerplate</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="dist/jquery.table2excel.js"></script>
	</head>
	<body>
		<table class="table2excel" data-tableName="Test Table 1">
			<thead>
				<tr class="noExl"><td>This shouldn't get exported</td><td>This shouldn't get exported either</td></tr>
				<tr><td>This Should get exported as a header</td><td>This should too</td></tr>
			</thead>
			<tbody>
				<tr>
					<td style="background-color: blue; color: purple;">data1a with a <a href="#">link one</a> and <a href="#">link two</a> and color won't be exported.</td>
					<td>data1b with a <img src="image_file.jpg" alt="image">.</td>
				</tr>
				<tr>
					<td>data2a with a <input tyle="text" value="text value">.</td>
					<td>data2b with a <input tyle="text" value="second text value">.</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2">This footer spans 2 cells</td>
				</tr>
			</tfoot>
		</table>
		<button class="exportToExcel">Export to XLS</button>

		<!-- <table class="table2excel" data-tableName="Test Table 2">
			<thead>
				<tr class="noExl"><td>This shouldn't get exported</td><td>This shouldn't get exported either</td></tr>
				<tr><td>This Should get exported as a header</td><td>This should too</td></tr>
			</thead>
			<tbody>
				<tr><td>data1a</td><td>data1b</td></tr>
				<tr><td>data2a</td><td>data2b</td></tr>
			</tbody>
			<tfoot>
				<tr><td colspan="2">This footer spans 2 cells</td></tr>
			</tfoot>
		</table>
		<button class="exportToExcel">Export to XLS</button>
		
		<table class="table2excel table2excel_with_colors" data-tableName="Test Table 3">
			<thead>
				<tr class="noExl"><td>This shouldn't get exported</td><td>This shouldn't get exported either</td></tr>
				<tr><td style="background-color: green;">This Should get exported as a header and maintain background color</td><td>This should too</td></tr>
			</thead>
			<tbody>
				<tr><td style="background-color: green; color: red;">data1a</td><td>data1b</td></tr>
				<tr><td>data2a</td><td>data2b</td></tr>
			</tbody>
			<tfoot>
				<tr><td colspan="2">This footer spans 2 cells</td></tr>
			</tfoot>
		</table> 
		<button class="exportToExcel">Export to XLS</button> -->

		<script>
			$(function() {
				$(".exportToExcel").click(function(e){
					var table = $(this).prev('.table2excel');
					if(table && table.length){
						var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
						$(table).table2excel({
							exclude: ".noExl",
							name: "Excel Document Name",
							filename: "FileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
							fileext: ".xls",
							exclude_img: true,
							exclude_links: true,
							exclude_inputs: true,
							preserveColors: preserveColors
						});
					}
				});
				
			});
		</script>
	</body>
</html>