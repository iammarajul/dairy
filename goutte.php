<?php



	require "vendor\autoload.php";
    use Goutte\Client;
    $client = new Client();
    $crawler = $client->request('GET', 'http://www.symfony.com/blog/');
    $client->getClient()->setDefaultOption('config/curl/'.CURLOPT_TIMEOUT, 60);
    $link = $crawler->selectLink('Security Advisories')->link();
	$crawler = $client->click($link);
	// Get the latest post in this category and display the titles
	$crawler->filter('h2 > a')->each(function ($node) {
    	echo $node->text()."\n";
	});
?>