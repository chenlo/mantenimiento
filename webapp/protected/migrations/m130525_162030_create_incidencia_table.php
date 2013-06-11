<?php

class m130525_162030_create_incidencia_table extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_incidencia', array(
                'id' => 'pk',
                'nombre' => 'string NOT NULL',
                'descripcion' => 'text NOT NULL',
                'create_time' => 'datetime DEFAULT NULL',
                'create_usuario_id' => 'int(11) DEFAULT NULL',
                'update_time' => 'datetime DEFAULT NULL',
                'update_usuario_id' => 'int(11) DEFAULT NULL',
                'estado_id' => 'int(11) DEFAULT NULL',
                'prioridad_id' => 'int(11) DEFAULT NULL',
                'asignado_usuario_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            $this->addForeignKey("fk_incidencia_usuario", "tbl_incidencia", "asignado_usuario_id", "users", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		$this->dropTable('tbl_incidencia');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}