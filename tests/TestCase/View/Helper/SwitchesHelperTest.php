<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\SwitchesHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\SwitchesHelper Test Case
 */
class SwitchesHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\SwitchesHelper
     */
    public $Switches;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Switches = new SwitchesHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Switches);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
