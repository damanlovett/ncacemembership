<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AwardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AwardsTable Test Case
 */
class AwardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AwardsTable
     */
    public $Awards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.awards',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Awards') ? [] : ['className' => 'App\Model\Table\AwardsTable'];
        $this->Awards = TableRegistry::get('Awards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Awards);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
