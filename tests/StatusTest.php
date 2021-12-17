<?php

use App\Model\Status;

define('EXPECTED_COUNT', 1);
define('EXPECTED_VERIFIED', true);

/**
 * Test Status class
 *
 * @author semiha
 */
class StatusTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test Creating Status Object, getters and setters
     * @test
     */
    public function testCreatingStatusObject()
    {
        $status = new Status(EXPECTED_VERIFIED, EXPECTED_COUNT);
        $this->assertEquals(EXPECTED_COUNT, $status->getSentCount());
        $this->assertEquals(EXPECTED_VERIFIED, $status->IsVerified());
    }

    /**
     * Test setters
     * @test
     */
    public function testStatusSetters()
    {
        $status = new Status(false, 0);
        $status->setVerified(true);
        $status->setSentCount(1);
        $this->assertEquals(EXPECTED_COUNT, $status->getSentCount());
        $this->assertEquals(EXPECTED_VERIFIED, $status->IsVerified());
    }
}
