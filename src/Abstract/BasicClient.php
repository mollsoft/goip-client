<?php

namespace MollSoft\GoipClient\Abstract;

use Illuminate\Support\Facades\App;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;

abstract class BasicClient
{
    public readonly string $baseUri;
    public readonly \GuzzleHttp\Client $client;
    public ?ResponseInterface $response = null;
    protected ?string $content = null;

    public function __construct(string $baseUri, string $login, string $password)
    {
        $this->baseUri = $baseUri.(mb_substr($baseUri, 0, -1) !== '/' ? '/' : '');

        $config = [
            'base_uri' => $this->baseUri,
            'timeout' => 30,
            'auth' => [$login, $password],
        ];

        $this->client = new \GuzzleHttp\Client($config);
    }

    public function request(string $path, array $get = null, array $post = null): Crawler
    {
        if ($get) {
            $path .= '?'.http_build_query($get);
        }

        $this->response = $this->client->request($post ? 'POST' : 'GET', $path, [
            'form_params' => $post
        ]);

        $this->content = $this->response->getBody()->getContents();

        return new Crawler($this->content, $this->baseUri);
    }
}
