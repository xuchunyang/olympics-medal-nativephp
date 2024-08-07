<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class MedalService
{
    /**
     * @throws RequestException
     */
    public static function getMedals(): Collection
    {
        // Fetch https://en.wikipedia.org/wiki/2024_Summer_Olympics_medal_table
        $response = Http::get('https://en.wikipedia.org/wiki/2024_Summer_Olympics_medal_table')->throw();

        $result = collect();
        $crawler = new Crawler($response->body());
        $crawler = $crawler->filter('table.wikitable tr');
        $crawler->each(function (Crawler $tr, $i) use ($crawler, $result) {
            if ($i === 0 || $i === $crawler->count() - 1) {
                return;
            }

            // 对于每一行，找出最后五个th/td元素，分别对于国家、金牌、银牌、铜牌、总数
            $tds = $tr->children()->slice(-5);
            $country = $tds->eq(0)->text();
            $gold = $tds->eq(1)->text();
            $silver = $tds->eq(2)->text();
            $bronze = $tds->eq(3)->text();
            $total = $tds->eq(4)->text();

            $result->push([
                'country' => $country,
                'gold' => $gold,
                'silver' => $silver,
                'bronze' => $bronze,
                'total' => $total,
            ]);
        });

        return $result;
    }
}
