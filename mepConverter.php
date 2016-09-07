<?php
/**
 * mepConverter.php
 * greyowl
 * 07/09/16 2:02 AM 2016 09 07 02 02 srt
 */


namespace Captioning;
use Captioning\Converter;
use Captioning\Format\SubripFile;
use Captioning\Format\mepSubripFile;
use Captioning\Format\SubripCue;
use Captioning\Format\mepSubripCue;

use Captioning\Format\TtmlFile;
use Captioning\Format\WebvttFile;
use Captioning\Format\SubstationalphaFile;
use Captioning\Format\SubstationalphaCue;

class mepConverter extends Converter
{
    public static function mepsubrip2cliptext(SubripFile $_srt)
    {
        foreach ($_srt->getCues() as $cue) {
            var_dump($cue);
        }


    }
}