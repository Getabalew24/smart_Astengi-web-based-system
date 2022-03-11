
<?php $form = \app\core\form\Form::begin("", "post"); ?>
    <?php  echo $form->field($model, 'gradeLevel') ?>
    <?php  echo $form->field($model, 'No_student') ?>
    <?php  echo $form->field($model, 'Duration') ?>
    <?php  echo $form->field($model, 'Day_Per_week') ?>
    <?php  echo $form->field($model, 'Salary') ?>
    <?php  echo $form->field($model, 'addereas') ?>
    <?php  echo $form->field($model, 'description') ?>
    <button type="submit" class="btn btn-primary">submit</button>
<?php \app\core\form\Form::end() ?>