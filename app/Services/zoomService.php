<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    protected $config;

    public function __construct()
    {
        $this->config = config('zoom');
    }

    /**
     * Récupère un access token via le client_credentials flow.
     */
    public function getAccessToken(): string
    {
        $response = Http::withBasicAuth(
                $this->config['client_id'],
                $this->config['client_secret']
            )
            ->asForm()
            ->post('https://zoom.us/oauth/token', [
                'grant_type' => 'account_credentials',
                'account_id' => $this->config['account_id'],
            ]);

        if (! $response->successful()) {
            throw new \Exception('Impossible d’obtenir le token Zoom: ' . $response->body());
        }

        return $response->json()['access_token'];
    }

    /**
     * Crée une réunion programmée et retourne le join_url.
     */
    public function createMeeting($topic, $startTime, $duration = 30, $timezone = 'Africa/Douala'): string
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post($this->config['base_url'] . '/users/me/meetings', [
                'topic'      => $topic,
                'type'       => 2,
                'start_time' => $startTime->format('Y-m-d\TH:i:s'),
                'duration'   => $duration,
                'timezone'   => $timezone,
                'settings'   => [
                    'join_before_host' => true,
                    'approval_type'    => 0,
                    'waiting_room'     => true,
                ],
            ]);

        if (! $response->successful()) {
            throw new \Exception('Erreur création réunion Zoom: ' . $response->body());
        }

        return $response->json()['join_url'];
    }
}
