<?php
require 'root/cnxDB.php';
$errors=1;
//Targeting Folder



if(isset($_POST['submit'])){
    
    $file_name = $_FILES['video']['name'];
    $file_tmp =$_FILES['video']['tmp_name'];
    $target="vids";
    
        if(is_dir($target)==false){
            mkdir("$target", 0700);        // Create directory if it does not exist
        }
        if(is_dir("$target/".$file_name)==false){
            move_uploaded_file($file_tmp,"$target/".$file_name);
        }else{                                    //rename the file if another one exist
            $new_dir="$target/".$file_name.time();
             rename($file_tmp,$new_dir) ;                
        }
    
        
//Targeting Folder 
$target=$target."/".basename($_FILES['video']['name']);
//Getting Selected video Type
$type=pathinfo($target,PATHINFO_EXTENSION);
 //Allow Certain File Format To Upload
 if($type!='mp4' && $type!='3gp' && $type!='avi'){
  echo "Only mp4,3gp,avi file format are allowed to Upload";
  $errors=0;
 }
 //checking for Exsisting video Files
  
  $filesize=$_FILES['video']['size'];
  if($filesize>250*2000000){
  echo 'You Can not Upload Large File(more than 500MB) by Default ini setting..<a     href="http://www.codenair.com/2018/03/how-to-upload-large-file-in-php.html">How to   upload large file in php</a>'; 
    $errors=0;
    }
   if($errors == 0){
   echo ' Your File Not Uploaded';
    }else{
 //Moving The video file to Desired Directory
  $uplaod_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
  
  //Getting Selected video Information
    $name=$_FILES['video']['name'];
    $size=$_FILES['video']['size'];
    $result=mysqli_query($con,"INSERT INTO videos(file_name,size,type)VALUES('".$name."','".$size."','".$type."')");
    if($result==TRUE){
    echo "Your video '$name' Successfully Upload and Information Saved Our  Database";
    }
   
  }
  }
  header( "refresh:5;url=display.php" );
 ?>



 
