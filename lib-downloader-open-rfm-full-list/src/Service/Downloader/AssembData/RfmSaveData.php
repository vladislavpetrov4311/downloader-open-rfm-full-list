<?php

namespace IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Service\Downloader\AssembData;

use DOMDocument;
use DOMXPath;

class RfmSaveData
{
    /**
     * Получение разметки
     *
     * @return string
     * @throws \IncidentCenter\RL\CloudFunctions\DownloadOpenRfmFullList\Exception\DownloaderException
     */
    public static function getHtml(): string
    {
        return Downloader::getContent('https://www.fedsfm.ru/documents/terrorists-catalog-portal-act');
    }

    /**
     * Получение из перечня РФМ Организаций
     *
     * @param DOMDocument $dom
     * @param string $htmlContent
     * @return array
     */
    public static function saveEntity(DOMDocument $dom, string $htmlContent): array
    {
        return self::parseTerroristList($dom, $htmlContent, "//div[@id='russianUL']//ol[@class='terrorist-list']/li");
    }

    /**
     * Получение из перечня РФМ Людей
     *
     * @param DOMDocument $dom
     * @param string $htmlContent
     * @return array
     */
    public static function saveIndividual(DOMDocument $dom, string $htmlContent): array
    {
        return self::parseTerroristList($dom, $htmlContent, "//div[@id='russianFL']//ol[@class='terrorist-list']/li");
    }

    /**
     * Обработка DOM элемента и возврат списка
     *
     * @param DOMDocument $dom
     * @param string $htmlContent
     * @param string $query
     * @return array
     */
    private static function parseTerroristList(DOMDocument $dom, string $htmlContent, string $query): array
    {
        libxml_use_internal_errors(true);
        $dom->loadHTML($htmlContent);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $terroristListItems = $xpath->query($query);

        $terroristList = [];
        foreach ($terroristListItems as $item) {
            $terroristList[] = trim($item->textContent);
        }

        return $terroristList;
    }
}