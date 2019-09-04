<?php

$filelink = $_GET['url'];
$Q = $_GET['q'];
if (strpos($filelink, "redflixiptv.") !== false)
  {

  // https://www.fembed.com/v/4lo0jr-px9q
  // $ua = player user_agent !!!!

  if ($flash == "flash") $ua = $_SERVER['HTTP_USER_AGENT'];
    else
    {
    $ua = 'Mozilla/5.0(Linux;Android 7.1.2;ro;RO;MXQ-4K Build/MXQ-4K) MXPlayer/1.8.10';
    $ua = 'Mozilla/5.0(Linux;Android 10.1.2) MXPlayer';
    }

  preg_match("/v\/([\w\-]*)/", $filelink, $m);
  $id = $m[1];
  $l = "https://www.fembed.com/api/source/" . $id;
  $post = "r=";
  $url = $l;
  $data = array(
    'r' => ''
  );
  $options = array(
    'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data) ,
    )
  );
  $context = stream_context_create($options);
  $h3 = @file_get_contents($url, false, $context);
  $r = json_decode($h3, 1);
  }
  
$stt = $r["data"];
$HD =  $stt[1]["file"];
$SD =  $stt[0]["file"];
$qd = "HD";
$qs = "SD";
if ($Q == $qd)
{
  
$h7 = get_headers($HD,1);
 $linko = $h7["Location"];
 header("Location: $linko");
  
}

if ($Q == $qs)
{
$h8 = get_headers($SD,1);
 $linkd = $h8["Location"];
 header("Location: $linkd");
}


?>
