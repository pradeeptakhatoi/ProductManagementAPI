<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFormField $productFormField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Form Field'), ['action' => 'edit', $productFormField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Form Field'), ['action' => 'delete', $productFormField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFormField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Forms'), ['controller' => 'ProductForms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form'), ['controller' => 'ProductForms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Attributes'), ['controller' => 'ProductAttributes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Attribute'), ['controller' => 'ProductAttributes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Form Field Values'), ['controller' => 'ProductFormFieldValues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form Field Value'), ['controller' => 'ProductFormFieldValues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productFormFields view large-9 medium-8 columns content">
    <h3><?= h($productFormField->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Form') ?></th>
            <td><?= $productFormField->has('product_form') ? $this->Html->link($productFormField->product_form->name, ['controller' => 'ProductForms', 'action' => 'view', $productFormField->product_form->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productFormField->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($productFormField->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productFormField->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productFormField->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productFormField->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Attributes') ?></h4>
        <?php if (!empty($productFormField->product_attributes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Product Form Field Id') ?></th>
                <th scope="col"><?= __('Product Form Field Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productFormField->product_attributes as $productAttributes): ?>
            <tr>
                <td><?= h($productAttributes->id) ?></td>
                <td><?= h($productAttributes->product_id) ?></td>
                <td><?= h($productAttributes->product_form_field_id) ?></td>
                <td><?= h($productAttributes->product_form_field_value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductAttributes', 'action' => 'view', $productAttributes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductAttributes', 'action' => 'edit', $productAttributes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductAttributes', 'action' => 'delete', $productAttributes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productAttributes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Form Field Values') ?></h4>
        <?php if (!empty($productFormField->product_form_field_values)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Form Field Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productFormField->product_form_field_values as $productFormFieldValues): ?>
            <tr>
                <td><?= h($productFormFieldValues->id) ?></td>
                <td><?= h($productFormFieldValues->product_form_field_id) ?></td>
                <td><?= h($productFormFieldValues->value) ?></td>
                <td><?= h($productFormFieldValues->created) ?></td>
                <td><?= h($productFormFieldValues->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductFormFieldValues', 'action' => 'view', $productFormFieldValues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductFormFieldValues', 'action' => 'edit', $productFormFieldValues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductFormFieldValues', 'action' => 'delete', $productFormFieldValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFormFieldValues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
