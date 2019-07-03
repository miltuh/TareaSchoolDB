<?php require_once('../templates/header.php'); ?>
<?php require_once('../templates/navbar.php'); ?>
<br><br><br>
<div class="columns">
    <div class="column is-flex is-vcentered">
        <div class="section">
            <?php include_once('../templates/menu.php') ?>
        </div>
    </div>
    <div class="column is-three-fifths">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title title is-3">Students</p>
            </header>
            <div class="card-cotent is-flex is-horizontal-center">
                <table class="table is-hoverable">
                    <thead>
                        <th class="title is-5">Codigo</th>
                        <th class="title is-5">Nombre</th>
                        <th class="title is-5">Fecha de Nacimiento</th>
                        <th class="title is-5"></th>
                        <th class="title is-5"></th>
                        <th class="title is-5"></th>
                    </thead>
                    <tbody>
                      <tbody>
                      <?php
                      include('../src/database/connection.php');
                      $sql = 'select * from student';
                      $result = $db_con->query($sql);
                      foreach ($result as $values) :
                          if ($values["is_active"] == 1):  ?>
                          <tr>
                            <td><?php echo $values['codigo'] ?> </td>
                            <td><?php echo $values['fullname'] ?> </td>
                            <td><?php echo $values['birthdate'] ?> </td>
                            <td>
                              <a class='button is-small is-warning' href="update.php?id=<?php echo $values['id']?>&name=<?php echo $values['fullname']?>&date= <?php echo $values['birthdate']?>">
                                Actualizar
                              </a>
                            </td>
                            <td>
                              <a class='button is-small is-danger' href="../src/student_controller/delete.php?id=<?php echo $values['id']?>">
                                Borrar
                              </a>
                              <a class='button is-small is-warning' href="detail.php?detail=<?php echo $values['id']?>">
                                Detalle
                              </a>
                            </td>
                          </tr>
                        <?php endif ?>
                      <?php endforeach ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="column"></div>
</div>
<?php require_once('../templates/footer.php'); ?>
