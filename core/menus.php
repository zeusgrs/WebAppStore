<?php
class Menus {
    /**
     * create global main menu
     */
    public function Main() {
        $Databases = new Database();
        $db = $Databases->Open();
        echo "<div class='mainMenu'>";
        echo "<ul>";
        
        $query = mysqli_query($db,"SELECT * FROM `categorys` ORDER BY `order`");
        $this->mainMenuItem("Home","unset","images/icons/icon_home.png","index.php");
        while($categorys = mysqli_fetch_array($query)){
            $this->mainMenuItem($categorys["name"], strtolower($categorys["name"]),$categorys["icon"],"index.php?category=".$categorys["name"]);
        }
        $this->mainMenuItem("Add APK","unset","","developer.php");
        echo "</ul>";
        echo "</div>";
        $Databases->close($db);
    }
    
    /**
     * $name convert to lowercase char for using good in icon , css
     * @param type $name = name of menu item
     * @param type $class = name of css class for colors
     * @param type $url = url link for menu item
     */
    function mainMenuItem($name,$class,$icon,$url="#"){
        echo "<a href='$url'>
                <li id='$class'>
                    <div class='icon $class'>";
        if(file_exists($icon)){
            echo "<img src='$icon' width='25px'>";
        }
        
        echo "      </div>
                    <div class='mtitle'>
                        $name
                    </div>
                </li>
              </a>";
    }
}
