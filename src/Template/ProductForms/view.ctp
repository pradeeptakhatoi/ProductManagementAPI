<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductForm $productForm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Form'), ['action' => 'edit', $productForm->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Form'), ['action' => 'delete', $productForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productForm->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Forms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productForms view large-9 medium-8 columns content">
    <h3><?= h($productForm->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productForm->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productForm->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productForm->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productForm->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product Form Fields') ?></h4>
        <?php if (!empty($productForm->product_form_fields)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Form Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productForm->product_form_fields as $productFormFields): ?>
            <tr>
                <td><?= h($productFormFields->id) ?></td>
                <td><?= h($productFormFields->product_form_id) ?></td>
                <td><?= h($productFormFields->name) ?></td>
                <td><?= h($productFormFields->type) ?></td>
                <td><?= h($productFormFields->created) ?></td>
                <td><?= h($productFormFields->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductFormFields', 'action' => 'view', $productFormFields->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductFormFields', 'action' => 'edit', $productFormFields->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductFormFields', 'action' => 'delete', $productFormFields->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFormFields->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($productForm->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Form Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productForm->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->product_form_id) ?></td>
                <td><?= h($products->title) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->price) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
