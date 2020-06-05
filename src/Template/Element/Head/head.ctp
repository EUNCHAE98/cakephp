<div class="memo_head">
    <span class="memo_head_name"><?= __('{0}', ["New Memo"]) ?></span>
    <span class="memo_head_link">
        <?= $this->Html->link(__("+"), ['action' => 'add'], ["title" => 'New'.$viewName]) ?>
    </span>
</div>