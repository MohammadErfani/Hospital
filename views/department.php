<?php
/**
 * @var $department
 */
use app\core\Application;
//$doctors = ['general'=>['mohamamd','reza','ali'],'heart'=>['hamid','hassan','ahmad'],'brain'=>['abbas','hadid']];
//$flag = true;
//if(array_key_exists($department,$doctors)){
//    foreach($doctors[$department] as $doctor){
//
//    }
    ?>
<!--        <a href='-->

    <?php //echo "/doctor?id=$doctor"; ?><!--' class="list-group-item list-group-item-action">--><?php //echo $doctor; ?><!--</a>-->
<!--    --><?php //}
//}else{ echo "Invalid department";
//}

?>
<?php
$sql = 'SELECT users.id as id ,firstname ,lastname, specialty from users join doctors on users.id = doctors.id where isRegister =:isRegister and specialty = :specialty  order by lastname';
$stmt = Application::$app->db->prepare($sql);
$stmt->execute(['isRegister'=>true,'specialty'=>$department]);
$doctors = $stmt->fetchAll(PDO::FETCH_OBJ);

    if($doctors !== []){

?>
<h3 class="mt-5">List of Doctors</h3>
<ul class="list-group">
    <?php

    foreach($doctors as $doctor):
        ?>

        <form method="post">
            <button  class="list-group-item mb-2 d-flex justify-content-between w-100" name="id" value="<?php echo $doctor->id ?>"><span><?php echo "DR.$doctor->firstname $doctor->lastname" ?></span>
                <span><?php echo ucfirst($doctor->specialty)  ?></span>
            </button>
        </form>


    <?php
    endforeach;
    }
    else{
        echo "<h3>This Department doesn't have any doctors</h3>";
    }
    ?>
</ul>
