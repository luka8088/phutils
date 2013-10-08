<?php

/*
 * This software is the property of its authors.
 * See the copyright.txt file for more details.
 *
 */

class passwordHash {

  protected $value = '';

  function __construct ($value) {
    if ($value instanceof self)
      $this->value = toString($value);
    else
      $this->value = $value;
  }

  function toString () {
    return $this->value;
  }

  function opEquals ($value) {
    if ($value instanceof passwordHash)
      return opEquals($this->value, $value);
    version_assert and assertTrue(strpos(toString($this->value), '/') !== false);
    $salt = substr(toString($this->value), strpos(toString($this->value), '/') + 1);
    return opEquals($this->value, password::_hash($value, $salt));
  }

}
