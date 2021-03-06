<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Helper\Str;

use Phalcon\Helper\Str;
use UnitTester;

class IsLowerCest
{
    /**
     * Tests Phalcon\Helper\Str :: isLower()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-04-06
     */
    public function helperStrIsLower(UnitTester $I)
    {
        $I->wantToTest('Helper\Str - isLower()');

        $actual = Str::isLower('phalcon framework');
        $I->assertTrue($actual);

        $actual = Str::isLower('Phalcon Framework');
        $I->assertFalse($actual);
    }
}
