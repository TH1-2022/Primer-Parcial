<form action=<?=$config['Controllers'] . "/agregar.php?Listar=" . $_GET['Listar']?> method="post">
  <p>Nombre: <input type="text" name="nombre" size="35" maxlength="35"></p>
  <p>Descripcion: <textarea name="descripcion" rows="10" cols="50" wrap="soft"></textarea></p>
  <p>Stock: <input type="number" min="-1" max="999" name="stock"></p>
  <p>
    <input type="reset" value="Borrar">
    <input type="submit" value="Enviar">
  </p>
</form>