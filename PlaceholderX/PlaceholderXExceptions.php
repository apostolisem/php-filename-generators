<?php

namespace PlaceholderX\Exceptions;

use Exception;

class UnsupportedExtensionException extends Exception { 

        // custom output of thrown exception
        public function __toString() {
            return "{$this->code}: {$this->message}\r\n";
        }
    
 }