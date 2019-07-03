
<?php require_once('../templates/header.php'); ?>
<?php require_once('../templates/navbar.php'); ?>

<?php
$id = $_GET['detail'];
require_once('../src/database/connection.php');
    $course = $db_con->query("SELECT s.name, t.fullname as profesor, sy.start_date, sy.end_date
                                FROM teacher t, subject s, subject_year sy, year y
                                WHERE sy.teacher_id = t.id
                                AND sy.subject_id = s.id
                                AND sy.year_id = y.id
                                AND y.year = year(now())
                                AND s.id = $id");

     $students = $db_con->query("SELECT s.codigo,  s.fullname
                                    FROM student s, subject sub, subject_year sy, student_subject_year ssy
                                    WHERE sy.subject_id = sub.id
                                    AND ssy.student_id = s.id
                                    AND ssy.subject_year_id = sy.id
                                    AND sub.id = $id;");


?>

<div class="container" style="margin-top:3%">
 <?php $c = $course->fetch(); ?>
    <div class="columns">
        <div class="column">
          <?php echo $c['name'];?> <br>
          <?php echo $c['profesor']; ?>
          <p><b>Inicio: </b><?php echo $c['start_date'];?></p>
          <p><b>Fin: </b><?php echo $c['end_date'];?></p>
        </div>
        <div class="column is-one-quarter">
            <button class="button is-primary">Print list</button>
            <a href="list.php" class="button is-warning">Back</a>
        </div>
    </div>

    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
            </tr>
        </thead>
        <?php  $i = 0; ?>
        <?php foreach($students as $row):  ?>

        <tr>

            <td><?php echo $i = $i + 1 ?></td>


            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
        </tr>
        <?php endForEach; ?>
    </table>
</div>


<?php require_once('../templates/footer.php'); ?>
