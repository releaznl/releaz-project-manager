<?php

namespace common\rbac;

use yii\rbac\Rule;
use yii\base\Object;

/**
 * Checks if authorID matches user passed via params
 */
class EditFileRule extends Rule
{
	public $name = 'editFile';

	/**
	 * @param string|integer $user the user ID.
	 * @param Item $item the role or permission that this rule is associated with
	 * @param array $params parameters passed to ManagerInterface::checkAccess().
	 * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
	 */
	public function execute($user, $item, $params)
	{
// 		var_dump($params); exit;
		if (isset($params['file'])) {
			$file = $params['file'];
			
			if ($todo = $file->todo) {
				return $todo->functionality->project->isAssociated($user);
			} else {
				return $file->project->isAssociated($user);
			}
			
		} else {
			return false;
		}
	}
}