<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUlasanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tempat' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_pengunjung' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'rating' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'unsigned'   => true,
            ],
            'komentar' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_tempat', 'tempat', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ulasan');
    }

    public function down()
    {
        $this->forge->dropTable('ulasan');
    }
}