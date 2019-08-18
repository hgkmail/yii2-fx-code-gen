<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $properties array list of properties (property => [type, name. comment]) */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace Fx\BLL\<?= $className ?>;

use Fx\DAL\<?= $className ?>\<?= $className ?>DS;

/**
 *
 * @category Kugou.Com
 * @package Fx\BLL\Admin
 * @copyright 广州酷狗科技有限公司版权所有 Copyright (c) 2004-2019 (http://www.kugou.com)
 * @author
 */
class <?= $className ?>BL {

	public static function lst($page, $pageSize) {
        $arrWhere = null;
		$datas = <?= $className ?>DS::getListBy($arrWhere, array(), '<?= $tableSchema->primaryKey[0] ?>',  array('<?= $tableSchema->primaryKey[0] ?>'=>'DESC'), $page, $pageSize, $count);
		if (empty($datas)){
			return array();
		}
		
		return array($datas, $count);
	}

}