<?php 
ob_start();
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">email</th>
      <th scope="col">pass</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>ee@gmail.com</td>
      <td>rrr</td>
    </tr>
  </tbody>
</table>
<?php
$table=ob_get_clean();
?>