<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 10:50
 */
$script=<<<JS
$(function(){
    $('#myModal').modal('show');
})
JS;
$this->registerJs($script);
?>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?=$message[0]?>
            </div>
            <div class="modal-body">
                <?=$message[1]?>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
