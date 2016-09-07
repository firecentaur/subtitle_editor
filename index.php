<?php
/**
 * index.php
 * greyowl
 * 07/09/16 12:13 AM 2016 09 07 00 13 srt
 */
require __DIR__ . '/vendor/autoload.php';
use Captioning\Format\SubripFile;
use Captioning\Format\WebvttFile;

echo "Srt";

try {
    $srt = new mepSubripFile('2001.srt',NULL,FALSE,FALSE);
    $srt->convertTo('cliptext')->save('my_subs.vtt');
} catch(Exception $e) {
    echo "Error: ".$e->getMessage()."\n";
}