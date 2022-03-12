
<?php $form = \app\core\form\Form::begin("", "post"); ?>
    <?php  echo $form->field($model, 'firstname') ?>
    <?php  echo $form->field($model, 'lastname') ?>
    <?php  echo $form->field($model, 'email') ?>
    <button type="submit" class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1" >submit</button>
<?php \app\core\form\Form::end() ?>
