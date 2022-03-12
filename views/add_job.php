
  <?php $form = \app\core\form\Form::begin('', "post"); ?>
        <?php  echo $form->field($model, 'Name_of_student') ?>
        <?php  echo $form->field($model, 'gradeLevel') ?>
        <?php  echo $form->field($model, 'No_student') ?>
        <?php  echo $form->field($model, 'Duration') ?>
        <?php  echo $form->field($model, 'Day_Per_week') ?>
        <?php  echo $form->field($model, 'Salary') ?>
        <?php  echo $form->field($model, 'addereas') ?>
        <?php  echo $form->field($model, 'description') ?>

        <button type="submit" class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1">submit</button>
 
 <?php \app\core\form\Form::end() ?>

