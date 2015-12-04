<?php
class Menus {
    /**
     * create global main menu
     */
    public function Main() {
        echo "<div class='mainMenu'>";
        echo "<ul>";
        $this->mainMenuItem("Games","index.php");
        $this->mainMenuItem("Tools","index.php");
        $this->mainMenuItem("Music","index.php");
        $this->mainMenuItem("Photos","index.php");
        $this->mainMenuItem("Internet","index.php");
        $this->mainMenuItem("Add APK","developer.php");
        echo "</ul>";
        echo "</div>";
    }
    
    /**
     * $name convert to lowercase char for using good in icon , css
     * @param type $name = name of menu item
     * @param type $url = url link for menu item
     */
    function mainMenuItem($name,$url="#"){
        echo "<a href='$url'>
                <li id='".strtolower($name)."'>
                    <div class='icon ".strtolower($name)."'>";
        $image = "images/icons/icon_".strtolower($name).".png";
        if(file_exists($image)){
            echo "<img src='$image' width='25px'>";
        }
        
        echo "      </div>
                    <div class='mtitle'>
                        $name
                    </div>
                </li>
              </a>";
    }
}
