<?php

require __DIR__ . '/vendor/autoload.php';

$available = json_decode(file_get_contents('opendatasource.json'), true);
$browser = new Buzz\Browser();

foreach ($available as $key => $val) {
	$response = $browser->get($val);
	if ($response->isSuccessful()) {
		$xmlStringContents = $response->getContent();
		$jsonContents = Zend\Json\Json::fromXml($xmlStringContents, true);
		$prettyJsonContents = Zend\Json\Json::prettyPrint($jsonContents);
		file_put_contents(__DIR__ . '/v1/' . $key . '.json', $prettyJsonContents);
	} else {
		echo 'Erreur avec feed: ' . $key . PHP_EOL;
	}
}
