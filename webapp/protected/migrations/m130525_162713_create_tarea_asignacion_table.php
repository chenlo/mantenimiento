<?php

class m130525_162713_create_tarea_asignacion_table extends CDbMigration
{
	public function up()
	{
            //create the issue table
		$this->createTable('tbl_tarea', array(
                    'id' => 'pk',
		    'nombre' => 'string NOT NULL',
		    'descripcion' => 'text',
		    'incidencia_id' => 'int(11) DEFAULT NULL',
		    'tipo_id' => 'int(11) DEFAULT NULL',
                    'estado_id' => 'int(11) DEFAULT NULL',
                    'create_time' => 'datetime DEFAULT NULL',
                    'create_user_id' => 'int(11) DEFAULT NULL',
                    'update_time' => 'datetime DEFAULT NULL',
                    'update_user_id' => 'int(11) DEFAULT NULL',
                    'tiempo_realizacion' => 'int(11) DEFAULT NULL',
		 ), 'ENGINE=InnoDB');
		
		
		//foreign key relationships
		$this->addForeignKey("fk_tarea_incidencia", "tbl_tarea", "incidencia_id", "tbl_incidencia", "id", "CASCADE", "RESTRICT");
	
		
	}

	public function down()
	{
            $this->truncateTable('tbl_tarea');
            $this->dropTable('tbl_tarea');
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