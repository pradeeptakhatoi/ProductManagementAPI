<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductFormFieldValue Entity
 *
 * @property int $id
 * @property int $product_form_field_id
 * @property string $value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductFormField $product_form_field
 */
class ProductFormFieldValue extends Entity
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
        'product_form_field_id' => true,
        'value' => true,
        'created' => true,
        'modified' => true,
        'product_form_field' => true
    ];
}
