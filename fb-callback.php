<?php

require_once "config.php";


try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

    // Logged in

$oAuth2Client = $FB->getOAuth2Client();
    
if (!$accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exception\SDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }
}

$response = $FB->get("/me?fields=id,name,email", $accessToken);

$userData = $response->getGraphNode()->asArray();

var_dump($userData);

$_SESSION['userData'] = $userData;
$_SESSION['access_token']  = (string) $accessToken;
header("Location: index.php");

?>