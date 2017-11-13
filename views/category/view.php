<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = $category->meta_title;
?>

<h1><?= $category->title ?></h1>
<p><?= $category->description ?></p>

<?php
    foreach ($models as $model):?>
        <li>
            <a href="<?= Url::to(["$category->slug/$model->slug"]) ?>"> <?= $model->title ?> </a>
        </li>
<?php endforeach ?>

<?php
echo LinkPager::widget([
        'pagination' => $pages,
])
?>
