<?php

use app\core\form\Form;

?>

<h1>Login</h1>
    <?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <div class="form-group">
        <label>Choose your Role:  </label>
        <select class="form-select" aria-label="Default select example" name="role">
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="manager">Manager</option>
        </select>
    </div>
    <button class="btn btn-success">Submit</button>
<?php echo Form::end() ?>