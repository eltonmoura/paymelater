<?php
namespace App;

use \Psr\Container\ContainerInterface;

class Controller
{
    protected $container;

    /**
     * Lista de Codigos de retorno da API
     * Referencia: http://www.restapitutorial.com/httpstatuscodes.html
     */
    const HTTP_CODE_OK = 200;
    const HTTP_CODE_CREATED = 201;
    const HTTP_CODE_NO_CONTENT = 204;
    const HTTP_CODE_BAD_REQUEST = 400;
    const HTTP_CODE_UNAUTHORIZED = 401;
    const HTTP_CODE_NOT_FOUND = 404;
    const HTTP_CODE_INTERNAL_SERVER_ERROR = 500;
    const HTTP_CODE_NOT_IMPLEMENTED = 501;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
