<?php
class UploadFiles {
    /**
     * 
     * @param type $image set the POST image name to upload
     * 
     */
    public function Image($image) {
        if(isset($image)){
          $errors = "";
          $maxsize = (1*1024)*1024; //1 mb
          $file_name = $image['name'];
          $file_size = $image['size'];
          $file_tmp = $image['tmp_name'];
          $file_type= $image['type'];
          $imageNameArray = explode('.',$image['name']);
          $file_ext = strtolower(end($imageNameArray));

          $expensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$expensions)=== false){
             $errors .= "extension not allowed, please choose a JPEG or PNG file.</br>";
          }

          if($file_size > $maxsize){
             $errors .= 'File size must be excately 1 MB</br>';
          }

          if($errors == NULL){
             move_uploaded_file($file_tmp,"images/tmp/".$file_name);
             echo "$file_name Success upload </br>";
             return "images/tmp/".$file_name;
          }
          else{
             echo $errors;
          }
        }        
    }
    
    public function Apk($apk) {
        if(isset($apk)){
          $errors = "";
          $maxsize = (500*1024)*1024; // 500 mb
          $file_name = $apk['name'];
          $file_size = $apk['size'];
          $file_tmp = $apk['tmp_name'];
          $file_type = $apk['type'];
          $apkNameArray = explode('.',$apk['name']);
          $file_ext = strtolower(end($apkNameArray));

          $expensions= array("apk");

          if(in_array($file_ext,$expensions)=== false){
             $errors .= "extension not allowed, please choose a APK.<br/>";
          }

          if($file_size > $maxsize){
             $errors .= 'File size must be excately 500 MB<br/>';
          }

          if($errors == NULL){
             move_uploaded_file($file_tmp,"apk/tmp/".$file_name);
             echo "$file_name Success upload<br/>";
             return "apk/tmp/".$file_name;
          }
          else{
             echo $errors;
          }
        }          
    }    
}
