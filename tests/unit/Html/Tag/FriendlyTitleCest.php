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

namespace Phalcon\Test\Unit\Html\Tag;

use Phalcon\Html\Exception;
use Phalcon\Html\Tag;
use Phalcon\Test\Fixtures\Traits\DiTrait;
use Phalcon\Test\Fixtures\Traits\TagSetupTrait;
use UnitTester;

class FriendlyTitleCest
{
    use DiTrait;
    use TagSetupTrait;

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitle(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle()');

        $tag = new Tag();

        $text     = 'This is a Test';
        $expected = 'this-is-a-test';
        $actual   = $tag->friendlyTitle($text);
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - separator
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleSeparator(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - separator');

        $tag = new Tag();

        $text    = 'This is a Test';
        $options = [
            'separator' => '_',
        ];

        $I->assertEquals(
            'this_is_a_test',
            $tag->friendlyTitle($text, $options)
        );
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - lowercase
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleLowercase(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - lowercase');

        $tag = new Tag();

        $text    = 'This is a Test';
        $options = [
            'lowercase' => false,
        ];

        $I->assertEquals(
            'This-is-a-Test',
            $tag->friendlyTitle($text, $options)
        );
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - replace string
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleReplaceString(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - replace string');

        $tag = new Tag();

        $text     = 'This is a Test';
        $options  = [
            'replace' => 'i',
        ];
        $expected = 'ths-s-a-test';
        $actual   = $tag->friendlyTitle($text, $options);
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - replace array
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleReplaceArray(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - replace array');

        $tag = new Tag();

        $text     = 'This is a Test';
        $options  = [
            'replace' => ['i', 'h'],
        ];
        $expected = 't-s-s-a-test';
        $actual   = $tag->friendlyTitle($text, $options);
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - special characters and
     * escaping
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleSpecialCharacters(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - special characters and escaping');

        $tag = new Tag();

        $text     = "Mess'd up --text-- just (to) stress /test/ ?our! "
            . '`little` \\clean\\ url fun.ction!?-->';
        $expected = 'messd-up-text-just-to-stress-test-our-little-'
            . 'clean-url-function';
        $actual   = $tag->friendlyTitle($text);
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - accented characters replace
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleAccentedCharactersReplace(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - accented characters replace');

        $tag = new Tag();

        $text     = "Perché l'erba è verde?";
        $expected = 'perche-lerba-e-verde';
        $options  = [
            'replace' => "'",
        ];
        $actual   = $tag->friendlyTitle($text, $options);
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - accented characters replace
     * array
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleAccentedCharactersReplaceArray(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - accented characters replace array');

        $tag = new Tag();

        $text     = "Perché l'erba è verde?";
        $expected = 'p-rch-l-rb-v-rd';
        $options  = [
            'replace' => ['e', 'a'],
        ];
        $actual   = $tag->friendlyTitle($text, $options);
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Html\Tag :: friendlyTitle() - replace exception
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2014-09-11
     */
    public function htmlTagFriendlyTitleReplaceException(UnitTester $I)
    {
        $I->wantToTest('Html\Tag - friendlyTitle() - replace exception');

        $I->expectThrowable(
            new Exception('Parameter replace must be an array or a string'),
            function () {
                $tag = new Tag();

                $options = [
                    'replace' => true,
                ];

                $tag->friendlyTitle('test', $options);
            }
        );
    }
}
