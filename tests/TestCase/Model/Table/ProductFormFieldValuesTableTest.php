<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductFormFieldValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductFormFieldValuesTable Test Case
 */
class ProductFormFieldValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductFormFieldValuesTable
     */
    public $ProductFormFieldValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_form_field_values',
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
        $config = TableRegistry::getTableLocator()->exists('ProductFormFieldValues') ? [] : ['className' => ProductFormFieldValuesTable::class];
        $this->ProductFormFieldValues = TableRegistry::getTableLocator()->get('ProductFormFieldValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductFormFieldValues);

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
