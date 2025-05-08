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
    public function createMeeting($topic, $startTime)
{
    $userId = 'ranelleshine076@gmail.com'; // Ton propre compte Zoom

    $accessToken = $this->getAccessToken();

    $response = Http::withToken($accessToken)->post("https://api.zoom.us/v2/users/{$userId}/meetings", [
        'topic'      => $topic,
        'type'       => 2, // scheduled
        'start_time' => $startTime->toIso8601String(),
        'timezone'   => 'Africa/Douala',
        'duration'   => 30,
        'settings'   => [
            'join_before_host'     => true,   // ✅ Clé pour démarrer sans hôte
            'waiting_room'         => false,
            'approval_type'        => 0,
            'meeting_authentication' => false,
        ],
    ]);

    return $response->json('join_url');
}

}
