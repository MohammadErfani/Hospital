<?php
/**
 * @var $input string
 */
$sql = "SELECT users.id as id ,firstname ,lastname, specialty from users join doctors on users.id = doctors.id where isRegister =? AND (firstname like '{$input}%' or lastname like '{$input}%')";
$stmt = \app\core\Application::$app->db->prepare($sql);
$stmt->execute([true]);
$doctors = $stmt->fetchAll(PDO::FETCH_OBJ);
$html = '<ul class="list-group">';
foreach ($doctors as $doctor){
    $html .= '    <form method="post">
        <button type="submit" class="btn btn-outline-dark  list-group-item mb-2 d-flex justify-content-between w-100" name="id" value="'.$doctor->id.'"><span>DR.'.$doctor->firstname .' '. $doctor->lastname.'</span>
        <span>'.ucfirst($doctor->specialty).' </span>
        </button>
    </form>';
}
echo $html;