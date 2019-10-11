<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductAttribute $productAttribute
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Attribute'), ['action' => 'edit', $productAttribute->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Attribute'), ['action' => 'delete', $productAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productAttribute->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Attributes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Attribute'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productAttributes view large-9 medium-8 columns content">
    <h3><?= h($productAttribute->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productAttribute->has('product') ? $this->Html->link($productAttribute->product->title, ['controller' => 'Products', 'action' => 'view', $productAttribute->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Form Field') ?></th>
            <td><?= $productAttribute->has('product_form_field') ? $this->Html->link($productAttribute->product_form_field->name, ['controller' => 'ProductFormFields', 'action' => 'view', $productAttribute->product_form_field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productAttribute->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Product Form Field Value') ?></h4>
        <?= $this->Text->autoParagraph(h($productAttribute->product_form_field_value)); ?>
    </div>
</div>
