<?php

declare(strict_types=1);

namespace Http;

/**
 * Class BodyResponse
 * @author Felicidad Hilari
 */
class BodyResponse
{

  /**
   * @var string
   */
  private $contentBody;

  public function __construct()
  {
    $this->setContentBody('');
  }

  /**
   * Escribe en contenBody, el contenido que se renderizara
   * No borra el contenido, escribe al final de el.
   *
   * @return void
   */
  public function write(string $newContent): void
  {
    $oldContent = $this->getContentBody();

    $this->setContentBody($oldContent . $newContent);
  }


  /**
   * Setter for contentMessage
   *
   * @param string $contentMessage
   * @return BodyResponse
   */
  private function setContentBody($contentMessage)
  {
    $this->contentBody = $contentMessage;

    return $this;
  }
  /**
   * Getter for contentBody
   *
   * @return string
   */
  public function getContentBody(): string
  {
    return $this->contentBody;
  }
}
