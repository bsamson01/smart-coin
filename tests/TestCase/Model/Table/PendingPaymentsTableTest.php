<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PendingPaymentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PendingPaymentsTable Test Case
 */
class PendingPaymentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PendingPaymentsTable
     */
    protected $PendingPayments;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PendingPayments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PendingPayments') ? [] : ['className' => PendingPaymentsTable::class];
        $this->PendingPayments = $this->getTableLocator()->get('PendingPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PendingPayments);

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
