<?php
use app\core\form\Form;
?>

<h1>Register</h1>

<?php $form =  Form::begin('', 'post') ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model,'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
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