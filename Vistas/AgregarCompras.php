<form action=<?="Agregar.php?Listar=" . $_GET['Listar']?> method="post">
  <p>Nombre: <input type="text" name="nombre" size="35" maxlength="35"></p>
  <p>Apellido: <input type="text" name="nombre" size="35" maxlength="35"></p>
  <p>Telefono: <input type="tel" name="telefono" size="9" maxlength="9"></p>
  <p>Email: <input type="text" name="nombre" size="50" maxlength="50"></p>
  <p>
    <input type="reset" value="Borrar">
    <input type="submit" value="Enviar">
  </p>
</form>