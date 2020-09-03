<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WaitingPeriodsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WaitingPeriodsTable Test Case
 */
class WaitingPeriodsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WaitingPeriodsTable
     */
    protected $WaitingPeriods;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.WaitingPeriods',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WaitingPeriods') ? [] : ['className' => WaitingPeriodsTable::class];
        $this->WaitingPeriods = $this->getTableLocator()->get('WaitingPeriods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->WaitingPeriods);

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
}
