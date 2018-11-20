<?php

namespace App\Tests\Service;

use App\Service\CryptGenerator;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

/**
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
class CryptGeneratorTest extends TestCase
{
    public function testCanGenerateCrypt()
    {
        $generator = new CryptGenerator();
        $hash = $generator->hash(12345);

        $this->assertNotEmpty($hash);
        $this->assertStringStartsWith('$6$', $hash);
    }
}