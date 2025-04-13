<?php
namespace IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\Exception;
use Exception;

class DownloaderException extends Exception
{
    private string $ExceptionMessage;
    public function __construct(string $message)
    {
        $this->ExceptionMessage = $message;
    }

    /**
     * @return string
     */
    public function getExceptionMessage(): string
    {
        return $this->ExceptionMessage;
    }
}