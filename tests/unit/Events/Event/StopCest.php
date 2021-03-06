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

namespace Phalcon\Test\Unit\Events\Event;

use Phalcon\Events\Event;
use Phalcon\Events\Manager;
use UnitTester;

class StopCest
{
    /**
     * Tests using events propagation
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2012-11-11
     */
    public function stopEventsInEventsManager(UnitTester $I)
    {
        $number        = 0;
        $eventsManager = new Manager();

        $propagationListener = function (Event $event, $component, $data) use (&$number) {
            $number++;

            $event->stop();
        };

        $eventsManager->attach('some-type', $propagationListener);
        $eventsManager->attach('some-type', $propagationListener);

        $eventsManager->fire('some-type:beforeSome', $this);

        $I->assertEquals(1, $number);
    }
}
