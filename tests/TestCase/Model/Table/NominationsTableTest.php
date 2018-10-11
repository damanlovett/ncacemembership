<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NominationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NominationsTable Test Case
 */
class NominationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NominationsTable
     */
    public $Nominations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nominations',
        'app.users',
        'app.awards',
        'app.votes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nominations') ? [] : ['className' => 'App\Model\Table\NominationsTable'];
        $this->Nominations = TableRegistry::get('Nominations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nominations);

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
