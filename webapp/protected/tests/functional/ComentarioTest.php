<?php

class ComentarioTest extends WebTestCase
{
	public $fixtures=array(
		'comentarios'=>'Comentario',
	);

	public function testShow()
	{
		$this->open('?r=comentario/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=comentario/create');
	}

	public function testUpdate()
	{
		$this->open('?r=comentario/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=comentario/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=comentario/index');
	}

	public function testAdmin()
	{
		$this->open('?r=comentario/admin');
	}
}
