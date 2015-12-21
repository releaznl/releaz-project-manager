<?php

namespace common\components\grid;

use Yii;

class TotalColumn
{
	public static function pageTotal($provider, $field_name)
	{
		$total = 0;
		foreach ($provider as $item) {
			$total += $item[$field_name];
		}
		return Yii::$app->formatter->asCurrency($total);
	}
}
