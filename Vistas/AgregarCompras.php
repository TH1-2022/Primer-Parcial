<form action=<?=$config['Controllers'] . "/agregar.php?Listar=" . $_GET['Listar']?> method="post">
  <p>ID Persona: <input type="text" name="idDePersona" size="35" maxlength="35"></p>
  <p>ID Producto: <input type="text" name="idDeProducto" size="35" maxlength="35"></p>
  <p>Fecha de compra: <input type="datetime-local" name="fechaDeCompra" size="9" maxlength="9"></p>
  <p>
    <input type="reset" value="Borrar">
    <input type="submit" value="Enviar">
  </p>
</form>