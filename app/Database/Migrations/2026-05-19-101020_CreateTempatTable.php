<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTempatTable extends Migration
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
            'nama_tempat' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'kategori' => [
                'type'       => 'ENUM',
                'constraint' => ['wisata', 'cafe', 'hidden_gem'],
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'foto_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'rating_avg' => [
                'type'       => 'FLOAT',
                'default'    => 0,
            ],
            'jam_buka' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'maps_link' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default'    => 'aktif',
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
        $this->forge->createTable('tempat');
    }

    public function down()
    {
        $this->forge->dropTable('tempat');
    }
}