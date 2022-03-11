
<?php $form = \app\core\form\Form::begin("", "post"); ?>
    <?php  echo $form->field($model, 'firstname') ?>
    <?php  echo $form->field($model, 'lastname') ?>
    <?php  echo $form->field($model, 'email') ?>
    <button type="submit" class="btn btn-primary">submit</button>
<?php \app\core\form\Form::end() ?>
