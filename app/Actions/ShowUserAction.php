<?php

namespace App\Actions;

use App\Responders\ShowUserResponder;

class ShowUserAction
{
  public function __construct(protected ShowUserResponder $responder) {}

  public function __invoke()
  {
    return $this->responder->respond();
  }
}