<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductFormField Entity
 *
 * @property int $id
 * @property int $product_form_id
 * @property string $name
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductForm $product_form
 * @property \App\Model\Entity\ProductAttribute[] $product_attributes
 * @property \App\Model\Entity\ProductFormFieldValue[] $product_form_field_values
 */
class ProductFormField extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_form_id' => true,
        'name' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'product_form' => true,
        'product_attributes' => true,
        'product_form_field_values' => true
    ];
}
