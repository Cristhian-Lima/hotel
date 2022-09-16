<?php

namespace Entities;

use JsonSerializable;

/**
 * Class Entitie
 * @author Felicidad Hilari
 */
abstract class Entitie implements JsonSerializable
{
  abstract public function jsonSerialize(): array;
}
