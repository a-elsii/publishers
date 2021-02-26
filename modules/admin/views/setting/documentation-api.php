<?php

use app\models\My\MyHelper;

/* @var $this yii\web\View */

$this->title = 'api-documentation';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body table-responsive no-padding">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">method</th>
                <th scope="col">url</th>
                <th scope="col">params</th>
                <th scope="col">result</th>
                <th scope="col" width="300">comment</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach (MyHelper::getDocumentationApi() as $item): ?>
                    <tr>
                        <td>
                            <?= $item['method']; ?>
                        </td>
                        <td>
                            /api/<?= $item['url']; ?>
                        </td>
                        <td>
                            <?php foreach ($item['params'] as $api_param): ?>
                                <?= $api_param; ?> <br />
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($item['return'] as $api_result): ?>
                                <?= $api_result; ?> <br />
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?= $item['comment']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
