<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFormField[]|\Cake\Collection\CollectionInterface $productFormFields
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Forms'), ['controller' => 'ProductForms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form'), ['controller' => 'ProductForms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Attributes'), ['controller' => 'ProductAttributes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Attribute'), ['controller' => 'ProductAttributes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Form Field Values'), ['controller' => 'ProductFormFieldValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form Field Value'), ['controller' => 'ProductFormFieldValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productFormFields index large-9 medium-8 columns content">
    <h3><?= __('Product Form Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_form_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productFormFields as $productFormField): ?>
            <tr>
                <td><?= $this->Number->format($productFormField->id) ?></td>
                <td><?= $productFormField->has('product_form') ? $this->Html->link($productFormField->product_form->name, ['controller' => 'ProductForms', 'action' => 'view', $productFormField->product_form->id]) : '' ?></td>
                <td><?= h($productFormField->name) ?></td>
                <td><?= h($productFormField->type) ?></td>
                <td><?= h($productFormField->created) ?></td>
                <td><?= h($productFormField->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productFormField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productFormField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productFormField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFormField->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
