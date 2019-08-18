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
 *  <?= $className ?>Action <?= $className ?>类定义文件
 *
 * @category Kugou.Com
 * @package Fx\Actions
 * @copyright 广州酷狗科技有限公司版权所有 Copyright (c) 2004-2019 (http://www.kugou.com)
 * @author
 */
namespace Fx\Actions\Admin;

use Fx\DAL\<?= $className ?>\<?= $className ?>DS;
use Fx\BLL\<?= $className ?>\<?= $className ?>BL;
use System\Resources\LanguageResource;
use System\Common\Pager;

if (!defined('INC_PATH')) exit('Access denied.');

class <?= $className ?>Action extends \Fx\Actions\AdminActionBase{

	public static function add() {
		if(empty($_POST)){
			$smarty = self::getSmarty();
			$backUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']  : '?m=<?= $className ?>Action&f=lst';
			$smarty->assign( 'backUrl', $backUrl);
			$smarty->display('<?= strtolower($className) ?>.add.php');
		} else {
<?php foreach ($tableSchema->columns as $k => $v): ?>
<?php $info=!empty($customInfo[$v->name]) ? $customInfo[$v->name] : [] ?>
<?php if (!in_array('hide', $info)): ?>
			$data['<?= $v->name ?>'] = $_POST['<?= $v->name ?>']; //TODO
<?php endif; ?>
<?php endforeach; ?>
			$data['addTime'] = time();
            $operationAdminId  = isset($_SESSION['SES_ADMIN']['adminId']) ? $_SESSION['SES_ADMIN']['adminId'] : 0 ;
            $operationAdminName  = isset($_SESSION['SES_ADMIN']['userName']) ? $_SESSION['SES_ADMIN']['userName'] : 0 ;
			if(<?= $className ?>DS::add($data,$operationAdminId,$operationAdminName)){
				self::success('增加成功', '?m=<?= $className ?>Action&f=lst');
			}else{
				self::error('处理异常，请联系技术', '?m=<?= $className ?>Action&f=lst');
			}

		}
	}

	public static function edit(){
		$<?= $tableSchema->primaryKey[0] ?> = $_REQUEST['<?= $tableSchema->primaryKey[0] ?>'];
		if(empty($_POST)){
			$vo = <?= $className ?>DS::getByAutoIncrementId($<?= $tableSchema->primaryKey[0] ?>);
			$smarty = self::getSmarty();
			$smarty->assign('vo' , $vo);
			$backUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']  : '?m=FocusAction&f=lst';
			$smarty->assign( 'backUrl', $backUrl);
			$smarty->display('<?= strtolower($className) ?>.edit.php');
		} else {
<?php foreach ($tableSchema->columns as $k => $v): ?>
<?php $info=!empty($customInfo[$v->name]) ? $customInfo[$v->name] : [] ?>
<?php if (!in_array('hide', $info)): ?>
			$data['<?= $v->name ?>'] = $_POST['<?= $v->name ?>']; //TODO
<?php endif; ?>
<?php endforeach; ?>
            $operationAdminId  = isset($_SESSION['SES_ADMIN']['adminId']) ? $_SESSION['SES_ADMIN']['adminId'] : 0 ;
            $operationAdminName  = isset($_SESSION['SES_ADMIN']['userName']) ? $_SESSION['SES_ADMIN']['userName'] : '';
            if(<?= $className ?>DS::edit($data, $<?= $tableSchema->primaryKey[0] ?>, $operationAdminId, $operationAdminName)){
                self::success('修改成功', '?m=<?= $className ?>Action&f=lst');
            }else{
                self::error('编辑失败,请联系技术！', '?m=<?= $className ?>Action&f=lst');
            }

		}
	}

	public static function delete(){
		$selectedIds = $_POST['id'];
		$arrWhere = array('<?= $tableSchema->primaryKey[0] ?>'=>$selectedIds);
        $operationAdminId  = isset($_SESSION['SES_ADMIN']['adminId']) ? $_SESSION['SES_ADMIN']['adminId'] : 0 ;
        $operationAdminName  = isset($_SESSION['SES_ADMIN']['userName']) ? $_SESSION['SES_ADMIN']['userName'] : '';
        if(<?= $className ?>DS::del($arrWhere,$operationAdminId,$operationAdminName)){
            self::success('删除成功');
        }else{
            self::error('删除失败！');
        }

	}

	public static function lst(){
		$pageSize = self::PAGE_SIZE;
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$dataList = array();
		$pageString = '';
		$data = <?= $className ?>BL::lst($page, $pageSize);
		if (!empty($data)){
			$dataList = $data[0];
			$recordCount = $data[1];

			$pagePram = array();
			$pager = new Pager($recordCount, $pageSize, $pagePram);
			$pageString = $pager->genBasic();
			foreach($dataList as $dkey => $dval){
                //TODO
			}
		}

		$smarty = self::getSmarty();
		$smarty->assign('dataList', $dataList);
		$smarty->assign('pageString', $pageString);
		$smarty->display('<?= strtolower($className) ?>.lst.php');
	}

}