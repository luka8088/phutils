<?php

/*
 * This software is the property of its authors.
 * See the copyright.txt file for more details.
 *
 */

class password {

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
      return $value->opEquals($this);
    return opEquals($this->value, $value);
  }

  function hash () {
    $salt = uniqueId();
    return new passwordHash(self::_hash($this->value, $salt));
  }

  static function _hash ($value, $salt) {
    return 'sha1:' . sha1(toString($value) . $salt) . '/' . $salt;
  }

  final static function unittest_password () {

    $password1raw = uniqueId();
    $password2raw = uniqueId();

    $password1 = new password($password1raw);
    $hashed = $password1->hash();

    assertEqual($hashed, $password1);
    assertEqual($hashed, $password1raw);
    assertNotEqual($hashed, $password2raw);

  }

}
