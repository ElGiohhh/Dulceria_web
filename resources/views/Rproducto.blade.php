<x-plantilla>
<Script>
<form action="registrar_producto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br>

        <label for="precio_menudeo">Precio Menudeo:</label>
        <input type="number" step="0.01" id="precio_menudeo" name="precio_menudeo" required><br>

        <label for="precio_mayoreo">Precio Mayoreo:</label>
        <input type="number" step="0.01" id="precio_mayoreo" name="precio_mayoreo" required><br>

        <input type="submit" value="Registrar Producto">
    </form> 
</Script>
</x-plantilla>