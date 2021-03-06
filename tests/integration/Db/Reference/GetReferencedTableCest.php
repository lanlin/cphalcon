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

namespace Phalcon\Test\Integration\Db\Reference;

use IntegrationTester;
use Phalcon\Test\Fixtures\Traits\DialectTrait;

class GetReferencedTableCest
{
    use DialectTrait;

    /**
     * Tests Phalcon\Db\Reference :: getReferencedTable()
     */
    public function dbReferenceGetReferencedTable(IntegrationTester $I)
    {
        $I->wantToTest('Db\Reference - getReferencedTable()');

        $references = $this->getReferences();



        $reference1 = $references['fk1'];

        $I->assertEquals(
            'ref_table',
            $reference1->getReferencedTable()
        );



        $reference2 = $references['fk2'];

        $I->assertEquals(
            'ref_table',
            $reference2->getReferencedTable()
        );



        $reference3 = $references['fk3'];

        $I->assertEquals(
            'ref_table',
            $reference3->getReferencedTable()
        );



        $reference4 = $references['fk4'];

        $I->assertEquals(
            'ref_table',
            $reference4->getReferencedTable()
        );



        $reference5 = $references['fk5'];

        $I->assertEquals(
            'ref_table',
            $reference5->getReferencedTable()
        );
    }
}
