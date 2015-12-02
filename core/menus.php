<?php
class Menus {
    /**
     * create global main menu
     */
    public function Main() {
        echo "<div class='mainMenu'>";
        echo "<ul>";
        $this->mainMenuItem("Games","http://webtouch.gr");
        $this->mainMenuItem("Tools");
        $this->mainMenuItem("Music");
        $this->mainMenuItem("Photos");
        $this->mainMenuItem("Internet");
        $this->mainMenuItem("Security2");
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
                    <div class='".strtolower($name)."'>
                        <img src='images/icons/icon_".strtolower($name).".png' width='25px'>
                    </div>
                    <div class='mtitle'>
                        $name
                    </div>
                </li>
              </a>";
    }
}
