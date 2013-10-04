<?php

/*
 * This software is the property of its authors.
 * See the copyright.txt file for more details.
 *
 */

spl_autoload_register(function ($class) {
  $file = __DIR__ . "/$class.php";
  if (is_file($file))
    require_once $file;
});
