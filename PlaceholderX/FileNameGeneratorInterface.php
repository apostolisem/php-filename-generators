<?php

namespace PlaceholderX;

use PlaceholderX\Exceptions\UnsupportedExtensionException;

interface FileNameGeneratorInterface
{
    public const DEFAULT_EXTENSIONS = 'txt';

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $extension
     * @return FileNameGeneratorInterface
     * @throws UnsupportedExtensionException
     */
    public function setExtension(string $extension): self;
}