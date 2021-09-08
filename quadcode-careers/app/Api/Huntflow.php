<?php

namespace App\Api;


use App\Models\Application;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Psr\Http\Message\StreamInterface;

class Huntflow
{
    private $accountId;
    private $key;

    private $client;

    public function __construct()
    {
        $this->accountId = env('HUNTFLOW_ID');
        $this->key = env('HUNTFLOW_KEY');

        $this->client = new Client([
            'base_uri' => 'https://api.huntflow.ru/',
            'timeout' => 3.0,
            'http_errors' => false, // do not throw exceptions, working with getStatusCode()
            'headers' => [
                'User-Agent' => 'quadcode/1.0 (archy@greasle.com)',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->key,
            ],
        ]);
    }

    /**
     * @param $url
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function get($url, $options = [])
    {
        if (!($this->accountId && $this->key)) {
            throw new \InvalidArgumentException('You should set hunflow id and key');
        }

        return $this->client->get($url, $options);
    }

    /**
     * @param $url
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function post($url, $options = [])
    {
        if (!($this->accountId && $this->key)) {
            throw new \InvalidArgumentException('You should set hunflow id and key');
        }

        return $this->client->post($url, $options);
    }

    /**
     * Test request
     * @return StreamInterface
     */
    public function getMe(): StreamInterface
    {
        $url = '/me';

        $response = $this->get($url);

        return $response->getBody();
    }

    /**
     * Get user accounts
     * @return StreamInterface
     */
    public function getAccounts(): StreamInterface
    {
        $url = '/accounts';

        $response = $this->get($url);

        return $response->getBody();
    }

    /**
     * Get applicant sources
     * @return StreamInterface
     */
    public function getApplicantSources(): StreamInterface
    {
        $url = '/account/' . $this->accountId . '/applicant/sources';

        $response = $this->get($url);

        return $response->getBody();
    }

    /**
     * Get available statuses of vacancies
     * @return StreamInterface
     */
    public function getVacancyStatuses(): StreamInterface
    {
        $url = '/account/' . $this->accountId . '/vacancy/statuses';

        $response = $this->get($url);

        return $response->getBody();
    }

    /**
     * Get huntflow vacancies list
     * @param int $page
     * @param int $count
     * @return array
     */
    public function getVacancyList($page = 1, $count = 30): array
    {
        $url = '/account/' . $this->accountId . '/vacancies';

        $response = $this->get($url, [
            // todo iterate thru pages instead of working with big one
            'query' => ['page' => $page, 'count' => $count],
        ]);

        if ($response->getStatusCode() != 200) {
            return [];
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * Get vacancy by id
     * @param int $id
     * @return array
     */
    public function getVacancy(int $id): array
    {
        $url = '/account/' . $this->accountId . '/vacancies/' . $id;

        $response = $this->get($url);

        if ($response->getStatusCode() != 200) {
            return [];
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $dict
     * @return array
     */
    public function getDictionary(string $dict): array
    {
        $url = '/account/' . $this->accountId . '/dictionary/' . $dict;

        $response = $this->get($url);

        if ($response->getStatusCode() != 200) {
            return [];
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * Upload file to huntflow and return its id
     * @param $file
     * @return false|int
     */
    public function uploadFile(UploadedFile $file)
    {
        $url = '/account/' . $this->accountId . '/upload';

        $response = $this->post($url, [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => $file->getContent(),
                    'filename' => $file->getClientOriginalName(),
                ],
            ],
        ]);

        if ($response->getStatusCode() != 200) {
            return false;
        }

        $result = json_decode($response->getBody(), true);

        return $result['id'];
    }

    /**
     * Send applicant to huntflow
     * @param Application $application
     * @return bool
     */
    public function createApplicant(Application $application): bool
    {
        if ($application->file) {
            $file = $this->uploadFile($application->file);
        } else {
            $file = false;
        }

        $url = '/account/' . $this->accountId . '/applicants';

        $data = [
            "last_name" => $application->lastName,
            "first_name" => $application->firstName,
//            "middle_name" => "",
            "phone" => $application->phone,
            "email" => $application->email,
// Not used on site for now
//            "position" => "Фронтендер",
//            "company" => "ХХ",
//            "money" => "100000 руб",
//            "birthday_day" => 20,
//            "birthday_month" => 7,
//            "birthday_year" => 1984,
//            "photo" => 12341,
            "externals" => [
                [
                    "data" => [
                        "body" => $application->message,
                    ],
                    "auth_type" => "NATIVE",
                    "account_source" => env('HUNTFLOW_APP_SOURCE')
                ]
            ]
        ];

        if ($file) {
            $data['externals'][0]['files'][] = ['id' => $file];
        }

        $response = $this->post($url, [
            'json' => $data,
        ]);

        if ($response->getStatusCode() != 200) {
            return false;
        }

        if (!$application->vacancyId) {
            return true;
        }

        // Now add applicant to corresponding vacancy
        $responseBody = $response->getBody();
        $temp = json_decode($responseBody, true);
        $applicantId = $temp['id'];

        $url = '/account/' . $this->accountId . '/applicants/' . $applicantId . '/vacancy';

        $data = [
            "vacancy" => $application->vacancyId,
            "status" => env('HUNTFLOW_VACANCY_STATUS'),
            "comment" => $application->message,
            "rejection_reason" => null,
//            "fill_quota" => 234
        ];

        if ($file) {
            $data['files'][] = ['id' => $file];
        }

        $this->post($url, [
            'json' => $data
        ]);

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @return bool
     */
    public function translateBool($value): bool
    {
        if ($value == 'Да') {
            return true;
        }
        return false;
    }
}
