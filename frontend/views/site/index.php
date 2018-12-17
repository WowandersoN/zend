<?php

//use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\slider\Slider;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<div class="site-index" id = "vue-container">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">


        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>
                <custom-tag
                        v-for="item in groceryList"
                        v-bind:todo="item"
                        v-bind:key="item.id"
                ></custom-tag>
                <?=Yii::t('app', 'test')?>
                <p>{{message}}</p>
                <p>{{reverseMessage()}}</p>
                <p>{{reversedMessage}}</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <input v-model="message">

                <p v-if="seen">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">

                <h2>Sphinx</h2>

                <?=Html::input('text', 'name', null, ['id' => 'input'])?>
                <?= Slider::widget([
                    'name' => 'slider',
                    'options' => [
                        'id' => 'wine_slider'
                    ],
                    'sliderColor' => Slider::TYPE_DANGER,
                    'handleColor' => Slider::TYPE_DANGER,
                    'pluginOptions' => [
                        'orientation' => 'horizontal',
                        'handle' => 'round',
                        'range' => true,
                        'min' => 0,
                        'max' => 20000,
                        'step' => 1
                    ],
                ]); ?>
                <button id = "submit-button">Submit</button>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        $('#input').on('change', function () {
            val = $(this).val();

            arr = new Object();
            arr.name = val;
            sendReq(arr);

        });
        $('#wine_slider').on('change', function () {
            val = $(this).val();
            arr = new Object();
            arr.price = val;
            sendReq(arr);

        })
    };
    function sendReq(data){
        console.log(data);
        $.ajax({
            type: "POST",
            url: "<?=Url::toRoute(['/site/get-wine'])?>",
            data: data,
            success: function(res)
            {
                return console.log(res);
                if(res['status'] === 'success')
                {

//                    toastrSuccess('Сохранено');
//                    $('#confirm-modal').modal('hide');
                } else {
                    console.log(res['data']);
                }
            }
        });
    }
</script>