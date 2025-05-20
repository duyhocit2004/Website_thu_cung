<?php

namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\User;
use Laravel\Socialite\Two\ProviderInterface;

class RedditProvider extends AbstractProvider implements ProviderInterface
{
    protected $scopes = ['identity'];

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://www.reddit.com/api/v1/authorize', $state);
    }

    protected function getTokenUrl()
    {
        return 'https://www.reddit.com/api/v1/access_token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
            'https://oauth.reddit.com/api/v1/me',
            [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                    'User-Agent' => 'LaravelApp by /u/your_reddit_username'
                ],
            ]
        );

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => $user['name'],
            'name' => $user['name'],
            'email' => null,
        ]);
    }
}
