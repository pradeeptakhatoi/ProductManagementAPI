<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFormFieldValue $productFormFieldValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Form Field Value'), ['action' => 'edit', $productFormFieldValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Form Field Value'), ['action' => 'delete', $productFormFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFormFieldValue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Form Field Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form Field Value'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productFormFieldValues view large-9 medium-8 columns content">
    <h3><?= h($productFormFieldValue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Form Field') ?></th>
            <td><?= $productFormFieldValue->has('product_form_field') ? $this->Html->link($productFormFieldValue->product_form_field->name, ['controller' => 'ProductFormFields', 'action' => 'view', $productFormFieldValue->product_form_field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($productFormFieldValue->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productFormFieldValue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productFormFieldValue->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productFormFieldValue->modified) ?></td>
        </tr>
    </table>
</div>
