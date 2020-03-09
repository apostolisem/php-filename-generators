<?php

namespace PlaceholderX;

require ('./PlaceholderX/DateBasedFileNameGenerator.php');
require ('./PlaceholderX/SequenceBasedFileNameGenerator.php');
require ('./PlaceholderX/RandomFileNameGenerator.php');

// example #1 - date based generator
$generator = new DateBasedFileNameGenerator('Ymd_His');
echo $generator->get(); // 20160101_120000.txt

// example #2 - date based generator with different extension
$generator = new DateBasedFileNameGenerator('Ymd_His');
echo $generator->setExtension('csv')->get(); // 20160101_120000.csv

// example #3 - file with default extension
$generator = new SequenceBasedFileNameGenerator();
echo $generator->get(); // 1.txt

// example #4 - file 2 with extension csv
echo $generator->setExtension('csv')->get(); // 2.csv

// example #5 - start from another number
$generator = new SequenceBasedFileNameGenerator(5);
echo $generator->get(); // 5.txt

// example #6 - continue from last sequence
echo $generator->get(); // 6.txt

// example #7 - random alphanumeric name generator
$generator = new RandomFileNameGenerator();
echo $generator->get(); // j4PqgXZMpl.txt

// example #8 - random alphanumeric name generator, lengh 20 chars
$generator = new RandomFileNameGenerator(20);
echo $generator->get(); // Ze6prI4g5L9bWKV8OAm0.txt

// example #9 - random numeric name generator, lengh 30 chars
$generator = new RandomFileNameGenerator(30, "0123456789");
echo $generator->get(); // 290936161759379634845111413255.txt

// example #10 - unsupported extension, exception thrown
$generator = new DateBasedFileNameGenerator('Ymd_His');
echo $generator->setExtension('pdf')->get();