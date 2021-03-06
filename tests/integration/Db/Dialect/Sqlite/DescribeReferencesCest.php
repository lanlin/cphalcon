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

namespace Phalcon\Test\Integration\Db\Dialect\Sqlite;

use Codeception\Example;
use IntegrationTester;
use Phalcon\Db\Dialect\Sqlite;

class DescribeReferencesCest
{
    /**
     * Tests Phalcon\Db\Dialect\Sqlite :: describeReferences()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2017-02-26
     *
     * @dataProvider getDescribeReferencesFixtures
     */
    public function dbDialectSqliteDescribeReferences(IntegrationTester $I, Example $example)
    {
        $I->wantToTest('Db\Dialect\Sqlite - describeReferences()');

        $schema   = $example[0];
        $expected = $example[1];

        $dialect = new Sqlite();

        $actual = $dialect->describeReferences(
            'table',
            $schema
        );

        $I->assertEquals($expected, $actual);
    }

    protected function getDescribeReferencesFixtures(): array
    {
        return [
            ['', "PRAGMA foreign_key_list('table')"],
            ['schema', "PRAGMA foreign_key_list('table')"],
        ];
    }
}
