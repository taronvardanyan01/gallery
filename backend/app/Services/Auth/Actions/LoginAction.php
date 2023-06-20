<?php

use Dto\LoginDto;
use Laravel\Passport\Client;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;
use League\OAuth2\Server\AuthorizationServer;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;

class LoginAction
{
    use HandlesOAuthErrors;

    public function __construct(
        protected AuthorizationServer $server,
        protected ServerRequestInterface $serverRequest
    ) {}

    public function run(LoginDto $dto)
    {
        $this->createServerRequest();

        $serverRequest = $this->withParsedBodyToServerRequest($dto);

        return $this->createAuthenticationToken($serverRequest);
    }

    protected function createServerRequest(): void
    {
        $this->serverRequest = (new PsrHttpFactory(
            new Psr17Factory(),
            new Psr17Factory(),
            new Psr17Factory(),
            new Psr17Factory(),
        ))->createRequest(request());
    }

    protected function withParsedBodyToServerRequest(LoginDto $dto): ServerRequestInterface
    {
        $oClient = Client::query()->where('id', env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'))->first();

        return $this->serverRequest->withParsedBody([
           'grant_type' => 'password',
           'client_id' => $oClient->id,
           'client_secret' => $oClient->secret,
           'username' => $dto->email,
           'password' => $dto->password,
           'scope' => '*'
        ]);
    }

    protected function  createAuthenticationToken($serverRequest)
    {
        $response = $this->withErrorHandling(function () use ($serverRequest) {
           return $this->convertResponse(
               $this->server->respondToAccessTokenRequest($serverRequest, new Psr7Response)
           );
        });

        $this->tokenData = json_decode($response->getContent(), true) ?? [];

        return $response;
    }
}
