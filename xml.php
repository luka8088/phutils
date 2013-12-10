<?php

/*
 * This software is the property of its authors.
 * See the copyright.txt file for more details.
 *
 */

class xml {
  
  static function encode ($string) {
    return htmlspecialchars($string);
  }
  
  static function decode ($string) {
    return html_entity_decode($string);
  }

}

