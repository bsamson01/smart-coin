<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoinsOnAuctionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoinsOnAuctionTable Test Case
 */
class CoinsOnAuctionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoinsOnAuctionTable
     */
    protected $CoinsOnAuction;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CoinsOnAuction',
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
        $config = $this->getTableLocator()->exists('CoinsOnAuction') ? [] : ['className' => CoinsOnAuctionTable::class];
        $this->CoinsOnAuction = $this->getTableLocator()->get('CoinsOnAuction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CoinsOnAuction);

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
