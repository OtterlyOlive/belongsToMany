<?php
use Migrations\AbstractMigration;

class CreateArticles extends AbstractMigration
{

    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('articles');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('secondary_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('title', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('content', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'secondary_id',
        ], [
            'name' => 'BY_SECONDARY_ID',
            'unique' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
