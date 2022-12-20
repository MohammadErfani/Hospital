<?php
use app\core\form\Form;

$registers = ['mohammad','ali','hassan'];
?>

    <h1>Profile</h1>

<?php $form = Form::begin('', 'post','registerForm') ?>
    <div class="form-group">
        <label>Which you want to register: </label>
        <br>
        <select class="form-select" multiple aria-label="Default select example" name="register" id="register">
            <?php
            foreach ($registers as $register) {
                ?>
                <option value='<?php echo $register; ?>'><?php echo $register; ?> </option>
                <?php
            }
            ?>
        </select>
    </div>
    <button id="registerBut" class="btn btn-success">Register</button>
<?php echo Form::end() ?>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'createDepartment') ?>
<button class="btn btn-success">Create</button>
<?php echo Form::end() ?>

<script>
    $('#registerBut').click(function (e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "",
            data: $('#registerForm').serializeArray()
    })
</script>