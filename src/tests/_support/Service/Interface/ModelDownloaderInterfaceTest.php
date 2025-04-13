<?php

namespace IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\tests\_support\Service\Interface;
interface ModelDownloaderInterfaceTest
{
    /**
     * Возврат списка Организиций
     *
     * @return mixed
     */
    public function getEntity(): array;

    /**
     * Возврат списка Людей
     *
     * @return mixed
     */
    public function getPersons(): array;
}