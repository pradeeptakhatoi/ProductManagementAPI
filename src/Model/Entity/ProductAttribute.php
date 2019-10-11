<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductAttribute Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_form_field_id
 * @property string $product_form_field_value
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\ProductFormField $product_form_field
 */
class ProductAttribute extends Entity
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
        'product_id' => true,
        'product_form_field_id' => true,
        'product_form_field_value' => true,
        'product' => true,
        'product_form_field' => true
    ];
}
