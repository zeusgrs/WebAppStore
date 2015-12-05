<?php
class AppList {
    /**
     * Load application card from database
     * TODO
     * Changes all custom value with app id to load from database
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
    
    /**
     * Load application page from database
     * TODO
     * Changes all custom value with app id to load from database
     */
    public function fullAppPage($app_id) {
        $app_id = $_SESSION["app_id"];
        
        $Databases = new Database();
        $db = $Databases->Open();
        
        $query = mysqli_query($db,"SELECT apps.name as name,
                                          apps.date as date,
                                          categorys.name as category,
                                          developer.name as developer,
                                          apps.description as description,
                                          apps.downloads as downloads,
                                          apps.apk as apk
                                   FROM apps,categorys,developer
                                   WHERE apps.app_id = $app_id
                                     AND apps.dev = developer.dev_id
                                     AND apps.category = categorys.cat_id
                ");
        $app = mysqli_fetch_assoc($query);
        
        $apkUrl = "http://".$_SERVER['SERVER_NAME']."/prog/WebAppStore/".$app["apk"];
        
        echo "<div class='appContent'>";

        echo "<div class='appHead'>";
            echo "<div class='appHeadPhoto'>";
            echo "<img src='images/app/webtouchvoipclient.jpg' width='312px'>";
            echo "</div>";

            echo "<div class='appTitle'>";
            echo "<h1>".$app["name"]."</h1>";
            echo "</div>";

            echo "<div class='appDeveloper'>";
            echo $app["developer"];
            echo "</div>";        

            echo "<div class='appDate'>";
            echo "Date: ".$app["date"];
            echo "</div>";  

            echo "<div class='appCategory'>";
            echo "Category: ".$app["category"];
            echo "</div>"; 

            echo "<div class='appRate'>Rate:</div><div class='appStars app5Stars'></div> <div class='appUsers'>( 25.534 )</div><br>"; 

            echo "<div class='appDownloads'>";
            echo "Downloads: ".$app["downloads"];
            echo "</div>"; 

            echo "<a href='$apkUrl'><div class='downloadIconBig'></div></a>"; 

            echo "<div id='appQRcode'></div>";        

        echo "</div>";

        echo "<div class='clear'></div>";

        echo "<div class='appMedia'>";
        $title = $app["name"];
        $img1 = "images/app/webtouch_voip_client_1.jpeg";
        echo "<a href='$img1' data-lightbox='app-set' title='$title'><img src='$img1'></a>";
        $img2 = "images/app/webtouch_voip_client_2.jpeg";
        echo "<a href='$img2' data-lightbox='app-set' title='$title'><img src='$img2'></a>";
        echo "</div>";    

        echo "<div class='clear'></div>";

        echo "<div class='appDescription'>";
        echo "<h2>Description</h2></br>";
        echo $app["description"];
        echo "</div>";

        echo "</div>";
        
        
        echo "<script>jQuery('#appQRcode').qrcode({width: 110,height: 110,text: '$apkUrl'});</script>";        
    }
}

