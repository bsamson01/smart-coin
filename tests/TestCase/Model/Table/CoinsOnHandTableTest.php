<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoinsOnHandTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoinsOnHandTable Test Case
 */
class CoinsOnHandTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoinsOnHandTable
     */
    protected $CoinsOnHand;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CoinsOnHand',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CoinsOnHand') ? [] : ['className' => CoinsOnHandTable::class];
        $this->CoinsOnHand = $this->getTableLocator()->get('CoinsOnHand', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CoinsOnHand);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
