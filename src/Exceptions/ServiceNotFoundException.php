<?php

namespace RyanChandler\Container\Exceptions;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundException extends Exception implements NotFoundExceptionInterface
{
    //
}