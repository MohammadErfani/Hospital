<h1 class="text-center">Welcome To Sharif Hospital</h1>
<div class="container mb-4 w-50">
    <input type="text" class="form-control" id="search_doctor" autocomplete="off" placeholder="Search Doctors">
</div>
<div id="result"></div>
<h2>List of Departments</h2>
<div class="d-flex">
    <?php

    use app\core\Application;

    $stmt = Application::$app->db->pdo->query('SELECT DISTINCT specialty from doctors');
    $departments = $stmt->fetchAll();

    foreach ($departments as $department) :
        ?>
        <a href='<?php echo "/department?id=$department[0]"; ?>'
           class="btn btn-outline-danger list-group-item list-group-item-action text-center" role="button"><?php echo ucfirst($department[0]); ?></a>
        <?php
    endforeach;
    ?>
</div>
<h3 class="mt-5">List of Doctors</h3>
<?php
    $sql = 'SELECT users.id as id ,firstname ,lastname, specialty from users join doctors on users.id = doctors.id where isRegister =? order by lastname';
    $stmt = Application::$app->db->prepare($sql);
    $stmt->execute([true]);
    $doctors = $stmt->fetchAll(PDO::FETCH_OBJ);

    ?>
    <ul class="list-group">
    <?php
    foreach($doctors as $doctor):
        ?>

    <form method="post">
        <button type="submit" class="btn btn-outline-dark  list-group-item mb-2 d-flex justify-content-between w-100" name="id" value="<?php echo $doctor->id ?>"><span><?php echo "DR.$doctor->firstname $doctor->lastname" ?></span>
        <span><?php echo ucfirst($doctor->specialty)  ?></span>
        </button>
    </form>


        <?php
    endforeach;
?>
    </ul>
<script>
    $('#search_doctor').keyup(function () {
        // var id = $(this).attr('value');
        var input = $(this).val();
        if(input != ''){
            $.ajax({
                method: "POST",
                url: "search",
                data: {
                    input : input
                },
                success: function (data){
                    $('#result').html(data);
                    $('#result').css('display','block')

                }
            });
        }else{
            $('#result').css('display','none')
        }

    })
</script>