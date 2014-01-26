<?php

/**
 * Description of apiTests
 *
 * @author jesus
 */
class ActionsTests extends PHPUnit_Framework_TestCase
{

    protected function tearDown()
    {
        $database = APP_FOLDER . '/db/test_gomets.db';

        unlink($database);
    }

}
