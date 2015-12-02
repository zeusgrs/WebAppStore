<?php
class userinfo {
    public function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/Android/i', $u_agent)) {
            $platform = 'Android';
        }     
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'Mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'Windows';
        }
        elseif (preg_match('/linux/i', $u_agent)) {
            $platform = 'Linux';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
        elseif(preg_match('/craw/i',$u_agent))
        {
            $bname = 'Craw';
            $ub = "Craw";
            $platform = 'Craw';
        }
            elseif(preg_match('/bot/i',$u_agent))
        {
            $bname = 'Bot';
            $ub = "Bot";
            $platform = 'Bot';
        }
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }


    public function ipInfo($print,$code){
        global $ip,$host,$country,$browser,$os,$referer,$lang,$today;
        $ip = getenv("REMOTE_ADDR"); 
        $host = gethostbyaddr($ip);
        $httpinfo = $host."->".$_SERVER['HTTP_USER_AGENT'];
        $browser = $this->getBrowser();
        $os = $browser[platform];
        $browser = $browser[name]." ".$browser[version];
        $referer = $_SERVER["HTTP_REFERER"];
        $lang = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']); $lang = $lang[0];


        if($print == "1"){
            //echo "Your httpinfo is : " . $httpinfo."<br/>"; 
            echo "Your IP is : " . $ip."<br/>"; 
            echo "Your host is : " . $host."<br/><br/>"; 
            echo "Your browser is : " . $browser."<br/>"; 
            echo "Your os is : " . $os."<br/>"; 
            echo "Your referer is : " . $referer."<br/>"; 
            echo "Your lang is : " . $lang."<br/>";
        }
    }
    
    public function info(){
        $ip = getenv("REMOTE_ADDR"); 
        $host = gethostbyaddr($ip);
        $httpinfo = $host."->".$_SERVER['HTTP_USER_AGENT'];
        $browser = $this->getBrowser();
        $os = $browser[platform];
        $browser = $browser[name]." ".$browser[version];
        $referer = $_SERVER["HTTP_REFERER"];
        $lang = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']); $lang = $lang[0];
        
        return array(
                "ip" => "$ip",
                "host" => "$host",
                "browser" => "$browser",
                "os" => "$os",
                "referer" => "$referer",
                "lang" => "$lang");        
    }
    
    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
            $output = NULL;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
            $continents = array (
                        'AF' => 'Afghanistan',
                        'AL' => 'Albania',
                        'DZ' => 'Algeria',
                        'AS' => 'American Samoa',
                        'AD' => 'Andorra',
                        'AO' => 'Angola',
                        'AI' => 'Anguilla',
                        'AQ' => 'Antarctica',
                        'AG' => 'Antigua and Barbuda',
                        'AR' => 'Argentina',
                        'AM' => 'Armenia',
                        'AW' => 'Aruba',
                        'AU' => 'Australia',
                        'AT' => 'Austria',
                        'AZ' => 'Azerbaijan',
                        'BS' => 'Bahamas',
                        'BH' => 'Bahrain',
                        'BD' => 'Bangladesh',
                        'BB' => 'Barbados',
                        'BY' => 'Belarus',
                        'BE' => 'Belgium',
                        'BZ' => 'Belize',
                        'BJ' => 'Benin',
                        'BM' => 'Bermuda',
                        'BT' => 'Bhutan',
                        'BO' => 'Bolivia',
                        'BA' => 'Bosnia and Herzegovina',
                        'BW' => 'Botswana',
                        'BV' => 'Bouvet Island',
                        'BR' => 'Brazil',
                        'BQ' => 'British Antarctic Territory',
                        'IO' => 'British Indian Ocean Territory',
                        'VG' => 'British Virgin Islands',
                        'BN' => 'Brunei',
                        'BG' => 'Bulgaria',
                        'BF' => 'Burkina Faso',
                        'BI' => 'Burundi',
                        'KH' => 'Cambodia',
                        'CM' => 'Cameroon',
                        'CA' => 'Canada',
                        'CT' => 'Canton and Enderbury Islands',
                        'CV' => 'Cape Verde',
                        'KY' => 'Cayman Islands',
                        'CF' => 'Central African Republic',
                        'TD' => 'Chad',
                        'CL' => 'Chile',
                        'CN' => 'China',
                        'CX' => 'Christmas Island',
                        'CC' => 'Cocos [Keeling] Islands',
                        'CO' => 'Colombia',
                        'KM' => 'Comoros',
                        'CG' => 'Congo - Brazzaville',
                        'CD' => 'Congo - Kinshasa',
                        'CK' => 'Cook Islands',
                        'CR' => 'Costa Rica',
                        'HR' => 'Croatia',
                        'CU' => 'Cuba',
                        'CY' => 'Cyprus',
                        'CZ' => 'Czech Republic',
                        'CI' => 'Côte d’Ivoire',
                        'DK' => 'Denmark',
                        'DJ' => 'Djibouti',
                        'DM' => 'Dominica',
                        'DO' => 'Dominican Republic',
                        'NQ' => 'Dronning Maud Land',
                        'DD' => 'East Germany',
                        'EC' => 'Ecuador',
                        'EG' => 'Egypt',
                        'SV' => 'El Salvador',
                        'GQ' => 'Equatorial Guinea',
                        'ER' => 'Eritrea',
                        'EE' => 'Estonia',
                        'ET' => 'Ethiopia',
                        'FK' => 'Falkland Islands',
                        'FO' => 'Faroe Islands',
                        'FJ' => 'Fiji',
                        'FI' => 'Finland',
                        'FR' => 'France',
                        'GF' => 'French Guiana',
                        'PF' => 'French Polynesia',
                        'TF' => 'French Southern Territories',
                        'FQ' => 'French Southern and Antarctic Territories',
                        'GA' => 'Gabon',
                        'GM' => 'Gambia',
                        'GE' => 'Georgia',
                        'DE' => 'Germany',
                        'GH' => 'Ghana',
                        'GI' => 'Gibraltar',
                        'GR' => 'Greece',
                        'GL' => 'Greenland',
                        'GD' => 'Grenada',
                        'GP' => 'Guadeloupe',
                        'GU' => 'Guam',
                        'GT' => 'Guatemala',
                        'GG' => 'Guernsey',
                        'GN' => 'Guinea',
                        'GW' => 'Guinea-Bissau',
                        'GY' => 'Guyana',
                        'HT' => 'Haiti',
                        'HM' => 'Heard Island and McDonald Islands',
                        'HN' => 'Honduras',
                        'HK' => 'Hong Kong SAR China',
                        'HU' => 'Hungary',
                        'IS' => 'Iceland',
                        'IN' => 'India',
                        'ID' => 'Indonesia',
                        'IR' => 'Iran',
                        'IQ' => 'Iraq',
                        'IE' => 'Ireland',
                        'IM' => 'Isle of Man',
                        'IL' => 'Israel',
                        'IT' => 'Italy',
                        'JM' => 'Jamaica',
                        'JP' => 'Japan',
                        'JE' => 'Jersey',
                        'JT' => 'Johnston Island',
                        'JO' => 'Jordan',
                        'KZ' => 'Kazakhstan',
                        'KE' => 'Kenya',
                        'KI' => 'Kiribati',
                        'KW' => 'Kuwait',
                        'KG' => 'Kyrgyzstan',
                        'LA' => 'Laos',
                        'LV' => 'Latvia',
                        'LB' => 'Lebanon',
                        'LS' => 'Lesotho',
                        'LR' => 'Liberia',
                        'LY' => 'Libya',
                        'LI' => 'Liechtenstein',
                        'LT' => 'Lithuania',
                        'LU' => 'Luxembourg',
                        'MO' => 'Macau SAR China',
                        'MK' => 'Macedonia',
                        'MG' => 'Madagascar',
                        'MW' => 'Malawi',
                        'MY' => 'Malaysia',
                        'MV' => 'Maldives',
                        'ML' => 'Mali',
                        'MT' => 'Malta',
                        'MH' => 'Marshall Islands',
                        'MQ' => 'Martinique',
                        'MR' => 'Mauritania',
                        'MU' => 'Mauritius',
                        'YT' => 'Mayotte',
                        'FX' => 'Metropolitan France',
                        'MX' => 'Mexico',
                        'FM' => 'Micronesia',
                        'MI' => 'Midway Islands',
                        'MD' => 'Moldova',
                        'MC' => 'Monaco',
                        'MN' => 'Mongolia',
                        'ME' => 'Montenegro',
                        'MS' => 'Montserrat',
                        'MA' => 'Morocco',
                        'MZ' => 'Mozambique',
                        'MM' => 'Myanmar [Burma]',
                        'NA' => 'Namibia',
                        'NR' => 'Nauru',
                        'NP' => 'Nepal',
                        'NL' => 'Netherlands',
                        'AN' => 'Netherlands Antilles',
                        'NT' => 'Neutral Zone',
                        'NC' => 'New Caledonia',
                        'NZ' => 'New Zealand',
                        'NI' => 'Nicaragua',
                        'NE' => 'Niger',
                        'NG' => 'Nigeria',
                        'NU' => 'Niue',
                        'NF' => 'Norfolk Island',
                        'KP' => 'North Korea',
                        'VD' => 'North Vietnam',
                        'MP' => 'Northern Mariana Islands',
                        'NO' => 'Norway',
                        'OM' => 'Oman',
                        'PC' => 'Pacific Islands Trust Territory',
                        'PK' => 'Pakistan',
                        'PW' => 'Palau',
                        'PS' => 'Palestinian Territories',
                        'PA' => 'Panama',
                        'PZ' => 'Panama Canal Zone',
                        'PG' => 'Papua New Guinea',
                        'PY' => 'Paraguay',
                        'YD' => 'People\'s Democratic Republic of Yemen',
                        'PE' => 'Peru',
                        'PH' => 'Philippines',
                        'PN' => 'Pitcairn Islands',
                        'PL' => 'Poland',
                        'PT' => 'Portugal',
                        'PR' => 'Puerto Rico',
                        'QA' => 'Qatar',
                        'RO' => 'Romania',
                        'RU' => 'Russia',
                        'RW' => 'Rwanda',
                        'RE' => 'Réunion',
                        'BL' => 'Saint Barthélemy',
                        'SH' => 'Saint Helena',
                        'KN' => 'Saint Kitts and Nevis',
                        'LC' => 'Saint Lucia',
                        'MF' => 'Saint Martin',
                        'PM' => 'Saint Pierre and Miquelon',
                        'VC' => 'Saint Vincent and the Grenadines',
                        'WS' => 'Samoa',
                        'SM' => 'San Marino',
                        'SA' => 'Saudi Arabia',
                        'SN' => 'Senegal',
                        'RS' => 'Serbia',
                        'CS' => 'Serbia and Montenegro',
                        'SC' => 'Seychelles',
                        'SL' => 'Sierra Leone',
                        'SG' => 'Singapore',
                        'SK' => 'Slovakia',
                        'SI' => 'Slovenia',
                        'SB' => 'Solomon Islands',
                        'SO' => 'Somalia',
                        'ZA' => 'South Africa',
                        'GS' => 'South Georgia and the South Sandwich Islands',
                        'KR' => 'South Korea',
                        'ES' => 'Spain',
                        'LK' => 'Sri Lanka',
                        'SD' => 'Sudan',
                        'SR' => 'Suriname',
                        'SJ' => 'Svalbard and Jan Mayen',
                        'SZ' => 'Swaziland',
                        'SE' => 'Sweden',
                        'CH' => 'Switzerland',
                        'SY' => 'Syria',
                        'ST' => 'São Tomé and Príncipe',
                        'TW' => 'Taiwan',
                        'TJ' => 'Tajikistan',
                        'TZ' => 'Tanzania',
                        'TH' => 'Thailand',
                        'TL' => 'Timor-Leste',
                        'TG' => 'Togo',
                        'TK' => 'Tokelau',
                        'TO' => 'Tonga',
                        'TT' => 'Trinidad and Tobago',
                        'TN' => 'Tunisia',
                        'TR' => 'Turkey',
                        'TM' => 'Turkmenistan',
                        'TC' => 'Turks and Caicos Islands',
                        'TV' => 'Tuvalu',
                        'UM' => 'U.S. Minor Outlying Islands',
                        'PU' => 'U.S. Miscellaneous Pacific Islands',
                        'VI' => 'U.S. Virgin Islands',
                        'UG' => 'Uganda',
                        'UA' => 'Ukraine',
                        'SU' => 'Union of Soviet Socialist Republics',
                        'AE' => 'United Arab Emirates',
                        'GB' => 'United Kingdom',
                        'US' => 'United States',
                        'ZZ' => 'Unknown or Invalid Region',
                        'UY' => 'Uruguay',
                        'UZ' => 'Uzbekistan',
                        'VU' => 'Vanuatu',
                        'VA' => 'Vatican City',
                        'VE' => 'Venezuela',
                        'VN' => 'Vietnam',
                        'WK' => 'Wake Island',
                        'WF' => 'Wallis and Futuna',
                        'EH' => 'Western Sahara',
                        'YE' => 'Yemen',
                        'ZM' => 'Zambia',
                        'ZW' => 'Zimbabwe',
                        'AX' => 'Åland Islands');
            
            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                    switch ($purpose) {
                        case "location":
                            $output = array(
                                "city"           => @$ipdat->geoplugin_city,
                                "state"          => @$ipdat->geoplugin_regionName,
                                "country"        => @$ipdat->geoplugin_countryName,
                                "country_code"   => @$ipdat->geoplugin_countryCode,
                                "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                "continent_code" => @$ipdat->geoplugin_continentCode
                            );
                            break;
                        case "address":
                            $address = array($ipdat->geoplugin_countryName);
                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                $address[] = $ipdat->geoplugin_regionName;
                            if (@strlen($ipdat->geoplugin_city) >= 1)
                                $address[] = $ipdat->geoplugin_city;
                            $output = implode(", ", array_reverse($address));
                            break;
                        case "city":
                            $output = @$ipdat->geoplugin_city;
                            break;
                        case "state":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "region":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "country":
                            $output = @$ipdat->geoplugin_countryName;
                            break;
                        case "countrycode":
                            $output = @$ipdat->geoplugin_countryCode;
                            break;
                    }
                }
            }
            return $output;
            
            /*
             * echo ip_info("Visitor", "Country"); // India
                echo ip_info("Visitor", "Country Code"); // IN
                echo ip_info("Visitor", "State"); // Andhra Pradesh
                echo ip_info("Visitor", "City"); // Proddatur
                echo ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India
                print_r(ip_info("Visitor", "Location")); // Array ( [city] => Proddatur [state] => Andhra Pradesh [country] => India [country_code] => IN [continent] => Asia [continent_code] => AS )
             */
        }    
}
?>
