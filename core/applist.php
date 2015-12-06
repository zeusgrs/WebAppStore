<?php
class AppList {
    /**
     * load all app from a category
     * @param type $app_category
     */
    public function AllAppList($app_category){
        $Databases = new Database();
        $db = $Databases->Open();
        
        /* Select Application list from database */
        $app_query = mysqli_query($db,"SELECT   apps.app_id
                                        FROM    apps,categorys
                                       WHERE    categorys.name = '$app_category'
                                         AND    apps.category = categorys.cat_id");
        echo mysqli_error($db);
        while($app = mysqli_fetch_array($app_query)){
            $this->SingleAppCard($app["app_id"]);
        }
        
    }
    /**
     *  load all app as card from a developer 
     * @param type $developer
     */
    
    public function AllAppListFromDeveloper($developer){
        $Databases = new Database();
        $db = $Databases->Open();
        
        /* Select Application list from database */
        $app_query = mysqli_query($db,"SELECT   apps.app_id
                                        FROM    apps,developer
                                       WHERE    developer.name = '$developer'
                                         AND    apps.dev = developer.dev_id");
        echo mysqli_error($db);
        while($app = mysqli_fetch_array($app_query)){
            $this->SingleAppCard($app["app_id"]);
        }
        
    }
    
    /**
     * Load application card from database
     * TODO
     * Changes all custom value with app id to load from database
     */
    public function SingleAppCard($app_id){
        $Databases = new Database();
        $Media = new Plugins();
        
        $db = $Databases->Open();
        
        /* Select Application info from database */
        $app_query = mysqli_query($db,"SELECT   apps.app_id as app_id,
                                                apps.name as name,
                                                developer.name as developer
                                        FROM    apps,developer
                                       WHERE    apps.app_id = $app_id
                                         AND    apps.dev = developer.dev_id");
        
        $app = mysqli_fetch_assoc($app_query);
        echo mysqli_error($db);
        /* Select Application media from database images, icons, video*/
        $media_query = mysqli_query($db,"SELECT     app_id, type, name, description, url, date
                                           FROM     media
                                          WHERE     app_id = $app_id
                                            AND     active = 1
                                            AND     type = 'icon'");
        $icon = mysqli_fetch_assoc($media_query);
        
        echo "<div class='appListCard'>";
        echo "<a href='index.php?app_id=".$app["app_id"]."'><div class='thumbnail'><img src='".$icon["url"]."'></div>";
        echo "<div class='appName'>".$app["name"]."</div></a>";
        echo "<a href='?developer=".$app["developer"]."'><div class='devName'>".$app["developer"]."</div></a>";
        $stars = 5;
        echo "<a href='index.php?app_id=".$app["app_id"]."'><div class='appStars app".$stars."Stars'></div>";
        echo "<div class='downloadIcon'></div></a>";
        echo "</div>";
        $Databases->Close($db);
    }
    
    /**
     * Load application page from database
     * TODO
     * Changes all custom value with app id to load from database
     */
    public function FullAppPage($app_id) {
        if(isset($_SESSION["app_id"])){
            $app_id = $_SESSION["app_id"];
        }
        
        
        $Databases = new Database();
        $Media = new Plugins();
        
        $db = $Databases->Open();
        
        /* Select Application info from database */
        $app_query = mysqli_query($db,"SELECT   apps.name as name,
                                                apps.date as date,
                                                categorys.name as category,
                                                developer.name as developer,
                                                apps.description as description,
                                                apps.downloads as downloads,
                                                apps.apk as apk
                                        FROM    apps,categorys,developer
                                       WHERE    apps.app_id = $app_id
                                         AND    apps.dev = developer.dev_id
                                         AND    apps.category = categorys.cat_id ");
        
        $app = mysqli_fetch_assoc($app_query);
        
        /* Select Application media from database images, icons, video*/
        $media_query = mysqli_query($db,"SELECT     app_id, type, name, description, url, date
                                           FROM     media
                                          WHERE     app_id = $app_id
                                            AND     active = 1
                                       ORDER BY     'order' ");
        
        while($media = mysqli_fetch_assoc($media_query)){
            if($media["type"] == "icon"){
                /* only one icon per app exist */
                $icon = $media["url"];
            }
            if($media["type"] == "screenshot"){
                $screenshot[] = array("url" => $media["url"],
                                     "name" => $media["name"],
                              "description" => $media["description"]);
            }
            if($media["type"] == "video"){
                $video[] = array("url" => $media["url"],
                                "name" => $media["name"],
                         "description" => $media["description"]);
            }            
        }
        
        /* Make apk full url to work in customs server folder */
        $url =  explode("/",$_SERVER["REQUEST_URI"]);
        $url = end($url);
        $url = str_replace($url, '', $_SERVER["REQUEST_URI"]);
        
        $apkUrl = "http://".$_SERVER["HTTP_HOST"].$url.$app["apk"];
        
        echo "<div class='appContent'>";

        echo "<div class='appHead'>";
            echo "<div class='appHeadPhoto'>";
            echo "<img src='$icon' width='312px'>";
            echo "</div>";

            echo "<div class='appTitle'>";
            echo "<h1>".$app["name"]."</h1>";
            echo "</div>";

            echo "<div class='appDeveloper'>";
            echo "<a href='?developer=".$app["developer"]."'>".$app["developer"]."</a>";
            echo "</div>";        

            echo "<div class='appDate'>";
            echo "Date: ".$app["date"];
            echo "</div>";  

            echo "<div class='appCategory'>";
            echo "Category: <a href='?cat=".$app["category"]."'>".$app["category"]."</a>";
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
        
        foreach ($video as $key => $value){
            echo $Media->YoutubeFullLink($value["url"]);
        } 
        
        foreach ($screenshot as $key => $value){
            /* if name and descripton in database is NULL the title = application name */
            if($value["name"] != NULL || $value["description"] != NULL){
                $title = $value["name"]." ".$value["description"];
            } else {
                $title = $app["name"];
            }
            echo $Media->ImageLightbox($value["url"], $width=0, $height=300,$title,"app-set");
        }
        
        echo "</div>";    

        echo "<div class='clear'></div>";

        echo "<div class='appDescription'>";
        echo "<h2>Description</h2></br>";
        echo $app["description"];
        echo "</div>";

        echo "</div>";
        
        
        echo "<script>jQuery('#appQRcode').qrcode({width: 110,height: 110,text: '$apkUrl'});</script>";
        $Databases->Close($db);
    }
}

