<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        {
            $this->forge->addField([
                'id'=> [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,

                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,

                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'unique' => true,
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'update_at' => [
                     'type' => 'DATETIME',
                    'null' => true, 
                ],
            ]);
    
                }      
                $this->forge->addkey('id',true);
                $this->gorge->createTable('pengunjung'); 
                              
    }
  



}
