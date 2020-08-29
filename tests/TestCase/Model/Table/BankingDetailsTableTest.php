<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankingDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankingDetailsTable Test Case
 */
class BankingDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BankingDetailsTable
     */
    protected $BankingDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BankingDetails',
        'app.Users',
        'app.Banks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BankingDetails') ? [] : ['className' => BankingDetailsTable::class];
        $this->BankingDetails = $this->getTableLocator()->get('BankingDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BankingDetails);

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
