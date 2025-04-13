<?php

namespace IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Service\Downloader\AssembData;

use IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Exception\DownloaderException;
use IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Service\Downloader\Log;

class Downloader
{
    /**
     * @var string
     */
    private static string $userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36";

    /**
     * @param string $url
     * @return string
     * @throws DownloaderException
     */
    public static function getContent(string $url): string
    {
        $context = stream_context_create([
            'http' => [
                'header' => "User-Agent: " . self::$userAgent
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);
        $html = file_get_contents($url, false, $context);
        if (!$html) {
            Log::error("Ошибка при скачивании HTML-контента");
            throw DownloaderException::create();
        }

        return $html;
    }
}