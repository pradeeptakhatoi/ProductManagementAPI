<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductAttributesTable Test Case
 */
class ProductAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductAttributesTable
     */
    public $ProductAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_attributes',
        'app.products',
        'app.product_form_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductAttributes') ? [] : ['className' => ProductAttributesTable::class];
        $this->ProductAttributes = TableRegistry::getTableLocator()->get('ProductAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductAttributes);

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
