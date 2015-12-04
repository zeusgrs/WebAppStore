<?php
class UploadFiles {
    /**
     * 
     * @param type $image set the POST image name to upload
     * 
     */
    public function Image($image) {
        if(isset($_FILES[$image])){
          $errors = "";
          $file_name = $_FILES[$image]['name'];
          $file_size =$_FILES[$image]['size'];
          $file_tmp =$_FILES[$image]['tmp_name'];
          $file_type=$_FILES[$image]['type'];
          $file_ext=strtolower(end(explode('.',$_FILES[$image]['name'])));

          $expensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$expensions)=== false){
             $errors .= "extension not allowed, please choose a JPEG or PNG file.</br>";
          }

          if($file_size > 2097152){
             $errors .= 'File size must be excately 2 MB</br>';
          }

          if($errors == NULL){
             move_uploaded_file($file_tmp,"images/tmp/".$file_name);
             echo "$file_name Success upload </br>";
          }
          else{
             echo $errors;
          }
        }        
    }
    
    public function Apk() {
        if(isset($_FILES['apk'])){
          $errors = "";
          $file_name = $_FILES['apk']['name'];
          $file_size =$_FILES['apk']['size'];
          $file_tmp =$_FILES['apk']['tmp_name'];
          $file_type=$_FILES['apk']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['apk']['name'])));

          $expensions= array("apk");

          if(in_array($file_ext,$expensions)=== false){
             $errors .= "extension not allowed, please choose a APK.<br/>";
          }

          if($file_size > 2097152){
             $errors .= 'File size must be excately 2 MB<br/>';
          }

          if($errors == NULL){
             move_uploaded_file($file_tmp,"apk/tmp/".$file_name);
             echo "$file_name Success upload<br/>";
          }
          else{
             echo $errors;
          }
        }          
    }    
}
