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

?>
{include file="common.header.php"}
<script src="js/My97DatePicker/WdatePicker.js" ></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" > 
      <input type="button" name="submit" class="mbutton" value="返回" onclick="location.href='{$backUrl}'">
    </td>
  </tr>
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <th>新增<?= $className ?></th>
  </tr>
  <tr>
    <td align="center"> 
	
	<table width="100%" border="0" align="center" cellspacing="1"  class="tableAe colored">
        <form action="?m=<?= $className ?>Action&f=add" method="post" enctype="multipart/form-data" name="myform" onSubmit="return chkFrm(this)">
<?php foreach ($tableSchema->columns as $k => $v): ?>
<?php $info=!empty($customInfo[$v->name]) ? $customInfo[$v->name] : [] ?>
<?php if (!in_array('hide', $info)): ?>
<?php if (in_array('file', $info) || in_array('image', $info)): ?>
            <tr>
                <td class="tdName" nowrap><?= $v->comment ?>：</td>
                <td ><input name="<?= $v->name ?>" type="file" id="<?= $v->name ?>">
<?php if (in_array('required', $info)): ?>
                    <span class="font_exp">*</span>
<?php endif; ?>
                </td>
            </tr>
<?php else: ?>
            <tr>
                <td width="15%" class="tdName" nowrap><?= $v->comment ?>：</td>
                <td width="35%" > <input name="<?= $v->name ?>" type="text" id="<?= $v->name ?>" size="50" maxlength="50" >
<?php if (in_array('required', $info)): ?>
                    <span class="font_exp">*</span>
<?php endif; ?>
                </td>
            </tr>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
          <tr> 
            <td align="center" valign="middle">&nbsp;</td>
            <td valign="middle" ><input name="submit2" type="submit" class="mbutton" id="submit" value="提交" autocomplete="off"> 
              <input type="hidden" name="backUrl" value="{$backUrl}" /> <input name="reset" type="reset" class="mbutton" id="reset" value="重置" /> 
            </td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
