<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductForm $productForm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productForm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productForm->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Forms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Form Fields'), ['controller' => 'ProductFormFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Form Field'), ['controller' => 'ProductFormFields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productForms form large-9 medium-8 columns content">
    <?= $this->Form->create($productForm) ?>
    <fieldset>
        <legend><?= __('Edit Product Form') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
