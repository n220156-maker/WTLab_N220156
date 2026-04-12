<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
$client = new Google\Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URL);
$client->addScope("email");
$client->addScope("profile");


$googleLoginUrl = $client->createAuthUrl();


$githubLoginUrl = 'https://github.com/login/oauth/authorize?client_id=' . GITHUB_CLIENT_ID . '&redirect_uri=' . urlencode(GITHUB_REDIRECT_URL) . '&scope=user';
?>

