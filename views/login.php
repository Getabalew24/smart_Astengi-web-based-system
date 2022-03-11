 <?php $form = \app\core\form\Form::begin('', "post"); ?>
        <?php  echo $form->field($model, 'username') ?>
        <?php  echo $form->field($model, 'password')->passwordField() ?>
        <button type="submit" class="btn">submit</button>
  
  <!-<?php \app\core\form\Form::end() ?>
