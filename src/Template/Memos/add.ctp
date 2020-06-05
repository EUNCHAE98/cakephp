<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Memos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="memos form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Memos', 'action' => 'add']]) ?>
    <fieldset>
        <legend><?= __('Add Memo') ?></legend>
        <?php
            echo $this->Form->control('content', ['type' => 'text', 'label' => 'fill content']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
