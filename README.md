KashifSaadat/DirectoryManager
=========

Example
=======

```php
<?php

use KashifSaadat\DirectoryManager\DirectoryManager;

require 'vendor/autoload.php';

$directoryManager = new DirectoryManager();

// CD to new directory
$directoryManager->cd('dir1/subdir');

// CD to new directory
$directoryManager->cd('/tmp');

// Go back to dir1/subdir
$directoryManager->reset();

// Go back to starting directory
$directoryManager->reset();


```