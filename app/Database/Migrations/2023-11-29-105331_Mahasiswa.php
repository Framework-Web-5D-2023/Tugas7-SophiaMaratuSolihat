<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
              'type'           => 'INT',
              'constraint'     => 5,
              'unsigned'       => true,
              'auto_increment' => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'nama' => [
              'type'       => 'VARCHAR',
              'constraint' => '50',
            ],
            'npm' => [
              'type'       => 'VARCHAR',
              'constraint' => '100',
            ],
            'prodi' => [
              'type'       => 'VARCHAR',
              'constraint' => '20',
            ],
            'created_at' => [
              'type'       => 'date',
              'null' => TRUE,
            ],
            'updated_at' => [
              'type'       => 'date',
              'null' => TRUE,
            ],
            'deleted_at' => [
              'type'       => 'date',
              'null' => TRUE,
            ],
          ]);
          $this->forge->addKey('id', true);
          $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
