<html>
	<head>
		<title>MVC</title>
	</head>
	<body>
		<form action="" method="POST">
			<table border="1" cellpadding="5" cellspacing="0" align="center" width = "70%">
                <tr align="center">
					<td>Previous Name</td>
					<td>:</td>
					<td><input type="text" name="oldfile" value="<?=$row[0]?>" size="100%" readonly /></td>
				</tr>
				<tr align="center">
					<td>New Name</td>
					<td>:</td>
					<td><input type="text" name="file" value="<?=$row[0]?>" size="100%"/></td>
				</tr>
                <tr align="center">
					<td colspan="3"><input type="submit" name="submit" style="width:70%"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
    if(isset($_POST['submit'])){ //jika button submit diklik maka panggil fungsi update pada controller
        $oldfile = $_POST['oldfile'];
        $file = $_POST['file'];
        $ext = $row[1];
		$main = new controller();
		$main->update($oldfile, $file,$ext);
	}
?>