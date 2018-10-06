<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__.'/chatfuel.php';
require_once __DIR__ . '/config.php';
$url =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
define('SCOPES', implode(' ', array(
  Google_Service_Drive::DRIVE_METADATA_READONLY)
));

function getClient() {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfig(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
  if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
  } else {
    // Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    printf("Open the following link in your browser: <a href='%s' target='_blank'>Click</a></br>", $authUrl);
    print "Enter verification code: <form> <input type='text' name='authcode' /> <input type='submit' value='Send'/></form>";
    if (isset($_GET['authcode']))
    {
      $authCode = $_GET['authcode'];
      echo "<script type='text/javascript'>
					// Load one times
					(function()
					{
					  if( window.localStorage )
					  {
					    if( !localStorage.getItem('firstLoad') )
					    {
					      localStorage['firstLoad'] = true;
					      window.location.reload();
					    }  
					    else
					      localStorage.removeItem('firstLoad');
					  }
					})();
					
				</script>";
    }
      
    
    // Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
  }
  $client->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
  }
  return $client;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');
  if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
  }
  return str_replace('~', realpath($homeDirectory), $path);
}

// Get the API client and construct the service object.
// Main code ^^
$client = getClient();
$service = new Google_Service_Drive($client);
$query = $q." and name contains "."'". $_GET['q'] ."'";
// echo $query;
// Print the names and IDs for up to 40 files.
$optParams = array(
  'pageSize' => 40,
  'fields' => 'nextPageToken, files(id, name)',
  'orderBy' => 'folder',
  'q' => $query
);
$results = $service->files->listFiles($optParams);
$data = array();
$i = 0;
if (count($results->getFiles()) == 0) {
  sendText("NO FILE FOUND!");
} else {
    
  foreach ($results->getFiles() as $file) {
    $check = array();
    $data[$i]['name'] = $file->getName();
    $check = explode(".",$file->getId());
    if (count($check) == 1) {
      $data[$i]['link'] = "https://drive.google.com/open?id=".$file->getId();
      $i++;
    }
    if (count($check) == 2){
      $data[$i]['link'] = "https://drive.google.com/drive/folders/".$file->getId();
      $i++;
    }
   
  }
};
if (isset($_GET['id'])){
  $id = (int)$_GET['id'];
}else $id = 0;

if ($id >= count($data)){
  if(isset($_GET['id']))
    sendText("Hết rùi. Đừng bấm nữa @@");
}else {
  sendButton("Tên: ".$data[$id]['name'], $data[$id]['link'], $url."?q=".$_GET['q']. "&id=".++$id);
}

