<?php

require_once "connection.php";

if(isset($_REQUEST['btn_insert']))
{
    try
    {
        $name = $_REQUEST['txt_name']; //textbox name "txt_name"

        $image_file = $_FILES["txt_file"]["name"];
        $type  = $_FILES["txt_file"]["type"]; //file name "txt_file"
        $size  = $_FILES["txt_file"]["size"];
        $temp  = $_FILES["txt_file"]["tmp_name"];

        $path="/xampp/htdocs/images/".$image_file; //set upload folder path

        if(empty($name)){
            $errorMsg="Please Enter Name";
        }
        else if(empty($image_file)){
            $errorMsg="Please Select Image";
        }
        else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
        {
            if($size < 5000000) //check file size 5MB
            {
                move_uploaded_file($temp, "upload/" .$image_file); //move upload file temporary directory to your upload folder
            }
            else
            {
                $errorMsg="Your file is larger than 5 MB! Choose a different Image."; //error message file size not large than 5MB
            }
            }
        }
        else
        {
            $errorMsg="ERROR - CHECK FILE EXTENSION. Only JPG , JPEG , PNG & GIF File formats allowed!"; //error message file extension
        }

        if(!isset($errorMsg))
        {
            $insert_stmt=$db->prepare('INSERT INTO users(profilePhoto) VALUES(:fimage)'); //sql insert query
            $insert_stmt->bindParam(':fimage',$image_file);   //bind all parameter

            if($insert_stmt->execute())
            {
                $insertMsg="File Upload Successfully........"; //execute query success message
                header("refresh:3;index.php"); //refresh 3 second and redirect to index.php page
            }
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>