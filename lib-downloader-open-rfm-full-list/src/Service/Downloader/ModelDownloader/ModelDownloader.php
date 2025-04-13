<?php

namespace IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Service\Downloader\ModelDownloader;
use DOMDocument;
use IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Service\Downloader\AssembData\RfmSaveData;

use IncidentCenter\RL\CloudFunctions\MainFileHandlerDownloaders\Service\Interface\ModelDownloaderInterface;

class ModelDownloader implements ModelDownloaderInterface
{
    private string $htmlContent = '';

    public function __construct()
    {
        $outputHtmlFile = 'outHtml.txt';

        // Получение HTML и его запись в файл
        $this->htmlContent = RfmSaveData::getHtml();
        file_put_contents($outputHtmlFile, $this->htmlContent);

        // Чтение содержимого из файла
        if (($this->htmlContent = file_get_contents($outputHtmlFile)) === false) {
            die("Failed to read the HTML file.");
        }
    }

    /**
     * Получение из перечня РФМ Организаций
     *
     * @return array
     */
    public function getEntity(): array
    {
        return RfmSaveData::saveEntity(new DOMDocument(), $this->htmlContent);
    }

    /**
     * Получение из перечня РФМ Людей
     *
     * @return array
     */
    public function getPersons(): array
    {
        return RfmSaveData::saveIndividual(new DOMDocument(), $this->htmlContent);
    }
}