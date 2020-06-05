<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Memo[]|\Cake\Collection\CollectionInterface $memos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Memo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memos index large-9 medium-8 columns content">
    <h3><?= __('Memos') ?></h3>
    <?php $this->Html->css('head',['block'=>true]); ?>
    <?php echo $this->element("Head/head", ["viewName" => "Memo"]) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">content</th>
                <th scope="col">created</th>
                <th scope="col">modified</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memos as $memo): ?>
            <tr>
                <td><?= h($memo['id']) ?></td>
                <td><?= h($memo['content']) ?></td>
                <td><?= h($memo['created']) ?></td>
                <td><?= h($memo['modified']) ?></td>
                <td><?= $this->Html->link(__('Edit'), ['action' => 'edit', $memo['id']]) ?>
                <?= $this->Form->postLink(__(' / Delete'), ['action' => 'delete', $memo['id']],
                ['confirm' => __('本当に{0}番を削除しますか?', $memo['id'])]) ?>
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
