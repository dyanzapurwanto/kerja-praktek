<html>
	<head>
		<title>MVC</title>
	</head>
	<body>
		<form action="" method="POST" enctype = "multipart/form-data">
			<table border="1" cellpadding="5" cellspacing="0" align="center" width = "70%">
				<tr align="center" height = "70px">
					<td>File</td>
					<td>:</td>
					<td align = "left"><input type="file" name="file" size="100%"/></td>
				</tr>
				<tr align="center" height = "45px">
					<td colspan="3"><input type="submit" name="submit" value = "Upload" style="width:70%"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	if(isset($_POST['submit'])){ //jika button submit diklik maka panggil fungsi insert pada controller
		$main = new controller();
        $file = $_FILES['file']['name'];
        $error = $_FILES['file']['error'];
        $temp = $_FILES['file']['tmp_name'];
        $x = explode('.', $file);
		$ext = strtolower(end($x));
        $target = 'files/'.$file;
        $name = $x[0];
        $ukuran = $_FILES['file']['size']/1024;
        // Proses upload
        if($ukuran > 0 || $error == 0)
        {
            $move = move_uploaded_file($temp,$target);
            if($move)
            {
                echo '<script language="javascript">';
                echo 'alert("file upload success")';
                echo '</script>';
                $main->insert($name,$ext);
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("file upload failed")';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("file upload failed")';
            echo '</script>';
        }
	}
?>