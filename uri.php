<?php

/*
 * This software is the property of its authors.
 * See the copyright.txt file for more details.
 *
 */

class uri {

  static function cleanPath ($path) {
    version_assert and assertTrue(isString($path) && strlen($path) > 0);

    if (opEquals($path, '.') || opEquals($path, '..'))
      return $path;

    $parts = explode('/', $path);
    foreach ($parts as $k => $v)
      switch ($v) {
        case '':
          if ($k > 0)
            unset($parts[$k]);
          break;
        case '.':
          unset($parts[$k]);
          break;
        case '..':
          unset($parts[$k]);
          $i = $k - 1;
          while ($i >= 0 && !isset($parts[$i]))
            $i--;
          if ($i >= 0)
            unset($parts[$i]);
          break;
      }

    $newPath = implode('/', $parts);
    if ($newPath == '' || substr($path, -1) == '/')
      $newPath .= '/';
      $newPath = preg_replace('/\\/+/', '/', $newPath);

    return $newPath;
  }

  static function unittest_cleanPath () {
    assertTrue(self::cleanPath('.') === '.');
    assertTrue(self::cleanPath('..') === '..');
    assertTrue(self::cleanPath('/test/a/b/.././../first') === '/test/first');
  }

}
