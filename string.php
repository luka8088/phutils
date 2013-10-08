<?php

/*
 * This software is the property of its authors.
 * See the copyright.txt file for more details.
 *
 */

class string {

  protected $value = '';

  function __construct ($value) {
    if ($value instanceof self)
      $this->value = toRaw($value);
    else
      $this->value = $value;
  }

  function toString () {
    return $this->value;
  }

  function toRaw () {
    return $this->value;
  }

  function opEquals ($value) {
    return $this->value === toString($value);
  }

}
