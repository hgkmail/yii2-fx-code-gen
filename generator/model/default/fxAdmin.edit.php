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
    <th>修改<?= $className ?></th>
  </tr>
  <tr>
    <td align="center">
	<table width="100%" border="0" align="center" cellspacing="1"  class="tableAe colored">
        <form action="?m=<?= $className ?>Action&f=edit" method="post" enctype="multipart/form-data"  name="myform" onSubmit="return chkFrm(this)">
<?php foreach ($tableSchema->columns as $k => $v): ?>
<?php $info=!empty($customInfo[$v->name]) ? $customInfo[$v->name] : [] ?>
<?php if (!in_array('hide', $info)): ?>
<?php if (in_array('file', $info) || in_array('image', $info)): ?>
            <tr>
                <td class="tdName" nowrap><?= $v->comment ?>：</td>
                <td ><input name="<?= $v->name ?>" type="file" id="<?= $v->name ?>">
                    {if $vo.<?= $v->name ?>}<a href="{$host}/{$vo.<?= $v->name ?>}" target="_blank">查看</a>{/if}
<?php if (in_array('required', $info)): ?>
                    <span class="font_exp">*</span>
<?php endif; ?>
                </td>
            </tr>
<?php else: ?>
            <tr>
                <td width="15%" class="tdName" nowrap><?= $v->comment ?>：</td>
                <td width="35%" > <input name="<?= $v->name ?>" type="text" id="<?= $v->name ?>" value="{$vo.<?= $v->name ?>}" size="50" maxlength="50" >
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
            <td valign="middle" > <input type="hidden" name="<?= $tableSchema->primaryKey[0] ?>" value="{$vo.<?= $tableSchema->primaryKey[0] ?>}" />
              <input name="submit" type="submit" class="mbutton" id="submit" value="更新" autocomplete="off"> 
              <input type="hidden" name="backUrl" value="{$backUrl}" /> <input name="reset" type="reset" class="mbutton" id="reset"  value="重置" /> 
            </td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>


