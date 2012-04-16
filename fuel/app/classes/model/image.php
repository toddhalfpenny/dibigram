<?php
use Orm\Model;

class Model_Image extends Model
{
	protected static $_properties = array(
		'id',
		'caption',
		'filepath',
		'description',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('caption', 'Caption', 'required|max_length[255]');
		//$val->add_field('filepath', 'Filepath', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required|max_length[255]');

		return $val;
	}

}
