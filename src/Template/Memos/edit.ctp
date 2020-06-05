<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo $memo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', 'value' => $memo['id']],
                ['confirm' => __('Are you sure you want to delete # {0}?', $memo['id']) ]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Memos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="memos form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Memos', 'action' => 'edit']]) ?>
    <?= $this->Form->hidden('id', ['value' => h($memo['id'])]) ?>
    <fieldset>
        <legend><?= __('Edit Memo') ?></legend>
        <?php
            echo $this->Form->control('content', ['type' => 'text', 'label' => 'edit content', 'value' => h($memo['content'])]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
