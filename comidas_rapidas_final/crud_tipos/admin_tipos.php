<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['rol']!=='admin'){ header('Location: /comidas_rapidas_final/login/login.php'); exit; }
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/header.php';
$tipos = $pdo->query('SELECT * FROM tipos ORDER BY id DESC')->fetchAll();
?>
<section>
  <h2>Tipos de producto</h2>
  <p><a class="btn" href="create_tipo.php">Agregar tipo</a></p>
  <table class="table">
    <thead><tr><th>ID</th><th>Tipo</th><th>Acciones</th></tr></thead>
    <tbody>
    <?php foreach($tipos as $t): ?>
      <tr>
        <td><?php echo $t['id']; ?></td>
        <td><?php echo htmlspecialchars($t['nombre_tipo']); ?></td>
        <td>
          <a class="btn small" href="edit_tipo.php?id=<?php echo $t['id']; ?>">Editar</a>
          <form action="delete_tipo.php" method="post" style="display:inline">
            <input type="hidden" name="id" value="<?php echo $t['id']; ?>">
            <button class="btn danger small" onclick="return confirm('Eliminar?');" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>
<?php require __DIR__ . '/../includes/footer.php'; ?>