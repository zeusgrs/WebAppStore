<?php
class Plugins {
    public function Youtube($videoId,$width = "400",$height = "300") {
        if($width == NULL && $height != NULL) {$width = ($height*1.5)."px";}
        if($height == NULL && $width != NULL) {$height = ($width/1.5)."px";}
        
        return "<iframe width='$width' height='$height' src='//www.youtube.com/embed/$videoId' frameborder='0' allowfullscreen></iframe>\n";
    }
    
    public function YoutubeFullLink($link,$width = "400",$height = "300") {
        if($width == NULL && $height != NULL) {$width = ($height*1.5)."px";}
        if($height == NULL && $width != NULL) {$height = ($width/1.5)."px";}
        $link = str_replace("https://www.youtube.com/watch?v=", "//www.youtube.com/embed/", $link);
        return "<iframe width='$width' height='$height' src='$link' frameborder='0' allowfullscreen></iframe>\n";
    }
    
    public function VimeoFullLink($link,$width = "400",$height = "300") {
        if($width == NULL && $height != NULL) {$width = ($height*1.5)."px";}
        if($height == NULL && $width != NULL) {$height = ($width/1.5)."px";}
        //$link = str_replace("http://vimeo.com/", "//player.vimeo.com/video/", $link);
        $link = explode("/",$link);
        $count = count($link)-1;
        $link = $link[$count];
        return "<iframe src='//player.vimeo.com/video/$link' height='$height' src='$link' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\n";
    }
    
    public function Image($file,$width = "400",$height = "300") {
        if($width == 0){ $width="";} else {$width="width='$width'";}
        if($height == 0){ $height="";} else {$height="height='$height'";}
        return "<img src='$file'  $width $height>\n";
    }

    public function ImageLightbox($file,$width = "400",$height = "300",$description,$group) {
        if($width == 0){ $width="";} else {$width="width='$width'";}
        if($height == 0){ $height="";} else {$height="height='$height'";}
        return "<a href='$file' data-lightbox='$group' title='$description'><img src='$file'  $width $height></a>\n";
    }
    
    public function AudioLink($file,$name,$autoplay=1,$controls=1) {
        if($autoplay == 1){$autoplay = "autoplay" ;} else {$autoplay="";}
        if($controls == 1){$controls = "controls" ;} else {$controls="";}
        $audio = "<audio id='$name' $controls $autoplay>
                    <source src='$file' type='audio/ogg'>
                    <source src='$file' type='audio/mpeg'>
                  </audio>";
        return $audio;
    }
    
    public function HttpLink($link,$target="_new") {
        return "<a href='$link' target='$target'>$link</a>\n";
    }    
}
?>