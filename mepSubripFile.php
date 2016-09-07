<?php
/**
 * mepSubripFile.php
 * greyowl
 * 07/09/16 1:59 AM 2016 09 07 01 59 srt
 */

namespace Captioning\Format;



use Captioning\mepConverter;

class mepSubripFile extends SubripFile {
    /**
     * @param string $_output_format
     * @return mixed
     */
    public function convertTo($_output_format)
    {
        $fileFormat = self::getFormat($this);
        $method     = strtolower($fileFormat).'2'.strtolower(rtrim($_output_format, 'File'));

        if (method_exists(new mepConverter(), $method)) {
            return mepConverter::$method($this);
        }
        return mepConverter::defaultConverter($this, $_output_format);
    }

    public function addCue($_mixed, $_start = null, $_stop = null)
    {
        $fileFormat = self::getFormat($this);

        // if $_mixed is a Cue
        if (is_object($_mixed) && class_exists(get_class($_mixed)) && class_exists(__NAMESPACE__.'\Cue') && is_subclass_of($_mixed, __NAMESPACE__.'\Cue')) {
            $cueFormat = Cue::getFormat($_mixed);
            if ($cueFormat !== $fileFormat) {
                throw new \Exception("Can't add a $cueFormat cue in a $fileFormat file.");
            }
            $_mixed->setLineEnding($this->lineEnding);
            $this->cues[] = $_mixed;
        } else {
            $cueClass = self::getExpectedCueClass($this);
            $cue = new $cueClass($_start, $_stop, $_mixed);
            $cue->setLineEnding($this->lineEnding);
            $this->cues[] = $cue;
        }

        return $this;
    }
}