<?php
use Migrations\AbstractMigration;

class Memos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('memos', ['id' => false, 'primary_key' => 'id']);
        $table->addColumn('id', 'integer'); 
        $table->addColumn('content', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('isdelete', 'integer', [
            'default' => 0,
        ]);
        $table->addColumn('created', 'timestamp', [
            'default' => CURRENT_TIMESTAMP,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);

        $table->create();
    }
}
