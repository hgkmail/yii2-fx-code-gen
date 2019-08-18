{include file="common.header.php"}
<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="margin: 10px;">
    <tr>
        <td width="30%">
            <div class="tab">
                <ul>
                    <li style="width: 100px;" class="tab_current"><a href="?m=<?= $className ?>Action&f=lst"><?= $className ?>列表</a></li>
                </ul>
            </div>
        </td>
    </tr>
     <tr> 
    <form action="?" method="get">
      <input type="hidden" name="m" value="<?= $className ?>Action"/>
      <input type="hidden" name="f" value="lst"/>
      <td width="20%">
          <input type="submit" name="submit" class="mbutton" value="查询" >
      </td>
    </form>
    <td width="20%" align="right"><input type="button" name="submit" class="mbutton" value="发布" onclick="goAb('?m=<?= $className ?>Action&f=add')">  </td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" >
  <tr> 
    <th><?= $className ?>列表</th>
  </tr>
  <tr>
    <td align="center">
	<form name="frmList"  method="post" action="?m=<?= $className ?>Action&f=delete" onSubmit="return chkDelFrm(this)">
	    <table width="100%" border="0" cellspacing="1" cellpadding="2" class="tablelist colored">
          <tr class="colhead"> 
            <th width="26"> <input type="checkbox" name="allbox" id="allbox1"value="Check All" onClick="checkAll();"></th>
<?php foreach ($tableSchema->columns as $k => $v): ?>
<?php $info=!empty($customInfo[$v->name]) ? $customInfo[$v->name] : [] ?>
<?php if (!in_array('hide', $info)): ?>
            <th width="100" nowrap><?= $v->comment ?></th>
<?php endif; ?>
<?php endforeach; ?>
            <th width="100">操作</th>
          </tr>

          {foreach from=$dataList item=vo} 
          <tr>
            <td align="center"> <input class="cb1" name="id[]" type="checkbox" id="id" value="{$vo.<?= $tableSchema->primaryKey[0] ?>}"  /></td>
<?php foreach ($tableSchema->columns as $k => $v): ?>
<?php $info=!empty($customInfo[$v->name]) ? $customInfo[$v->name] : [] ?>
<?php if (!in_array('hide', $info)): ?>
<?php if (in_array('file', $info) || in_array('image', $info)): ?>
            <td align="center">{if $vo.<?= $v->name ?>}<a href="{$host}/{$vo.<?= $v->name ?>}" target="_blank"></a>{/if}</td>
<?php else: ?>
            <td> <a href="" target="_blank">{$vo.<?= $v->name ?>} </a></td>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
            <td height="22" align="center"><a href="?m=<?= $className ?>Action&f=edit&<?= $tableSchema->primaryKey[0] ?>={$vo.<?= $tableSchema->primaryKey[0] ?>}">修改</a></td>
          </tr>
          {/foreach}

          <tr> 
            <td height="22" colspan="9" ><a href="javascript:document.getElementById('allbox1').click()"><u>全选/全不选</u></a> 
              <input name="deleteSelected" type="submit" class="mbutton" value="删除"> 
            </td>
          </tr>
          <tr> 
            <td height="22" colspan="9"  class="td_pages"> {$pageString} </td>
          </tr>
        </table>
	  </form>
	  </td>
  </tr>
</table>

