<?php
session_start();
define("CONST_FILE_PATH", "../includes/constants.php");
include ('../classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$courseObj = new Course($dbObj); // Create an object of Course class
$errorArr = array(); //Array of errors
$courseMedFil =""; $courseImgFil ="";
if(!isset($_SESSION['TSILoggedInAdmin']) || !isset($_SESSION["TSIadminEmail"])){ 
    $json = array("status" => 0, "msg" => "You are not logged in."); 
    echo json_encode($json);
}
else{
    if(filter_input(INPUT_POST, "addNewCourse") != NULL){
        $postVars = array('name','image','shortName','category','startDate','code','description','media','amount', 'endDate'); // Form fields names
        //Validate the POST variables and add up to error message if empty
        foreach ($postVars as $postVar){
            switch($postVar){
                case 'image':   $courseObj->$postVar = basename($_FILES["image"]["name"]) ? rand(100000, 1000000)."_".  strtolower(str_replace(" ", "_", filter_input(INPUT_POST, 'shortName'))).".".pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION): ""; 
                                $courseImgFil = $courseObj->$postVar;
                                if($courseObj->$postVar == "") {array_push ($errorArr, "Please enter $postVar ");}
                                break;
                case 'media':   $courseObj->$postVar = basename($_FILES["file"]["name"]) ? rand(100000, 1000000)."_".  strtolower(str_replace(" ", "_", filter_input(INPUT_POST, 'shortName'))).".".pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION): ""; 
                                $courseMedFil = $courseObj->$postVar;
                                break;
                case 'code':    $courseObj->$postVar = filter_input(INPUT_POST, $postVar) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, $postVar)) :  ''; 
                                break;
                default     :   $courseObj->$postVar = filter_input(INPUT_POST, $postVar) ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, $postVar)) :  ''; 
                                if($courseObj->$postVar == "") {array_push ($errorArr, "Please enter $postVar ");}
                                break;
            }
        }
        //If validated and not empty submit it to database
        if(count($errorArr) < 1)   {
            $target_file = MEDIA_FILES_PATH."course/". $courseMedFil;
            $target_Image = MEDIA_FILES_PATH."course-image/". $courseImgFil;
            $uploadOk = 1; $msg = '';
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (file_exists($target_Image)) { $msg .= " Course image already exists."; $uploadOk = 0; }
            if ($_FILES["file"]["size"] > 800000000 || $_FILES["image"]["size"] > 8000000) { $msg .= " Course media is too large."; $uploadOk = 0; }
            if($courseMedFil !=''){ move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);}
            if($courseImgFil !=''){ move_uploaded_file($_FILES["image"]["tmp_name"], $target_Image);}
            if ($uploadOk == 0) {
                $msg = "Sorry, your course media was not uploaded. ERROR: ".$msg;
                $json = array("status" => 0, "msg" => $msg); 
                $dbObj->close();//Close Database Connection
                header('Content-type: application/json');
                echo json_encode($json);
            } 
            else { echo $courseObj->add(); }

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