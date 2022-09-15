<?php

namespace Tools;

class HashTool
{
  const HASH = PASSWORD_DEFAULT;
  const COST = 10;

  /**
   * Encripta una palabra con el algoritmo de cifrado
   * que viene por defecto
   * 
   * @param string $word    Palabra a encriptar.
   * @return string
   */
  static public function hash(String $word)
  {
    return password_hash($word, self::HASH, ['cost' => self::COST]);
  }

  /**
   * Verifica la contraseña si es igual al hash encriptado.
   * 
   * @param string $word
   * @param string $hash
   * @return boolean
   */
  static function verify(String $word, String $hash)
  {
    return password_verify($word, $hash);
  }
}
