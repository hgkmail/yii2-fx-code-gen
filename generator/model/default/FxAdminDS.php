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

/**
 * <?= $className ?>模块
 *
 * @category	Kugou.Com
 * @package		\Fx\DAL\<?= $className ?>
 * @copyright	广州酷狗科技有限公司版权所有 Copyright (c) 2000-2019 (http://www.kugou.com)
 * @version
 * @author
 */ 

namespace Fx\DAL\<?= $className ?>;

if (!defined('INC_PATH')) exit('Access denied.');

/**
 * 该类表示一个名称为 <?= $className ?>DS 的数据源
 *
 */
class <?= $className ?>DS extends \Fx\Common\DbCommonHsBase
{
	/**
	 * 数据源结构$_SCHEMA_
	 * 当前数据源所对应的数据库表的简单定义
	 *
	 * @var array
	 */
	protected static $_SCHEMA_ = array(
		'schemaName'=>'<?= $tableName ?>', //表名
		'columnNameList'=>array(
<?php foreach ($tableSchema->columns as $k => $v): ?>
        '<?= $v->name ?>'=>array('type'=>'<?= $v->dbType ?>', 'isAllowNull'=>false, <?php if(!$v->isPrimaryKey):?>'defaultValue'=>''<?php endif;?>), //<?=$v->comment?>

<?php endforeach; ?>
		),
	    'keyList'=>array(
	        'definition'=>array(
				'PRIMARY'=>array(
	                '<?= $tableSchema->primaryKey[0] ?>'=>'<?= $tableSchema->primaryKey[0] ?>',
			    ),		
	        ),
	        'mapping'=>array(
	            '<?= $tableSchema->primaryKey[0] ?>'=>'PRIMARY',
	        ),
	    ),
	    'indexList'=>array(
	        'definition'=>array(
	        ),
	        'mapping'=>array(
	        ),
	    ),				
	    'columnNameAutoIncrement'=>'<?= $tableSchema->primaryKey[0] ?>',
	);

	/**
	 * 获得数据库封装实例
	 *
	 * @param array $fields 按需获取参数,参考数据源定义的key(如数据库的字段名称)
	 * @return \System\Common\DbTableHelperBaseOnHandlerSocket
	 * @example
	 *         获取多行记录 : static::getDbInstance(array('clanName'))->valueLike('clanName', $keyword)->limitPage($pageIndex, $pageSize)->fetchAll();
	 *         插入一条记录 : static::getDbInstance()->insertAutoIncrement($data , false);
	 *         插入多条记录 : static::getDbInstance()->insertMulti($arrayDbRows);
	 *         删除记录 : static::getDbInstance()->valueLike('clanName', $keyword)->delete();
	 */
	public static function getDbInstance($fields = null)
	{
		return \Fx\Common\DataTableHelpers\DbTableHelperForNonCore::getClearedSingleton(static::$_SCHEMA_ , $fields, array('hsSlaveRead'=>true));
	}

	/**
	 * 获得数据库封装实例
	 *
	 * @param array $fields 按需获取参数,参考数据源定义的key(如数据库的字段名称)
	 * @return \System\Common\DbTableHelperBaseOnHandlerSocket
	 * @example
	 *         获取多行记录 : static::getDbInstance(array('clanName'))->valueLike('clanName', $keyword)->limitPage($pageIndex, $pageSize)->fetchAll();
	 *         插入一条记录 : static::getDbInstance()->insertAutoIncrement($data , false);
	 *         插入多条记录 : static::getDbInstance()->insertMulti($arrayDbRows);
	 *         删除记录 : static::getDbInstance()->valueLike('clanName', $keyword)->delete();
	 */
	public static function getDbInstanceWithHs($fields = null)
	{
		return \Fx\Common\DataTableHelpers\DbTableNonCoreBaseOnHandlerSocketHelper::getClearedSingleton(static::$_SCHEMA_ , $fields, array('hsSlaveRead'=>true));
	}

    /**
     * 添加
     * @param $data
     * @param $operationAdminId
     * @param $operationAdminName
     * @return bool|int
     */
	public static function add($data,$operationAdminId,$operationAdminName) {
        //TODO
	}

    /**
     * 编辑
     * @param $data
     * @param $bid
     * @param $operationAdminId
     * @param $operationAdminName
     * @return bool
     */
	public static function edit($data,$id,$operationAdminId,$operationAdminName) {
        //TODO
	}

    /**
     * 批量删除
     * @param $bids
     * @param $operationAdminId
     * @param $operationAdminName
     * @return bool
     */
    public static function del($ids,$operationAdminId,$operationAdminName) {
        //TODO
    }
	
	public static function get($id) {
        //TODO
	}

}// end class <?= $className ?>DS