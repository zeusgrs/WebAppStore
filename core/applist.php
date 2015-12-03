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
    public function fullAppPage() {
    
        echo "<div class='appContent'>";

        echo "<div class='appHead'>";
            echo "<div class='appHeadPhoto'>";
            echo "<img src='images/app/webtouchvoipclient.jpg' width='312px'>";
            echo "</div>";

            echo "<div class='appTitle'>";
            echo "<h1>Webtouch Voip Client</h1>";
            echo "</div>";

            echo "<div class='appDeveloper'>";
            echo "Webtouch.gr";
            echo "</div>";        

            echo "<div class='appDate'>";
            echo "Date: 03 December 2015";
            echo "</div>";  

            echo "<div class='appCategory'>";
            echo "Category: Communication";
            echo "</div>"; 

            echo "<div class='appRate'>Rate:</div><div class='appStars app5Stars'></div> <div class='appUsers'>( 25.534 )</div><br>"; 

            echo "<div class='appDownloads'>";
            echo "Downloads: 152.352";
            echo "</div>"; 

            echo "<div class='downloadIconBig'></div>"; 

            echo "<div id='appQRcode'></div>";        

        echo "</div>";

        echo "<div class='clear'></div>";

        echo "<div class='appMedia'>";
        $title = "Webtouch Voip Client";
        $img1 = "images/app/webtouch_voip_client_1.jpeg";
        echo "<a href='$img1' data-lightbox='app-set' title='$title'><img src='$img1'></a>";
        $img2 = "images/app/webtouch_voip_client_2.jpeg";
        echo "<a href='$img2' data-lightbox='app-set' title='$title'><img src='$img2'></a>";
        echo "</div>";    

        echo "<div class='clear'></div>";

        echo "<div class='appDescription'>";
        echo "<h2>Description</h2></br>";
        echo "Για να συνδεθείτε στο πρόγραμμα θα πρέπει πρώτα να δημιουργήσετε έναν δωρεάν λογαριασμό χρήστη εδώ http://webtouch.gr/?page_id=2102 και να αποκτήσετε δωρεάν κλήσεις περίπου 10 λεπτών.<br/>
    WEBTouch VOIP Client είναι μια voip εφαρμογή για Android , η οποία υποστηρίζει ένα ευρύ φάσμα υπηρεσιών VoIP. Απλά συνδεθείτε χρησιμοποιώντας τον υπάρχοντα λογαριασμό σας και αρχίστε να εξοικονομείτε χρήματα για εθνικές και διεθνείς κλήσεις , όπου και να είστε , όποτε θέλετε!<br/>
    Για να ξεκινήσετε την εξοικονόμηση για κλήσεις κινητής τηλεφωνίας , εγκαταστήστε το δωρεάν WEBTouch VOIP Client από το Google Play. Εάν δεν έχετε ακόμα λογαριασμό , κάντε εγγραφή στην ιστοσελίδα της Webtouch , πιστώστε στον λογαριασμό σας λίγα ευρώ και ξεκινήστε να μιλάτε με τις χαμηλότερες τιμές τις αγοράς Το μόνο που χρειάζεται είναι η εφαρμογή και μία 3G ή WiFi σύνδεση.";
        echo "</div>";

        echo "</div>";

        echo "<script>jQuery('#appQRcode').qrcode({width: 110,height: 110,text: 'http://www.webtouch.gr'});</script>";        
    }
}

