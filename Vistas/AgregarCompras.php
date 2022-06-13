<form action=<?=$config['Controllers'] . "/Agregar.php?Listar=" . $_GET['Listar']?> method="post">
  <p>ID Persona: <input type="text" name="nombre" size="35" maxlength="35"></p>
  <p>ID Producto: <input type="text" name="nombre" size="35" maxlength="35"></p>
  <p>Fecha de compra: <input type="tel" name="telefono" size="9" maxlength="9"></p>
  <p>
    <input type="reset" value="Borrar">
    <input type="submit" value="Enviar">
  </p>
</form>