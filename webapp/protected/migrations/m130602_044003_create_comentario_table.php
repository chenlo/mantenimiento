<?php

class m130602_044003_create_comentario_table extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_comentario', array(
            'id' => 'pk',
            'contenido' => 'text NOT NULL',
            'incidencia_id' => 'int(11) NOT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'create_user_id' => 'int(11) DEFAULT NULL',
            'update_time' => 'datetime DEFAULT NULL',
            'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            
            
            $this->addForeignKey("fk_comentario_incidencia", "tbl_comentario", "incidencia_id", "tbl_incidencia", "id", "CASCADE", "RESTRICT");
            
            $this->addForeignKey("fk_comentario_propietario", "tbl_comentario", "create_user_id", "users", "id", "RESTRICT", "RESTRICT");
            
            $this->addForeignKey("fk_comentario_actualizado_usuario", "tbl_comentario","update_user_id", "users", "id", "RESTRICT", "RESTRICT");


	}

	public function down()
	{
            $this->dropForeignKey('fk_comentario_incidencia', 'tbl_comment');
            $this->dropForeignKey('fk_comentario_propietario', 'tbl_comment');
            $this->dropForeignKey('fk_comentario_actualizado_usuario', 'tbl_comment');
            $this->dropTable('tbl_comentario');

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