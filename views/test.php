<?php
use app\core\form\Form;

$registers = ['general', 'heart', 'brain'];
?>

<h1>Set up your Profile</h1>

<?php $form = Form::begin('', 'post') ?>

<?php echo $form->field($model, 'doctorCode') ?>
<?php echo $form->field($model, 'education') ?>
<div class="form-group">
    <label>Choose your Spacialty: </label>
    <select class="form-select"  aria-label="Default select example" name="specialty">
        <?php
        foreach ($registers as $department) {
            ?>
            <option value='<?php echo $department; ?>'><?php echo $department; ?> </option>
            <?php
        }
        ?>
    </select>
</div>
<?php echo $form->field($model, 'workHour')->placeHolder('example: 9-17') ?>
<div class="mb-3">
    <label for="formFile" class="form-label">Add Profile Picture</label>
    <input class="form-control" type="file" id="formFile" name="picture">
</div>
<div class="mb-3">
    <label for="formFile" class="form-label">Add Your Resume</label>
    <input class="form-control" type="file" id="formFile" name="picture">
</div>
<button class="btn btn-success">Add</button>
<?php echo Form::end() ?>

