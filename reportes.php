<?php
include 'conexion.php';

// ---- REPORTE SEMANAL ----
$semanaQuery = "
SELECT DAYNAME(hora_entrada) AS dia, COUNT(*) AS cantidad
FROM registros
WHERE YEARWEEK(hora_entrada, 1) = YEARWEEK(NOW(), 1)
GROUP BY dia
ORDER BY FIELD(dia, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
";
$semanaResult = mysqli_query($conexion, $semanaQuery);
$dias = [];
$valoresSemana = [];
while ($row = mysqli_fetch_assoc($semanaResult)) {
  $dias[] = $row['dia'];
  $valoresSemana[] = $row['cantidad'];
}

// ---- REPORTE MENSUAL ----
$mesQuery = "
SELECT MONTHNAME(hora_entrada) AS mes, COUNT(*) AS cantidad
FROM registros
WHERE YEAR(hora_entrada) = YEAR(NOW())
GROUP BY mes
ORDER BY MONTH(hora_entrada);
";
$mesResult = mysqli_query($conexion, $mesQuery);
$meses = [];
$valoresMes = [];
while ($row = mysqli_fetch_assoc($mesResult)) {
  $meses[] = $row['mes'];
  $valoresMes[] = $row['cantidad'];
}

// ---- REPORTE POR CARRERA ----
$carreraQuery = "
SELECT carrera, COUNT(*) AS cantidad
FROM registros
GROUP BY carrera;
";
$carreraResult = mysqli_query($conexion, $carreraQuery);
$carreras = [];
$cantCarreras = [];
while ($row = mysqli_fetch_assoc($carreraResult)) {
  $carreras[] = $row['carrera'];
  $cantCarreras[] = $row['cantidad'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BiblioDraco - Reportes</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
  background: #f9f9f9; /* Fondo neutro para evitar interferencia con las gráficas */
  border: 4px solid var(--verde-utfv);
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

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

    main {
      display: flex;
      flex-grow: 1;
      flex-wrap: wrap;
    }

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
/* =============== FIX DEFINITIVO PARA SUBIR LAS GRÁFICAS =============== */

/* Quitar cualquier margen o padding que el navegador agrega al body */
body {
    margin: 0 !important;
    padding: 0 !important;
}

/* Asegurar que el contenido comience pegado al menú */
main {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

/* Eliminar espacio arriba del section */
section {
  flex-grow: 1;
  padding: 40px 20px 20px; /* Aumenta el padding superior para separar del header */
  background: white;
  box-shadow: 0 0 15px rgba(0,0,0,0.05);
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  min-height: calc(100vh - 220px); /* Ajusta según altura real del header + footer */
  overflow-y: auto;
  box-sizing: border-box;
}

/* El primer elemento dentro de section no debe tener margen */
section *:first-child {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

/* Contenedor de las gráficas */
.graficas {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    align-items: flex-start !important;

    gap: 20px !important;

    margin-top: 0 !important;
    padding-top: 0 !important;
}

/* Cada tarjeta de gráfica */
.grafica {
    margin-top: 0 !important;
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
      <h2>REPORTES SEMANALES Y MENSUALES</h2>

      <div class="graficas">
        <div class="grafica">
          <canvas id="graficaBarras"></canvas>
        </div>

        <div class="grafica">
          <canvas id="graficaPastel"></canvas>
        </div>

        <div class="grafica">
          <canvas id="graficaLineas"></canvas>
        </div>
      </div>
    </section>
  </main>

  <footer>
    Copyright © Universidad Tecnológica Fidel Velázquez
  </footer>

  <script>
    const sonidos = {
      inicio: new Audio("https://actions.google.com/sounds/v1/cartoon/wood_plank_flicks.ogg"),
      actualizar: new Audio("https://actions.google.com/sounds/v1/cartoon/pop.ogg"),
      eliminar: new Audio("https://actions.google.com/sounds/v1/alarms/beep_short.ogg"),
      reportes: new Audio("https://assets.mixkit.co/active_storage/sfx/2005/2005-preview.mp3")
    };

    document.getElementById("btnActualizar").addEventListener("click", () => {
      sonidos.actualizar.play();
      setTimeout(() => window.location.href = "actualizardatos.php", 300);
    });
    document.getElementById("btnEliminar").addEventListener("click", () => {
      sonidos.eliminar.play();
      setTimeout(() => window.location.href = "eliminarregistros.php", 400);
    });
    document.getElementById("btnReportes").addEventListener("click", () => {
      sonidos.reportes.play();
      setTimeout(() => window.location.href = "reportes.php", 400);
    });
    document.getElementById("btnCerrar").addEventListener("click", () => {
      if (confirm("¿Seguro que quieres cerrar sesión?")) {
        window.location.href = "cerrar_sesion.php";
      }
    });

    // Datos desde PHP
    const dias = <?php echo json_encode($dias); ?>;
    const valoresSemana = <?php echo json_encode($valoresSemana); ?>;

    const meses = <?php echo json_encode($meses); ?>;
    const valoresMes = <?php echo json_encode($valoresMes); ?>;

    const carreras = <?php echo json_encode($carreras); ?>;
    const cantCarreras = <?php echo json_encode($cantCarreras); ?>;

    // Gráfica SEMANAL
    new Chart(document.getElementById("graficaBarras"), {
      type: "bar",
      data: {
        labels: dias.length ? dias : ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"],
        datasets: [{
          label: "Entradas semanales",
          data: valoresSemana.length ? valoresSemana : [0,0,0,0,0,0,0],
          backgroundColor: "#1b5e20"
        }]
      },
      options: { 
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.dataset.label}: ${context.raw}`;
              }
            }
          }
        }
      }
    });

    // Gráfica POR CARRERA
    new Chart(document.getElementById("graficaPastel"), {
      type: "pie",
      data: {
        labels: carreras.length ? carreras : ["Sin datos"],
        datasets: [{
          label: "Usuarios por carrera",
          data: cantCarreras.length ? cantCarreras : [1],
          backgroundColor: ["#2e7d32", "#81c784", "#388e3c", "#a5d6a7", "#43a047", "#66bb6a", "#43a047"]
        }]
      },
      options: { 
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.label}: ${context.raw}`;
              }
            }
          }
        }
      }
    });

    // Gráfica MENSUAL
    new Chart(document.getElementById("graficaLineas"), {
      type: "line",
      data: {
        labels: meses.length ? meses : ["Enero","Febrero","Marzo","Abril","Mayo","Junio"],
        datasets: [{
          label: "Entradas mensuales",
          data: valoresMes.length ? valoresMes : [0,0,0,0,0,0],
          borderColor: "#00a859",
          fill: false,
          tension: 0.3
        }]
      },
      options: { 
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.dataset.label}: ${context.raw}`;
              }
            }
          }
        }
      }
    });

    // Forzar re-render de las gráficas después de cargar
    window.addEventListener('load', function() {
      setTimeout(() => {
        // Esto asegura que Chart.js se renderice correctamente
        const charts = [
          document.getElementById("graficaBarras"),
          document.getElementById("graficaPastel"),
          document.getElementById("graficaLineas")
        ];
        charts.forEach(canvas => {
          if (canvas && canvas.chart) {
            canvas.chart.resize();
          }
        });
      }, 500);
    });
  </script>

</body>
</html>