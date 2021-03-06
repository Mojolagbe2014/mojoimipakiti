<?php
session_start();
define("CONST_FILE_PATH", "../includes/constants.php");
include ('../classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$tutorObj = new Tutor($dbObj); // Create an object of Tutor class
$errorArr = array(); //Array of errors
$tutorImgFil ="";
if(!isset($_SESSION['ITCLoggedInAdmin']) || !isset($_SESSION["ITCadminEmail"])){ 
    $json = array("status" => 0, "msg" => "You are not logged in."); 
    header('Content-type: application/json');
    echo json_encode($json);
}
else{
    if(filter_input(INPUT_POST, "addNewTutor") != NULL){
        $postVars = array('name','qualification','field','bio','email','website','picture'); // Form fields names
        //Validate the POST variables and add up to error message if empty
        foreach ($postVars as $postVar){
            switch($postVar){
                case 'picture':   $tutorObj->$postVar = basename($_FILES["picture"]["name"]) ? rand(100000, 1000000)."_".  strtolower(str_replace(" ", "_", filter_input(INPUT_POST, 'name'))).".".pathinfo(basename($_FILES["picture"]["name"]),PATHINFO_EXTENSION): ""; 
                                $tutorImgFil = $tutorObj->$postVar;
                                if($tutorObj->$postVar == "") {array_push ($errorArr, "Please enter $postVar ");}
                                break;
                case 'website': $tutorObj->$postVar = filter_input(INPUT_POST, $postVar) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, $postVar)) :  ''; 
                                break;
                default     :   $tutorObj->$postVar = filter_input(INPUT_POST, $postVar) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, $postVar)) :  ''; 
                                if($tutorObj->$postVar == "") {array_push ($errorArr, "Please enter $postVar ");}
                                break;
            }
        }
        //If validated and not empty submit it to database
        if(count($errorArr) < 1)   {
            $targetFile = MEDIA_FILES_PATH."tutor/". $tutorImgFil;
            $uploadOk = 1; $msg = '';
            $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
            if (file_exists($targetFile)) { $msg .= " Tutor picture already exists."; $uploadOk = 0; }
            if ($_FILES["picture"]["size"] > 80000000) { $msg .= " Tutor picture is too large."; $uploadOk = 0; }
            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"  && $imageFileType != "bmp") { $msg .= "Sorry, only image files are allowed."; $uploadOk = 0; }
            if ($uploadOk == 0) {
                $msg = "Sorry, your tutor picture was not uploaded. ERROR: ".$msg;
                $json = array("status" => 0, "msg" => $msg); 
                header('Content-type: application/json');
                echo json_encode($json);
            } 
            else {
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
                    $msg .= "The picture has been uploaded.";
                    $status = 'ok';
                    echo $tutorObj->add();
                } else {
                    $msg = " Sorry, there was an error uploading your tutor picture. ERROR: ".$msg;
                    $json = array("status" => 0, "msg" => $msg); 
                    $dbObj->close();//Close Database Connection
                    header('Content-type: application/json');
                    echo json_encode($json);
                }
            }

        }
        //Else show error messages
        else{ 
            $json = array("status" => 0, "msg" => $errorArr); 
            $dbObj->close();//Close Database Connection
            header('Content-type: application/json');
            echo json_encode($json);
        }
    } 
}