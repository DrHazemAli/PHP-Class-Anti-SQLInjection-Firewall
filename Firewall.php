<?php
/*
 * PHP FIREWALL CLASS ------------------------------
 * WRITTEN BY : DR. HAZEM ALI
 * FACEBOOK : HTTPS://WWW.FB.COM/HAZ4M
 * COPYRIGHTS 2017, HAZEM ALI, ALL RIGHTS RESERVED
 * -------------------------------------------------
*/
Class Firewall
  {
    public function SecureUris()
      {
          // get the current url
          $inurl = $_SERVER['REQUEST_URI'];
          if (preg_match("#select|update|delete|concat|create|table|union|length|show_table|mysql_list_tables|mysql_list_fields|mysql_list_dbs#i", $inurl))
          {
            exit($this->SecurityWarningTemplate());
          }
           $securityUlrs_url = $_SERVER['QUERY_STRING'];
           if ($securityUlrs_url != '' AND !preg_match("/^[_a-zA-Z0-9-=&]+$/", $securityUlrs_url))
           {
            exit($this->SecurityWarningTemplate());
           }
           return true;
      }

    public function getClean($txt){
        $txt = htmlspecialchars($txt);
        $txt = str_replace("select","5ev1ect",$txt);
        $txt = str_replace("update","upd4tee",$txt);
        $txt = str_replace("insert","1dn5yert",$txt);
        $txt = str_replace("where","w6eere",$txt);
        $txt = str_replace("like","1insk",$txt);
        $txt = str_replace("or","08r",$txt);
        $txt = str_replace("and","4nd",$txt);
        $txt = str_replace("set","5eut",$txt);
        $txt = str_replace("into","1n8t0",$txt);
        $txt = str_replace("'", "", $txt);
        $txt = str_replace(";", "", $txt);
        $txt = str_replace(">", "", $txt);
        $txt = str_replace("<", "", $txt);
        $txt = strip_tags($txt);
        return $txt;
    }

    public function get_ip()
     {
           if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
           }
           elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
                 $ip = $_SERVER['HTTP_CLIENT_IP'];
           }
           else {
                 $ip = $_SERVER['REMOTE_ADDR'];
           }
           return $ip;
     }

    public function SecurityWarningTemplate()
      {
        $x = '
        <html>
        <head>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <style>
        .html, body, h1,h2,p {
        font-family: "Ubuntu", sans-serif;
        }
        </style>
        <title>Access Denied</title>
        </head>
        <body>
        <br>
        <h2 style="text-align: center;"><span style="color: #ff0000;"><strong>Security Warning!</strong></span></h2>
        <p style="text-align: center;"><span style="color: #800080;"><strong>The requested URL is not safe.<br /><br /></strong><span style="color: #808080;">Our System developed to observ such these operations, Please DO NOT perform these operations once again!</span></span></p>
        <p style="text-align: center;"><span style="color: #800080;">Your IP : {IP}</span></p>
        </body>
        </html>';
        return str_replace("{IP}", $this->get_ip(), $x);
      }
  }

 ?>
