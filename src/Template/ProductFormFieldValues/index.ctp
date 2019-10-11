<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFormFieldValue[]|\Cake\Collection\CollectionInterface $productFormFieldValues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Form Field Value'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productFormFieldValues index large-9 medium-8 columns content">
    <h3><?= __('Product Form Field Values') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_form_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productFormFieldValues as $productFormFieldValue): ?>
            <tr>
                <td><?= $this->Number->format($productFormFieldValue->id) ?></td>
                <td><?= $productFormFieldValue->has('product_form_field') ? $this->Html->link($productFormFieldValue->product_form_field->name, ['controller' => 'ProductFormFields', 'action' => 'view', $productFormFieldValue->product_form_field->id]) : '' ?></td>
                <td><?= h($productFormFieldValue->value) ?></td>
                <td><?= h($productFormFieldValue->created) ?></td>
                <td><?= h($productFormFieldValue->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productFormFieldValue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productFormFieldValue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productFormFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFormFieldValue->id)]) ?>
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
