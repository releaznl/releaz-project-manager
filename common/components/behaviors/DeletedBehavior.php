<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\components\behaviors;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;
use yii\db\Expression;

class DeletedBehavior extends AttributeBehavior
{
	/**
	 * @var string the attribute that will receive timestamp value
	 * Set this property to false if you do not want to record the creation time.
	 */
	public $deletedAttribute = 'deleted';
	/**
	 * @var callable|Expression The expression that will be used for generating the timestamp.
	 * This can be either an anonymous function that returns the timestamp value,
	 * or an [[Expression]] object representing a DB expression (e.g. `new Expression('NOW()')`).
	 * If not set, it will use the value of `time()` to set the attributes.
	 */
	public $value;


	/**
	 *
	 */
	public function init()
	{
		parent::init();

		if (empty($this->attributes))
		{
			$this->attributes = [
				BaseActiveRecord::EVENT_BEFORE_INSERT => $this->deletedAttribute,
			];
		}
	}

	/**
	 * @param $event
	 * @return mixed|Expression
	 */
	protected function getValue($event)
	{
		return false;
	}

	/**
	 * @param $attribute
	 */
	public function touch($attribute)
	{
		$this->owner->updateAttributes(array_fill_keys((array)$attribute, $this->getValue(null)));
	}
}
