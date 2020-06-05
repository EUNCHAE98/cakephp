<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MemosTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('memo');
        $this->setDisplayField('content');
        $this->setPrimaryKey('id');
    }
}