<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductFormField $productFormField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productFormField->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productFormField->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Forms'), ['controller' => 'ProductForms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form'), ['controller' => 'ProductForms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Attributes'), ['controller' => 'ProductAttributes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Attribute'), ['controller' => 'ProductAttributes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Form Field Values'), ['controller' => 'ProductFormFieldValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form Field Value'), ['controller' => 'ProductFormFieldValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productFormFields form large-9 medium-8 columns content">
    <?= $this->Form->create($productFormField) ?>
    <fieldset>
        <legend><?= __('Edit Product Form Field') ?></legend>
        <?php
            echo $this->Form->control('product_form_id', ['options' => $productForms]);
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
