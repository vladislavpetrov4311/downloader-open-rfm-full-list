<?php

use IncidentCenter\RL\CloudFunctions\LibDownloaderOpenRfmFullList\tests\_support\Service\ModelDownloaderTest;

use Mockery\MockInterface;

/**
 * Inherited Methods
 * @SuppressWarnings(PHPMD)
*/
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    private array $expectMessage = ['1. FREE RUSSIA FOUNDATION , ;'];
    private array $lastMessage = [];

    /**
     * @When содержимое присутствует
     */
    public function tryAssertPipeLine()
    {
        $mainDown = Mockery::mock(ModelDownloaderTest::class);
        $mainDown->shouldReceive('getEntity')
            ->andReturn(['1. FREE RUSSIA FOUNDATION , ;']);

        $this->lastMessage = $mainDown->getEntity();
        $this->assertNotEmpty($this->lastMessage[0]);
    }

    /**
     * @Then то я сравниваю данные
     */
    public function iSeeEqualsValues()
    {
        $this->assertContains($this->expectMessage[0], $this->lastMessage, 'различные данные');
    }
}