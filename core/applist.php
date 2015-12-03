<?php
class AppList {
    /**
     * 
     * @param type $name = name of the app
     * @param type $developer = developer name of this app
     * @param type $image = image for app list
     * @param type $stars = rate stars number 0-5
     * @param type $link = link of app
     */
    public function singleAppCard($name=null,$developer=null,$image=null,$stars=0,$link=null){
        echo "<div class='appListCard'>";
        echo "<a href='$link'><div class='thumbnail'><img src='$image'></div>";
        echo "<div class='appName'>$name</div></a>";
        echo "<a href='#developer=$developer'><div class='devName'>$developer</div></a>";
        echo "<a href='$link'><div class='appStars app".$stars."Stars'></div>";
        echo "<div class='downloadIcon'></div></a>";
        echo "</div>";        
    }
}

