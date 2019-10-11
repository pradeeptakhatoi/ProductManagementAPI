<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Forms'), ['controller' => 'ProductForms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form'), ['controller' => 'ProductForms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Attributes'), ['controller' => 'ProductAttributes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Attribute'), ['controller' => 'ProductAttributes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control('product_form_id', ['options' => $productForms]);
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
