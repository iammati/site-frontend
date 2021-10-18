<?php

declare(strict_types=1);

namespace Site\Frontend\Http;

use GuzzleHttp\Client as GuzzleHttpClient;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Empty subclass which can be used whenever a GuzzleHttpClient
 * is required for a PSR-18 HTTP Client usage.
 *
 * @see https://www.php-fig.org/psr/psr-18/
 */
class Client extends GuzzleHttpClient implements ClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->send($request);
    }
}
