<?php  $form = app\core\form\Form::begin('' , "post")?>
        <?php  echo $form->field($model, 'username') ?>
        <?php  echo $form->field($model, 'firstname') ?>
        <?php  echo $form->field($model, 'lastname') ?>
        <?php  echo $form->field($model, 'email') ?>
        <?php  echo $form->field($model, 'password')->passwordField() ?>
        <?php  echo $form->field($model, 'confirm')->passwordField() ?>

        <button type="submit" class="btn btn-primary">submit</button>

  
  <?php app\core\form\Form::end() ?>