<?php
/**
 * 簡単名刺読込
 * 2018/09/10 K.Ono <kenji0302@gmail.com>
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //入力ページ
    require('entry.php');
    exit();
}

if(!$_FILES['file']){
    //ファイルなし
    print('file not found.');
    exit(1);
}

//OCR処理
require "config.php";
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Language\LanguageClient;
use Google\Cloud\Vision\VisionClient;

$path = $_FILES['file']['tmp_name'];

$language = new LanguageClient([
    'projectId' => $projectId
]);

$text =  detect_text($projectId, $path);

$entities = analyze_entities($text, $projectId);

$result = [];
foreach ($entities as $entity) {

    if($entity['type']=="PERSON") {
        $result['name'][] = $entity['name'];
        continue;
    }
    if($entity['type']=="LOCATION") {
        $result['location'][] = $entity['name'];
        continue;
    }
    if(filter_var($entity['name'], FILTER_VALIDATE_EMAIL)){
        $result['email'][] = $entity['name'];
        continue;
    }
    if(filter_var($entity['name'], FILTER_VALIDATE_URL)){
        $result['url'][] = $entity['name'];
        continue;
    }
}

require('result.php');

/**
 * OCR
 * @param $projectId
 * @param $path
 * @return mixed
 */
function detect_text($projectId, $path)
{
    $vision = new VisionClient([
        'projectId' => $projectId,
    ]);
    $image = $vision->image(file_get_contents($path), ['TEXT_DETECTION']);
    $result = $vision->annotate($image);
    return $result->text()[0]->description();

}

/**
 * Text分類
 * @param $text
 * @param null $projectId
 */
function analyze_entities($text, $projectId = null)
{
    $language = new LanguageClient([
        'projectId' => $projectId,
    ]);
    $annotation = $language->analyzeEntities($text);
    return $annotation->entities();

}
