<?php

namespace App\Cinetech\Exceptions;

class NoRouteFoundException extends \Exception
{
  /**
   * _httpRequest
   *
   * @var mixed
   */
  private $_httpRequest;

  public function __construct($httpRequest, $message = "Il n'y à aucune page pour votre demande")
  {
    $this->_httpRequest = $httpRequest;
    parent::__construct($message, "0002");
  }

  public function getMoreDetail()
  {
    return "La route '" . $this->_httpRequest->getUrl() . "' n'a pas été trouvé avec la méthode '" . $this->_httpRequest->getMethod() . "'";
  }
}
