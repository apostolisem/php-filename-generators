<?php

namespace PlaceholderX;

require_once ('FileNameGeneratorInterface.php');
require_once ('PlaceholderXExceptions.php');

use PlaceholderX\FileNameGeneratorInterface;
use PlaceholderX\Exceptions\UnsupportedExtensionException as ExtNotSupported;

class RandomFileNameGenerator implements FileNameGeneratorInterface
{
    /* @var int */
    private $lengh;
    /* @var string */
    private $allowedCharacters;
    /* @var string */
    private $randomName;
    /* @var string */
    private $extension;
    /* @var array */
    private $supportedExt = [
        self::DEFAULT_EXTENSIONS,
        'csv',
    ];


    /**
     * construct RandomFileNameGenerator class
     */
    public function __construct(int $lengh = 10, string $allowedCharacters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz")
    {
        $this->randomName = '';
        $this->lengh = $lengh;
        $this->allowedCharacters = $allowedCharacters;
        $this->extension = self::DEFAULT_EXTENSIONS;
    }

    /**
     * return the generated filename
     * @return string
     */
    public function getName(): string
    {
        for($i = 0; $i < $this->lengh; $i++) {
            $rand = rand(0, strlen($this->allowedCharacters) - 1);
            $this->randomName .= substr($this->allowedCharacters, $rand, 1);
        }

        return $this->randomName;
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



