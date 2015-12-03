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
        echo "<img src='$image'>";
        echo "<div class='appName'>$name</div>";
        echo "<div class='devName'>$developer</div>";
        echo "<div class='appStars app".$stars."Stars'></div>";
        echo "<a href='$link'><div class='downloadIcon'></div></a>";
        echo "</div>";        
    }
}

