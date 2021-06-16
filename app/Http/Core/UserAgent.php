<?php

namespace App\Http\Core;

class UserAgent
{
   public function agent()
   {
      $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
      if (preg_match("/abrowse\/|acoo browser\/|america online browser\/|amigavoyager\/|aol\/|arora\/|avant browser\/|beonex\/|bonecho\/|browzar\/|camino\/|charon\/|cheshire\/|chimera\/|cirefox\/|chrome\/|chromeplus\/|classilla\/|cometbird\/|comodo_dragon\/|conkeror\/|crazy browser\/|cyberdog\/|deepnet explorer\/|deskbrowse\/|dillo\/|dooble\/|element browser\/|elinks\/|enigma browser\/|enigmafox\/|epiphany\/|escape\/|firebird\/|firefox\/|fireweb navigator\/|flock\/|fluid\/|galaxy\/|galeon\/|granparadiso\/|greenbrowser\/|hana\/|hotjava\/|ibm webexplorer\/|ibrowse\/|icab\/|iceape\/|icecat\/|iceweasel\/|inet browser\/|internet explorer\/|irider\/|iron\/|k-meleon\/|k-ninja\/|kapiko\/|kazehakase\/|kindle browser\/|kkman\/|kmlite\/|konqueror\/|leechcraft\/|links\/|lobo\/|lolifox\/|lorentz\/|lunascape\/|lynx\/|madfox\/|maxthon\/|midori\/|minefield\/|mozilla\/|myibrow\/|myie2\/|namoroka\/|navscape\/|ncsa_mosaic\/|netnewswire\/|netpositive\/|netscape\/|netsurf\/|omniweb\/|opera\/|orca\/|oregano\/|osb-browser\/|palemoon\/|phoenix\/|pogo\/|prism\/|qtweb internet browser\/|rekonq\/|retawq\/|rockmelt\/|safari\/|seamonkey\/|shiira\/|shiretoko\/|sleipnir\/|slimbrowser\/|stainless\/|sundance\/|sunrise\/|surf\/|sylera\/|tencent traveler\/|tenfourfox\/|theworld browser\/|uzbl\/|vimprobable\/|vonkeror\/|w3m\/|weltweitimnetzbrowser\/|worldwideweb\/|wyzo\//", $user_agent)) {
         $user = "PC";
      } elseif (preg_match("/phone|iphone|itouch|ipod|symbian|kyocera|handspring|android|android webkit browser|blackberry|blazer|bolt|browser for s60|doris|dorothy|fennec|go browser|ie mobile|iris|maemo browser|mib|minimo|netfront|opera mini|opera mobile|semc-browser|skyfire|teashark|teleca-obigo|uzard web|epoc|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|mobile|pda;|avantgo|eudoraweb|minimo|smartphone|netfront|motorola|mmp|opwv|playstation portable|brew|teleca|lg;|lge |wap;| wap|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent)) {
         $user = "Mobile";
      } elseif (preg_match("/rambler|008|abachobot|accoona-ai-agent|addsugarspiderbot|anyapexbot|arachmo|b-l-i-t-z-b-o-t|baiduspider|becomebot|beslistbot|billybobbot|bimbot|bingbot|blitzbot|boitho.com-dc|boitho.com-robot|btbot|catchbot|cerberian drtrs|charlotte|converacrawler|cosmos|covario ids|dataparksearch|diamondbot|discobot|dotbot|earthcom.info|emeraldshield.com webbot|envolk[its]spider|esperanzabot|exabot|fast enterprise crawler|fast-webcrawler|fdse robot|findlinks|furlbot|fyberspider|g2crawler|gaisbot|galaxybot|geniebot|gigabot|girafabot|googlebot|googlebot-image|gurujibot|happyfunbot|hl_ftien_spider|holmes|htdig|iaskspider|ia_archiver|iccrawler|ichiro|igdespyder|irlbot|issuecrawler|jaxified bot|jyxobot|koepabot|l.webis|lapozzbot|larbin|ldspider|lexxebot|linguee bot|linkwalker|lmspider|lwp-trivial|mabontland|magpie-crawler|mediapartners-google|mj12bot|mlbot|mnogosearch|mogimogi|mojeekbot|moreoverbot|morning paper|msnbot|msrbot|mvaclient|mxbot|netresearchserver|netseer crawler|newsgator|ng-search|nicebot|noxtrumbot|nusearch spider|nutchcvs|nymesis|obot|oegp|omgilibot|omniexplorer_bot|oozbot|orbiter|pagebiteshyperbot|peew|polybot|pompos|postpost|psbot|pycurl|qseero|radian6|rampybot|rufusbot|sandcrawler|sbider|scoutjet|scrubby|searchsight|seekbot|semanticdiscovery|sensis web crawler|seochat::bot|seznambot|shim-crawler|shopwiki|shoula robot|silk|sitebot|snappy|sogou spider|sosospider|speedy spider|sqworm|stackrambler|suggybot|surveybot|synoobot|teoma|terrawizbot|thesubot|thumbnail.cz robot|tineye|truwogps|turnitinbot|tweetedtimes bot|twengabot|updated|urlfilebot|vagabondo|voilabot|vortex|voyager|vyu2|webcollage|websquash.com|wf84|wofindeich robot|womlpefactory|xaldon_webspider|yacy|yahoo! slurp|yahoo! slurp china|yahooseeker|yahooseeker-testing|yandexbot|yandeximages|yandexmetrika|yasaklibot|yeti|yodaobot|yooglifetchagent|youdaobot|zao|zealbot|zspider|zyborg|yahoo|abachobot|accoona|aciorobot|aspseek|cococrawler|dumbot|geonabot|lycos|scooter|altavista|idbot|estyle|adsbot|yahoobot|watchmouse|pingdom\.com/", $user_agent)) {
         $user = "Web-Bot";
      } elseif (preg_match("/abilogicbot|link valet|link validity check|linkexaminer|linksmanager.com_bot|mojoo robot|notifixious|online link validator|ploetz + zeller|reciprocal link system pro|rel link checker lite|sitebar|vivante link checker|w3c-checklink|xenu link sleuth/", $user_agent)) {
         $user = "Link-Bot";
      } elseif (preg_match("/awasu|bloglines|everyfeed-spider|feedfetcher-google|greatnews|gregarius|magpierss|nfreader|universalfeedparser/", $user_agent)) {
         $user = "Feed-Bot";
      }

      if (is_null($user)) {
         $user = "Unknown Device";
      }

      return $user;
   }


   public function ip()
   {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
         $address = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
         $address = $_SERVER['REMOTE_ADDR'];
      } elseif ($_SERVER['SERVER_ADDR'] === "::1") {
         $address = "127.0.0.1:8000";
      }

      if ($address === "::1") {
         $ip = "127.0.0.1:8000";
      } else {
         $ip = $address;
      }

      return $ip;
   }


   public function host()
   {
      return gethostbyaddr($this->ip());
   }


   public function os()
   {
      $user_agent    = $_SERVER['HTTP_USER_AGENT'];
      $os_platform   = "Bilinmeyen İşletim Sistemi";
      $os_array      = array(
         '/windows nt 10/i'      =>  'Windows 10',
         '/windows nt 6.3/i'     =>  'Windows 8.1',
         '/windows nt 6.2/i'     =>  'Windows 8',
         '/windows nt 6.1/i'     =>  'Windows 7',
         '/windows nt 6.0/i'     =>  'Windows Vista',
         '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
         '/windows nt 5.1/i'     =>  'Windows XP',
         '/windows xp/i'         =>  'Windows XP',
         '/windows nt 5.0/i'     =>  'Windows 2000',
         '/windows me/i'         =>  'Windows ME',
         '/win98/i'              =>  'Windows 98',
         '/win95/i'              =>  'Windows 95',
         '/win16/i'              =>  'Windows 3.11',
         '/macintosh|mac os x/i' =>  'Mac OS X',
         '/mac_powerpc/i'        =>  'Mac OS 9',
         '/linux/i'              =>  'Linux',
         '/ubuntu/i'             =>  'Ubuntu',
         '/iphone/i'             =>  'iPhone',
         '/ipod/i'               =>  'iPod',
         '/ipad/i'               =>  'iPad',
         '/android/i'            =>  'Android',
         '/blackberry/i'         =>  'BlackBerry',
         '/webos/i'              =>  'Mobile'
      );

      foreach ($os_array as $regex => $value) {
         if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
         }
      }
      return $os_platform;
   }


   public function browser()
   {
      $user_agent    = $_SERVER['HTTP_USER_AGENT'];
      $browser       = "Bilinmeyen Tarayıcı";
      $browser_array = array(
         '/msie/i'       =>  'Internet Explorer',
         '/firefox/i'    =>  'Mozila Firefox',
         '/safari/i'     =>  'Safari',
         '/chrome/i'     =>  'Google Chrome',
         '/edge/i'       =>  'Mircosoft Edge',
         '/opera/i'      =>  'Opera',
         '/netscape/i'   =>  'Netscape',
         '/maxthon/i'    =>  'Maxthon',
         '/konqueror/i'  =>  'Konqueror',
         '/mobile/i'     =>  'Handheld Browser'
      );

      foreach ($browser_array as $regex => $value) {
         if (preg_match($regex, $user_agent)) {
            $browser = $value;
         }
      }

      $explodeAgent  = explode(' ', $user_agent);
      $version       = explode('/', end($explodeAgent));
      return $browser . ' ' . end($version);
   }
}
