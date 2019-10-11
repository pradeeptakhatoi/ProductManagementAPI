<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductFormFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductFormFieldsTable Test Case
 */
class ProductFormFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductFormFieldsTable
     */
    public $ProductFormFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_form_fields',
        'app.product_forms',
        'app.product_attributes',
        'app.product_form_field_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductFormFields') ? [] : ['className' => ProductFormFieldsTable::class];
        $this->ProductFormFields = TableRegistry::getTableLocator()->get('ProductFormFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductFormFields);

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
