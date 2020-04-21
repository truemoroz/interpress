<?php

use ParagonIE\EasyDB\Factory;

require_once 'vendor/autoload.php';

// соединяемся с базой и получаем данные
$db = Factory::fromArray([
    'mysql:host=localhost;dbname=interpress',
    'root',
    'root'
]);

$sql = 'SELECT gm.url, gme.year, gmp.url AS city FROM gallery_motorshow gm
INNER JOIN gallery_motorshow_events gme ON gm.event_id = gme.id
INNER JOIN gallery_motorshow_places gmp ON gm.place_id = gmp.id';

$rows = $db->run($sql);

// создаём xml-документ
$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$xml_file_name = 'sitemap.xml';

$urlset = $dom->createElement('urlset');
$urlset->setAttributeNode(new DOMAttr('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9'));
$dom->appendChild($urlset);

// наполняем документ элементами
foreach ($rows as $row) {
    $url = $dom->createElement('url');
    $loc = $dom->createElement('loc', 'https://site.com/' . $row['city'] . '/' . $row['year'] . '/' . $row['url'] . '/');
    $url->appendChild($loc);
    $changefreq = $dom->createElement('changefreq', 'weekly');
    $url->appendChild($changefreq);
    $priority = $dom->createElement('priority', '0.80');
    $url->appendChild($priority);

    $urlset->appendChild($url);
}
//записываем документа в файл
$dom->save($xml_file_name);
