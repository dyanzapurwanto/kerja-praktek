<?php
    class model
    {
        public $connect;

        function __construct()
        {
            $this->connect = mysqli_connect("localhost","root","",'pusdat');
            $tblQuery = "CREATE TABLE IF NOT EXISTS files (
                file varchar(255) NOT NULL,
                ext varchar(5) NOT NULL,
                PRIMARY KEY  (file)
                )";
            mysqli_query($this->connect,$tblQuery);
        }
        function getlogin()
        {
            if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
            {
                $data = array($_REQUEST['username'],$_REQUEST['password']);
                return $data;
            }
            else
            {
                return "empty";
            }
        }
        function __login($username,$password)
        {
            $query = "select * from user where username ='$username'";
            $result = $this->execute($query);
            if($this->connect->connect_error)
            {
                return "error";
            }
            else
            {
                $row = mysqli_fetch_array($result);
                if($username==$row[0] && $password == $row[1])
                {
                    return "login";
                }
                else
                {
                    return "invalid";
                }
            }
        }
        function execute($query)
        {
            return mysqli_query($this->connect,$query);
        }
        function selectAll()
        {
            $query = "select * from files ORDER BY ext ASC";
            return $this->execute($query);
        }
        function selectFile($file)
        {
            $query = "select * from files where file ='$file'";
            return $this->execute($query);
        }
        function updateFile($oldfile,$file,$ext)
        {
            $query = "update files set file = '$file', ext = '$ext' where file = '$oldfile'";
            return $this->execute($query);
        }
        function deleteFile($file)
        {
            $query = "delete from files where file = '$file'";
            return $this->execute($query);
        }
        function insertFile($file,$ext)
        {
            $query = "insert into files values ('$file','$ext')";
            return $this->execute($query);
        }
        function fetch($var)
        {
            return mysqli_fetch_array($var);
        }

        function __destruct(){

        }
    }
?>