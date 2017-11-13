<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

/* Добавляем мета теги: title, description, keywords */
$this->title = 'My Yii Application';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Description set inside view',
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Keywords set inside view',
]);
?>
<div class="site-index">
    <ul>
    <?php
        foreach ($categories as $category): ?>
            <li><a href="<?= Url::to(["$category->slug/"]) ?>"> <?= $category->title ?> </a></li>
    <?php endforeach; ?>
     </ul>
</div>
