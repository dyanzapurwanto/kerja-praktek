<?php
    include "model/model.php";

    class controller{

        public $model;

        function __construct(){
            $this->model = new model();
        }
        function index(){
            if (isset($_SESSION['username']))
            {
                $data = $this->model->selectAll();
                include 'view/view.php';
            }
            else
            {
                $result = $this->model->getlogin();
                if($result != 'empty')
                {
                    $username = $result[0];
                    $password = $result[1];
                    $login = $this->model->__login($username,$password);
                    if($login == "login")
                    {
                        $_SESSION['username'] = $username;
                        header("refresh:0");
                        $data = $this->model->selectAll();
                        include 'view/view.php';
                    }
                    else
                    {
                        include 'view/view_login.php';
                    }
                }
                else
                {
                    include 'view/view_login.php';
                }
            }
        }
        function viewEdit($file){
            $data = $this->model->selectFile($file);
            $row = $this->model->fetch($data);
            include "view/view_edit.php";
        }

        function viewInsert(){
            include "view/view_add.php";
        }

        function update($oldfile,$file,$ext){

            rename('files/'.$oldfile.".".$ext,'files/'.$file.".".$ext);
            $update = $this->model->updateFile($oldfile,$file,$ext);
            header("location:index.php");
        }

        function delete($file){
            $data = $this->model->selectFile($file);
            $row = $this->model->fetch($data);
            $ext = $row[1];
            if (file_exists('files/'.$file.'.'.$ext))
            {
                $deleted= unlink('files/'.$file.'.'.$ext);
                if ($deleted)
                {
                    $delete = $this->model->deleteFile($file);
                    echo '<script language="javascript">';
                    echo 'alert("file deleted")';
                    echo '</script>';
                    header("location:index.php");
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("The file has not been successfully deleted")';
                    echo '</script>';
                }
            }
            else
            {
                    echo '<script language="javascript">';
                    echo 'alert("The original file that you want to delete does not exist")';
                    echo '</script>';
            }

        }
        function download($file)
        {
            $data = $this->model->selectFile($file);
            $row = $this->model->fetch($data);
            $download = $row[0].".".$row[1];
            $path = "files/";
            $fullfile = $path.$download;
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=" . Urlencode($download));   
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Description: File Transfer");            
            header("Content-Length: " . Filesize($fullfile));
            flush();
            $fp = fopen($fullfile, "r");
            while (!feof($fp))
            {
                echo fread($fp, 65536);
                flush();
            } 
            fclose($fp);
            
        }
        function insert($file,$ext){
            $insert = $this->model->insertFile($file,$ext);
            header("location:index.php");
        }

        function __destruct(){

        }
    }
?>