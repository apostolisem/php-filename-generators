<?php

namespace PlaceholderX;

require_once ('FileNameGeneratorInterface.php');
require_once ('PlaceholderXExceptions.php');

use PlaceholderX\FileNameGeneratorInterface;
use PlaceholderX\Exceptions\UnsupportedExtensionException as ExtNotSupported;

class DateBasedFileNameGenerator implements FileNameGeneratorInterface
{
    /* @var string */
    private $format;
    /* @var string */
    private $extension;
    /* @var array */
    private $supportedExt = [
        self::DEFAULT_EXTENSIONS,
        'csv',
    ];

    /**
     * construct DateBasedFileNameGenerator class
     */
    public function __construct($format)
    {
        $this->format = $format;
        $this->extension = self::DEFAULT_EXTENSIONS;
    }

    /**
     * return the generated filename
     * @return string
     */
    public function getName(): string
    {
        return date($this->format);
    }

    /**
     * set the extension, if not supported throw exception
     * @param string $extension
     * @return FileNameGeneratorInterface
     * @throws UnsupportedExtensionException
     */
    public function setExtension(string $extension): FileNameGeneratorInterface
    {
        if (in_array($extension, $this->supportedExt)) {
            $this->extension = $extension;
        } else {
            throw new ExtNotSupported("The Extension " . $extension . " is not supported.", 1);
        }

        return $this;
    }

    /**
     * output the generated filename
     * @return string
     */
    public function get()
    {
        return $this->getName() . '.' . $this->extension . "\r\n";
    }
}



