<?php

use yii\helpers\Html;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-view">

</div>
<?php
$this->registerJs(
    <<<JS
    var token = '';
    var weather;
    $.ajax({
        type: "POST",
        url: 'http://127.0.0.1:8100/auth?username=admin&password=admin',
        success: function(da) {
            token = da.token;
            $.ajax({
                type: "GET",
                url: 'http://127.0.0.1:8100/weather',
                headers: {
                    "token": da.token
                },
                success: function(da) {
                    $(".test-view").html(JSON.stringify(da));
                },  
                dataType: 'json'
            });
        },
        dataType: 'json'
    });

JS
    , yii\web\View::POS_READY);
?>
