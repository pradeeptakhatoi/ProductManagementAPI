<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductAttribute $productAttribute
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Attributes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productAttributes form large-9 medium-8 columns content">
    <?= $this->Form->create($productAttribute) ?>
    <fieldset>
        <legend><?= __('Add Product Attribute') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('product_form_field_id', ['options' => $productFormFields]);
            echo $this->Form->control('product_form_field_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
