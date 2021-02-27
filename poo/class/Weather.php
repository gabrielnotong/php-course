<?php
class Weather
{
    const API_URL = 'api.openweathermap.org/data/2.5/forecast';

    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getForecast(string $city)
    {
        $curl = curl_init(self::API_URL . "?q={$city}&appid={$this->apiKey}&units=metric");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1
        ]);
        $data = curl_exec($curl);
        $result = [];

        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
           return null;
        } else {
            $data = json_decode($data, true);

            foreach ($data['list'] as $value) {
                $result[] = [
                    'temp' => $value['main']['temp'],
                    'description' => $value['weather'][0]['description'],
                    'date' => new DateTime('@' . $value['dt'])
                ];
            }
        }

        curl_close($curl);

        return $result;
    }
}