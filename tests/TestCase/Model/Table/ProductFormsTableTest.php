<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductFormsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductFormsTable Test Case
 */
class ProductFormsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductFormsTable
     */
    public $ProductForms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_forms',
        'app.product_form_fields',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductForms') ? [] : ['className' => ProductFormsTable::class];
        $this->ProductForms = TableRegistry::getTableLocator()->get('ProductForms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductForms);

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
}
