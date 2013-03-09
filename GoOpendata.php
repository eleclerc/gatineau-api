<?php

require __DIR__ . '/vendor/autoload.php';

/**
 *
 * @TODO stop using opendatasource.json and scrape links from website to have latest data
 */

$apiVersion = 'v1';
$dataset = array();

$available = json_decode(file_get_contents('opendatasource.json'), true);
$browser = new Buzz\Browser();

foreach ($available as $key => $val) {
	$response = $browser->get($val);
	if ($response->isSuccessful()) {
		$xmlStringContents = $response->getContent();
		$jsonContents = Zend\Json\Json::fromXml($xmlStringContents, true);
		$prettyJsonContents = Zend\Json\Json::prettyPrint($jsonContents);
		$filename = $key . '.json';
		file_put_contents(__DIR__ . '/' . $apiVersion . '/' . $filename, $prettyJsonContents);

		$dataset[$key] = array(
			'nom' => $key,
			'mise-a-jour' => '',
			'url' => $apiVersion . '/' . $filename,
			'description' => '',
			'proprietaire' => '',
			'frequence-mise-a-jour' => '',
			'lien-site-web' => '',
			'mots-cles' => ''
		);
	} else {
		echo 'Erreur avec feed: ' . $key . PHP_EOL;
	}
}

file_put_contents(__DIR__ . '/' . $apiVersion . '/liste.json', json_encode($dataset, JSON_PRETTY_PRINT));
