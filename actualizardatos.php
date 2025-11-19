<?php
include("conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BiblioDraco - Actualizar Datos</title>

  <!-- Íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">



  <style>
    :root {
      --verde-utfv: #000000;
      --verde-claro: #b4e197;
      --verde-oscuro: #1b5e20;
      --gris-texto: #333;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      background: linear-gradient(180deg, #b4e197, #ffffff, #1b5e20);
      border: 4px solid var(--verde-utfv);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* HEADER */
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: linear-gradient(90deg, #dcedc8, #a5d6a7, #dcedc8);
      padding: 20px 40px;
      border-bottom: 3px solid var(--verde-utfv);
      flex-wrap: wrap;
      gap: 15px;
    }

    header img.logo {
      height: 130px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }

    header img.logo:hover {
      transform: scale(1.1);
    }

    header h1 {
      font-size: 3em;
      color: var(--gris-texto);
      margin: 0;
      flex-grow: 1;
      text-align: center;
      font-weight: 800;
      letter-spacing: 2px;
      text-shadow: 1px 1px 3px #ccc;
    }

    header .hashtag {
      color: #b30000;
      font-weight: bold;
      font-style: italic;
      font-size: 1.2em;
    }

    /* MAIN */
    main {
      display: flex;
      flex-grow: 1;
      flex-wrap: wrap;
    }

    /* MENÚ */
    nav {
      background: linear-gradient(180deg, #2e7d32, #1b5e20);
      width: 250px;
      padding: 30px 20px;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: stretch;
      box-shadow: inset -3px 0 6px rgba(0,0,0,0.2);
    }

    nav h3 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 1.5em;
      font-weight: bold;
    }

    nav button {
      background: white;
      color: var(--verde-utfv);
      border: none;
      margin: 12px 0;
      padding: 14px 16px;
      cursor: pointer;
      font-weight: bold;
      border-radius: 10px;
      font-size: 1.05em;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.15);
      transition: 0.3s ease;
    }

    nav button:hover {
      background-color: var(--verde-claro);
      transform: translateX(8px);
    }

    nav button:hover i {
      color: var(--verde-oscuro);
      transform: scale(1.2);
    }

    /* SECCIÓN CENTRAL */
    section {
      flex-grow: 1;
      text-align: center;
      padding: 50px;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
    }

    section h2 {
      font-style: italic;
      font-size: 1.8em;
      margin-bottom: 40px;
    }

    .contenedor-actualizar {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 80px;
      flex-wrap: wrap;
    }

    .contenedor-actualizar img {
      width: 300px;
      transition: transform 0.3s ease;
    }

    .contenedor-actualizar img:hover {
      transform: scale(1.05);
    }

    .contenedor-actualizar button {
      margin-top: 15px;
      background-color: #00a859;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 25px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .contenedor-actualizar button:hover {
      background-color: #008a4d;
      transform: scale(1.05);
    }

    form {
      display: flex;
      flex-direction: column;
      text-align: left;
      gap: 15px;
      min-width: 280px;
    }

    form label {
      font-weight: bold;
      color: #333;
    }

    form input {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 250px;
    }

    footer {
      background-color: var(--verde-claro);
      text-align: center;
      padding: 10px;
      font-size: 0.9em;
      color: var(--gris-texto);
      font-weight: 500;
    }
  </style>
</head>

<body>
  <header>
    <img src="Dragon.jpeg" alt="Logo Dragón" class="logo">
    <h1>BiblioDraco</h1>
    <div class="hashtag">#SOMOSDRAGONES</div>
  </header>

  <main>
    <nav>
      <h3>MENÚ</h3>
      <button id="btnActualizar"><i class="fa-solid fa-user-gear"></i> ACTUALIZAR DATOS</button>
      <button id="btnEliminar"><i class="fa-solid fa-trash-can"></i> ELIMINAR REGISTROS</button>
      <button id="btnReportes"><i class="fa-solid fa-chart-pie"></i> REPORTES</button>
     <button id="btnCerrar"><i class="fa-regular fa-circle-xmark"></i> CERRAR SESION</button>

    </nav>

    <section>
      <h2>ACTUALIZAR DATOS</h2>

      <div class="contenedor-actualizar">
        <!-- Imagen y botón -->
        <div>
          <img src="dragon_utfv.png" alt="Dragón UTFV">
          <br>
          
        </div>

        <!-- Formulario -->
        <form  action="actualizar.php" method="POST">
          <label>Nombre</label>
          <input type="text" name="nombre" value="">

          <label>Matricula</label>
          <input type="text" name="matricula" value="">

          <label>Carrera </label>
          <input type="text"name="carrera" value="">
          <button>ACTUALIZAR</button>
        </form>
      </div>
    </section>
  </main>

  <footer>
    Copyright © Universidad Tecnológica Fidel Velázquez
  </footer>

  <script>
    // 🎵 Sonidos (en línea)
    const sonidos = {
      inicio: new Audio("https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg"),
      actualizar: new Audio("https://actions.google.com/sounds/v1/cartoon/pop.ogg"),
      eliminar: new Audio("https://actions.google.com/sounds/v1/alarms/beep_short.ogg"),
      reportes: new Audio("https://assets.mixkit.co/active_storage/sfx/2005/2005-preview.mp3")
    };

    // Redirecciones con sonido
    document.getElementById("btnActualizar").addEventListener("click", () => {
      sonidos.actualizar.play();
      setTimeout(() => window.location.href = "actualizardatos.php", 400);
    });

    document.getElementById("btnEliminar").addEventListener("click", () => {
      sonidos.eliminar.play();
      setTimeout(() => window.location.href = "eliminarregistros.php", 400);
    });

    document.getElementById("btnReportes").addEventListener("click", () => {
      sonidos.reportes.play();
      setTimeout(() => window.location.href = "reportes.php", 500);
    });
    document.getElementById("btnCerrar").addEventListener("click", () => {
  if (confirm("¿Seguro que quieres cerrar sesión?")) {
    window.location.href = "cerrar_sesion.php";
  }
});
  </script>
</body>
</html>
