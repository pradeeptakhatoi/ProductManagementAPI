<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductAttribute[]|\Cake\Collection\CollectionInterface $productAttributes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Attribute'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productAttributes index large-9 medium-8 columns content">
    <h3><?= __('Product Attributes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_form_field_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productAttributes as $productAttribute): ?>
            <tr>
                <td><?= $this->Number->format($productAttribute->id) ?></td>
                <td><?= $productAttribute->has('product') ? $this->Html->link($productAttribute->product->title, ['controller' => 'Products', 'action' => 'view', $productAttribute->product->id]) : '' ?></td>
                <td><?= $productAttribute->has('product_form_field') ? $this->Html->link($productAttribute->product_form_field->name, ['controller' => 'ProductFormFields', 'action' => 'view', $productAttribute->product_form_field->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productAttribute->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productAttribute->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productAttribute->id)]) ?>
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
