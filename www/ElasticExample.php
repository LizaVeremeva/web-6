<?php
class ElasticExample
{
    private $client;

    public function __construct()
    {
        $this->client = ClientFactory::make('http://elasticsearch:9200/');
    }

    public function addNews($id, $title, $content, $category, $date)
    {
        $response = $this->client->put("news/_doc/$id", [
            'json' => [
                'title' => $title,
                'content' => $content,
                'category' => $category,
                'date' => $date
            ]
        ]);
        return $response->getBody()->getContents();
    }

    public function searchNews($query)
    {
        $response = $this->client->get("news/_search", [
            'json' => ['query' => ['match' => $query]]
        ]);
        return $response->getBody()->getContents();
    }
}