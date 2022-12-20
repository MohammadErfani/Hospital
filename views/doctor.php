<?php
/**
 * @var $id string
 */
$id = (int)$id;
$query = "SELECT * FROM doctors where id = :id ";
$stmt = \app\core\Application::$app->db->prepare($query);
$stmt->execute(['id' => $id]);
$doctor = $stmt->fetch(PDO::FETCH_ASSOC);
$query = "SELECT * FROM users where id = :id ";
$stmt = \app\core\Application::$app->db->prepare($query);
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h3 class="text-success"><?php echo "DR.{$user['firstname']} {$user['lastname']}" ?></h3>
<table class="table">
    <?php
    foreach ($doctor as $key => $value):
        if($key === 'id' || $key === 'isRegister'){
            continue;
        }
        if ($value):
            ?>
            <tr>
                <th scope="row">
                    <?php echo ucfirst($key) ?>
                </th>
                <td>
                    <?php echo $value ?>
                </td>
            </tr>

        <?php
        endif;
    endforeach;

    ?>
</table>


<!--    <tr>-->
<!--        <th scope="row">-->
<!--            Address:-->
<!--        </th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">-->
<!--            Price:-->
<!--        </th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">-->
<!--            Visit Day:-->
<!--        </th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">-->
<!--            Visit Hour:-->
<!--        </th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">-->
<!--            Instagram:-->
<!--        </th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">-->
<!--            Telegram:-->
<!--        </th>-->
<!--    </tr>-->

