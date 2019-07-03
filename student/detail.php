<?php require_once('../templates/header.php'); ?>
<?php require_once('../templates/navbar.php'); ?>

<?php require_once('../src/database/connection.php'); ?>
<?php
$id = $_GET['detail'];
        $result = $db_con->query("SELECT sub.name as curso, ssy.score as nota, sy.end_date as eva, y.year as ciclo
                 FROM student s, subject sub, student_subject_year ssy, year y, subject_year sy
                 WHERE ssy.student_id = s.id
                 AND  ssy.subject_year_Id = sy.id
                 AND sy.subject_id = sub.id
                 AND sy.year_Id = y.id
                 AND s.id = $id;");
        $student = $db_con->query("SELECT s.codigo, s.fullname as nombre, ROUND(datediff(now(), s.birthdate)/365) as edad
                                  FROM student s WHERE s.id = $id;");


?>


<div class="container" style="margin-top:3%">

    <?php $s = $student->fetch(); ?>
    <div class="columns">

        <div class="column">

          <?php echo $s['nombre'];?> <br>
          <?php echo $s['codigo']; ?>
          <p><?php echo $s['edad'];?> años</p>
        </div>
        <div class="column is-one-quarter">
            <button class="button is-primary">Print</button>
            <button class="button is-primary">Asign</button>
            <a href="list.php" class="button is-warning">Back</a>
        </div>
    </div>
    <table class="table is-fullwidth">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Year</th>
                   <th>State</th>
                   <th>Score</th>
               </tr>
           </thead>
           <?php
               $i = 0;
               forEach($result as $row):  ?>
           <tr>
               <td><?php echo $i = $i + 1; ?></td>
               <td><?php echo $row['curso']; ?></td>
               <td><?php echo $row['ciclo']; ?></td>

           </tr>
           <?php endforeach; ?>
       </table>
   </div>

</div>

<?php require_once('../templates/footer.php'); ?>
