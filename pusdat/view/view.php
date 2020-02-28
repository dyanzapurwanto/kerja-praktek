<html>
<style>
	* {
		box-sizing: border-box;
		}

		body {
		font-family: Arial, Helvetica, sans-serif;
		}

		/* Remove extra left and right margins, due to padding in columns */
		.row {margin: 0 -5px;}

		/* Clear floats after the columns */
		.row:after {
		content: "";
		display: table;
		clear: both;
		}

		/* Style the counter cards */
		.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
		padding: 16px;
		text-align: center;
		background-color: #f1f1f1!important;
		}

		/* Responsive columns - one columnlayout (vertical) on small screens */
		.column{
			width:61%;
			display: block;
			margin-bottom: 20px;
		
		}
		.column_button{
			width:13%;
			display: block;
			margin-bottom: 20px;
		}

		.link { color: #d45d79; } /* CSS link color (red) */
		.link:hover { color: #35495e; } /* CSS link hover (green) */
</style>
	<head>
		<title>VIEW</title>
	</head>
	<body>
			<?php while($row = $this->model->fetch($data)){
				if($row[1]=="xls" || $row[1]=="xlsx")
				{
					$color = "#b1ffb1";
				}
				else if($row[1]=="doc" || $row[1]=="docx")
				{
					$color = "#bbcfff";
				}
				else if($row[1]=="ppt" || $row[1]=="pptx")
				{
					$color = "#ec7373";
				}
				else
				{
					$color = "#5b5656";
				}
				echo "
				<div class='row' style='background-color:".$color."'>
					<div class= column>
					<div class= card>".$row[0]."</div>
					</div>
					<div class= column_button>
					<div class= card><a class='link' href='index.php?e=$row[0]'>EDIT</a></div>
					</div>
					<div class= column_button>
					<div class= card><a class='link' href='index.php?d=$row[0]' onClick=\"return confirm('Hapus Data?')\"\>DELETE</a></div>
					</div>
					<div class= column_button>
					<div class= card><a class='link' href='index.php?download=$row[0]'>DOWNLOAD</a></div>
					</div>
			  </div>
				";
			}?>
	</body>
	<!--<tr>
		<td>$row[0]</td>
		<td><a href='index.php?e=$row[0]'>Edit</a></td>
		<td><a href='index.php?d=$row[0]' onClick=\"return confirm('Hapus Data?')\"\>Delete</a></td>
		<td><a href='index.php?download=$row[0]'>Download</a></td>
	</tr>-->
</html>

