<?php 
class config {
    public function __construct($query) {
        $curl = curl_init();

        $graphql_url = 'https://graphql.anilist.co/';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $graphql_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true, 
            CURLOPT_POSTFIELDS => json_encode(array('query' => $query)), 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: laravel_session=29Vj6oAItQVvRUELULTHxnY0XaceDFM6nAutNoZC'
            ),
        ));

        $response = curl_exec($curl);

        $this->data = json_decode($response, true);
    }
    public function getData() {
        return $this->data;
    }
}
?>