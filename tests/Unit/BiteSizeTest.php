<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Helpers\BiteSize;

class BiteSizeTest extends TestCase
{
    /**
     * Test formatting for bytes.
     */
    public function testSizePrettyForBytes()
    {
        $this->assertEquals('500 bytes', BiteSize::size_pretty(500));
    }

    /**
     * Test formatting for kilobytes.
     */
    public function testSizePrettyForKilobytes()
    {
        $this->assertEquals('1.00 KB', BiteSize::size_pretty(1024));
        $this->assertEquals('1.95 KB', BiteSize::size_pretty(2000));
    }

    /**
     * Test formatting for megabytes.
     */
    public function testSizePrettyForMegabytes()
    {
        $this->assertEquals('1.00 MB', BiteSize::size_pretty(1048576));
        $this->assertEquals('1.91 MB', BiteSize::size_pretty(2000000));
    }

    /**
     * Test formatting for gigabytes.
     */
    public function testSizePrettyForGigabytes()
    {
        $this->assertEquals('1.00 GB', BiteSize::size_pretty(1073741824));
        $this->assertEquals('1.86 GB', BiteSize::size_pretty(2000000000));
    }
}
