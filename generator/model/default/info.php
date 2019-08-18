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
/* @var $customInfo array list of field settings (name => field setting) */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Schema</title>
    <meta charset="UTF-8">
</head>

<body>

<table border="1" style="border-collapse: collapse;">
    <caption style="padding-bottom:5px;">Schema:&nbsp;<?= $tableName ?></caption>
    <tr>
        <th>column</th>
        <th>type</th>
        <th>features</th>
    </tr>
<?php foreach ($tableSchema->columns as $k => $v): ?>
    <tr>
        <td><?= $v->name ?></td>
        <td><?= $v->type ?>,<?= $v->dbType ?>,<?= $v->phpType ?></td>
        <td>
            <ul>
<?php if(!empty($v->comment)): ?>
                <li><?= $v->comment ?></li>
<?php endif; ?>
<?php if (isset($customInfo[$v->name])): ?>
<?php $info=$customInfo[$v->name] ?>
<?php foreach ($info as $idx=>$val): ?>
                <li><?= $val ?></li>
<?php endforeach; ?>
<?php endif; ?>
            </ul>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<p>primary: <?= $tableSchema->primaryKey[0] ?></p>

</body>
</html>
