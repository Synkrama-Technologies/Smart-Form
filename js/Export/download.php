<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="dist/jquery.table2excel.js"></script>
        
</head>
<body>
    
<table class="table2excel" data-tableName="Test Table 1">
    <tr>
        <td>hi</td>
        <td>hello</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
    </tr>
</table>


<button class="exportToExcel">Download</button>


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
