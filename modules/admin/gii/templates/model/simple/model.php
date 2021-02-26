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

$behaviors = [];
$addUse = [];
$init= [];
if(isset($properties['created_at'])&&isset($properties['created_at'])){
    $behaviors['timestamp']='TimestampBehavior::class';
    $addUse[]='yii\behaviors\TimestampBehavior';

}
if(isset($properties['status_del'])&&isset($properties['deleted_at'])){
    $behaviors['softDeleteBehavior']='SoftDeleteBehavior::class';
    $init[]='$this->on(SoftDeleteBehavior::EVENT_AFTER_SOFT_DELETE, [$this, \'onSoftDelete\'])';
    $init[]='$this->on(SoftDeleteBehavior::EVENT_AFTER_RESTORE, [$this, \'onRestore\'])';
}

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use Yii;
<?php if(count($addUse)):?><?php foreach ($addUse as $use): ?>
use <?= $use ?>;
<?php endforeach; ?><?php endif;?>

/**
 * This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
 *
<?php foreach ($properties as $property => $data): ?>
 * @property <?= "{$data['type']} \${$property}"  . ($data['comment'] ? ' ' . strtr($data['comment'], ["\n" => ' ']) : '') . "\n" ?>
<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?= $className ?> extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
<?php if(count($behaviors)): ?>

    public function behaviors() {
        return [<?php foreach ($behaviors as $key =>$line): ?><?="\n            ";?>'<?=$key;?>' => <?=$line;?>,<?php endforeach;?><?="\n       ";?>];
    }
<?php endif; ?>
<?php if(count($init)): ?>

    public function init()
    {
        parent::init();<?php foreach ($init as $line): ?><?="\n        ";?><?=$line;?>;<?php endforeach;?><?="\n";?>
    }
<?php endif; ?>

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }
<?php if ($generator->db !== 'db'): ?>

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('<?= $generator->db ?>');
    }
<?php endif; ?>

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [<?= empty($rules) ? '' : ("\n            " . str_replace('::className()','::class',implode(",\n            ", $rules)) . ",\n        ") ?>];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => " . $generator->generateString($label) . ",\n" ?>
<?php endforeach; ?>
        ];
    }
<?php foreach ($relations as $name => $relation): ?>

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get<?= $name ?>()
    {
        <?= str_replace('::className()','::class',$relation[0]) . "\n" ?>
    }
<?php endforeach; ?>
<?php if ($queryClassName): ?>
<?php
    $queryClassFullName = ($generator->ns === $generator->queryNs) ? $queryClassName : '\\' . $generator->queryNs . '\\' . $queryClassName;
    echo "\n";
?>
    /**
     * {@inheritdoc}
     * @return <?= $queryClassFullName ?> the active query used by this AR class.
     */
    public static function find()
    {
        return new <?= $queryClassFullName ?>(get_called_class());
    }
<?php else: ?>

    /**
    * {@inheritdoc}
    * @return DefaultQuery the active query used by this AR class.
    */
    public static function find($isAdmin = false)
    {
        return new DefaultQuery(get_called_class(), ['isAdmin' => $isAdmin]);
    }
<?php endif; ?>
<?php if(isset($behaviors['softDeleteBehavior'])): ?>

    /**
    * После Евента SoftDelete виполняем
    * @param $event
    */
    public function onSoftDelete($event)
    {

    }

    /**
    * После Евента Restore виполняем
    * @param $event
    */
    public function onRestore($event)
    {

    }
<?php endif; ?>
}
