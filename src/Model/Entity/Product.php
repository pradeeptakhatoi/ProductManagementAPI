<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $product_form_id
 * @property string $title
 * @property string $description
 * @property float $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductForm $product_form
 * @property \App\Model\Entity\ProductAttribute[] $product_attributes
 */
class Product extends Entity
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
        'title' => true,
        'description' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'product_form' => true,
        'product_attributes' => true
    ];
}
