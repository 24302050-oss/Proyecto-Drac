<?php
include("conexion.php");

?>

<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BiblioDraco - UTFV</title>

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
      text-align: right;
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
      justify-content: center;
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
      padding: 80px 50px;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    section h2 {
      font-size: 1.9em;
      font-weight: 700;
      color: #000;
      margin-bottom: 40px;
    }

    section input {
      width: 380px;
      padding: 16px;
      text-align: center;
      border: none;
      background-color: #f2f2f2;
      font-size: 1.1em;
      margin-bottom: 30px;
      border-radius: 6px;
    }

    section button {
      background-color: var(--verde-oscuro);
      color: white;
      border: none;
      padding: 12px 35px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: 0.3s ease;
    }

    section button:hover {
      background-color: var(--verde-claro);
      color: var(--verde-utfv);
    }

    /*  Texto automático */
    #texto-auto {
      margin-top: 25px;
      font-size: 1.2em;
      color: #000000;
      font-weight: 600;
   margin-bottom: 30px;
      white-space: pre;
      border-right: 3px solid #1b5e20;
      animation: blink 0.8s infinite;
    }

    @keyframes escribir {
      from { width: 0; }
      to { width: 100%; }
    }

    @keyframes parpadeo {
      50% { border-color: transparent; }
    }

    footer {
      background-color: var(--verde-claro);
      text-align: center;
      padding: 10px;
      font-size: 0.9em;
      color: var(--gris-texto);
      font-weight: 500;
    }
    form {
  display: inline-block; /* Evita que el formulario se vea como bloque */
  text-align: center;    /* Centra el contenido */
}

form input,
form button {
  display: block;
  margin: 10px auto; /* Centra y da separación */
}

  </style>
</head>

<body>
  <header>
    <img src="Dragon.jpeg" alt="Logo Dragón" class="logo">
    <h1>BiblioDraco</h1>
    <div class="hashtag">#SOMOS<br>DRAGONES</div>
  </header>

  <main>
    <nav>
      <h3>MENÚ</h3>
      <button id="btnInicio"><i class="fa-solid fa-right-to-bracket"></i> REGISTRO DE ENTRADA</button>
    </nav>
    <section>
      <h2>BIENVENIDO AL SITIO</h2>
         <!-- 🔹 Aquí agregamos el formulario, sin cambiar tu estructura -->
      <form action="inicio_admin.php" method="POST">
        <input type="email" name="correo" placeholder="Ingresa tu correo" required>
        <br>
         <input type="password" name="contrasena" placeholder="Ingresa tu contraseña" required>

        <br>
        <button type="submit" id="btnRegistro">
          <i class="fa-solid fa-user-plus"></i> INICIAR SESION
        </button>
      </form>
      <!-- 💬 Texto de escritura automática -->
      <div id="texto-auto"></div>
    </section>
  </main>

  <footer>
    Copyright © Universidad Tecnológica Fidel Velázquez
  </footer>

  <script>
    // 🎵 Sonidos
    const sonidoInicio = new Audio("https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg");
    const sonidoRegistro = new Audio("https://actions.google.com/sounds/v1/cartoon/pop.ogg");

    document.getElementById("btnInicio").addEventListener("click", () => {
      sonidoInicio.play();
      setTimeout(() => window.location.href = "index.php", 400);
    });

    document.getElementById("btnRegistro").addEventListener("click", () => {
      sonidoRegistro.play();
      setTimeout(() => alert("Abriendo registro..."), 400);
    });

    // 💬 Efecto de escritura automática
    const texto = "Si eres administrador, ingresa tu correo.";
    const elemento = document.getElementById("texto-auto");
    let i = 0;

    function escribir() {
      if (i < texto.length) {
        elemento.textContent += texto.charAt(i);
        i++;
        setTimeout(escribir, 30);
      }
    }

    window.addEventListener("load", escribir);
  </script>
</body>
</html>
