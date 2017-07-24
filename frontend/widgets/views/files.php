<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/14/16
 * Time: 12:29 PM
 */

?>

<div class="row">
    <?php foreach($models as $model) {
        $dir = realpath(dirname(__FILE__)).'/../../../'.Yii::$app->params['attach_dir'];
        $filename = $model->guid.'.'.$model->extension;
        if(file_exists($dir.$filename)) {
            $href = $admin === true ? 'http://'.Yii::$app->params['frontend'] : '';
            $href .= Yii::$app->params['attach_path'].$filename;
            $count = strlen($model->name);
            if($count>58) {
                $first = substr($model->name,0,10);
                $last = substr($model->name,$count-10,10);
                $name =$first.'...'.$last.' ';
            } else {
                $name = $model->name;
            }
            ?>
        <div class="col-md-12">
            <?php if($admin === true) { ?>
            <span class="glyphicon glyphicon-remove remove-btn"><a href="/attach/delete/<?=$model->id?>"><?=Yii::t('main','Удалить')?></a></span>
            <?php }?>
           <button onclick="window.location.href='<?=$href?>'" class="btn btn-xs btn-success"><?=Yii::t('main','Cкачать')?></button>
           <a href="<?=$href?>"><?=$name?></a>
           <label><?=\common\components\StaticFunctions::getFileSize($model->size)?></label>
           <br>
           <br>
        </div>
    <?php } } ?>
</div>
