<?PHP


  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
/*
  $url = "http://mycamgirl.net/myfreecams/model/AwesomeKate";
  $input = file_get_contents($url) or die("Could not access file: $url");
  
  echo $input;
  //$regexp = "is offline";
  //if(preg_match_all("/$regexp/siU", $input)) {
    // $matches[2] = array of link addresses
    // $matches[3] = array of link text - including HTML code
  //}
  */
  
  function webpage2txt($url) {
    $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
 
    $ch = curl_init();    // initialize curl handle
    curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);              // Fail on errors
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_PORT, 80);            //Set the port number
    curl_setopt($ch, CURLOPT_TIMEOUT, 15); // times out after 15s
 
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
 
    $document = curl_exec($ch);
 
 /*
    $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<![\s\S]*?–[ \t\n\r]*>@',         // Strip multi-line comments including CDATA
        '/\s{2,}/',
    );
 
    $text = preg_replace($search, "\n", html_entity_decode($document));
 
    $pat[0] = "/^\s+/";
    $pat[2] = "/\s+\$/";
    $rep[0] = "";
    $rep[2] = " ";
 
    $text = preg_replace($pat, $rep, trim($text));
 */
 	$text = html_entity_decode($document);
    return $text;
}
 
//echo webpage2txt("http://mycamgirl.net/myfreecams/model/AwesomeKate");
//$url = "http://mycamgirl.net/myfreecams/model/AwesomeKate";
$url = "http://profiles.myfreecams.com/AwesomeKate";
$input = webpage2txt($url);
$regexp = ":\"Offline\"";

  if(preg_match_all("/$regexp/siU", $input)) {
     //echo "Found Regex: $regexp";
	 header("Location: http://profiles.myfreecams.com/AwesomeKate");
  } else {
	 // echo "Didn't find Regex: $regexp";
	  header("Location: http://myfreecams.com/#AwesomeKate");
  }
exit();
?>