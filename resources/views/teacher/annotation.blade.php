<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Annotation — Saif Academy</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- Fabric.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/6.0.0/fabric.min.js"></script>

    <style>
      :root {
        --sidebar-width: 270px;
      }

      body {
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto,
          'Helvetica Neue', Arial;
      }

      #sidebar {
        width: var(--sidebar-width);
        min-width: var(--sidebar-width);
      }

      @media (max-width: 992px) {
        #sidebar {
          position: fixed;
          left: -100%;
          top: 0;
          height: 100vh;
          z-index: 1050;
          transition: left 0.25s;
        }
        #sidebar.show {
          left: 0;
        }
      }

      .toolbar-btn {
        width: 40px;
        height: 40px;
      }

      canvas {
        border: 1px solid #ccc;
      }
    </style>
  </head>

  <body class="bg-slate-50">
    <div class="min-h-screen flex">
      <!-- Sidebar -->
      <aside id="sidebar" class="bg-slate-800 text-slate-200 p-4 shadow-lg">
        <div class="mb-6 flex items-center gap-3 px-2">
          <div
            class="rounded-md bg-gradient-to-tr from-indigo-500 to-purple-600 w-10 h-10 flex items-center justify-center"
          >
            <i class="fa-solid fa-chalkboard-teacher text-white"></i>
          </div>
          <div>
            <div class="brand text-lg">Saif Academy</div>
            <div class="text-xs text-slate-300">Teacher Panel</div>
          </div>
        </div>

        <nav class="mt-4">
          <a href="dashboard.html" class="sidebar-link"
            ><i class="fa-solid fa-gauge me-2"></i> Dashboard</a
          >
          <a href="my-courses.html" class="sidebar-link"
            ><i class="fa-solid fa-book-open me-2"></i> My Courses</a
          >
          <a href="my-students.html" class="sidebar-link"
            ><i class="fa-solid fa-user-graduate me-2"></i> My Students</a
          >
          <a href="exam-portal.html" class="sidebar-link active"
            ><i class="fa-solid fa-file-lines me-2"></i> Exams</a
          >
          <a href="messages.html" class="sidebar-link"
            ><i class="fa-solid fa-inbox me-2"></i> Inbox</a
          >
        </nav>
      </aside>

      <!-- Main -->
      <div class="flex-1 min-h-screen">
        <!-- Topbar -->
        <header class="bg-white border-b shadow-sm">
          <div class="container-fluid d-flex align-items-center justify-content-between px-4 py-3">
            <div class="d-flex align-items-center gap-3">
              <button id="sidebarToggle" class="btn btn-outline-secondary d-lg-none">
                <i class="fa-solid fa-bars"></i>
              </button>
              <h4 class="mb-0">Annotation Tool</h4>
              <small class="text-muted ms-2">Mark student submissions</small>
            </div>
            <div class="d-flex align-items-center gap-3">
              <div class="d-none d-md-block text-muted">
                Teacher: <strong>{{teacher_name}}</strong>
              </div>
            </div>
          </div>
        </header>

        <main class="p-4 container-fluid">
          <!-- Toolbar -->
          <div class="mb-3 d-flex gap-2 flex-wrap">
            <button class="btn btn-outline-primary toolbar-btn" id="pencilBtn" title="Pencil">
              <i class="fa-solid fa-pencil"></i>
            </button>
            <button
              class="btn btn-outline-warning toolbar-btn"
              id="highlightBtn"
              title="Highlighter"
            >
              <i class="fa-solid fa-highlighter"></i>
            </button>
            <button class="btn btn-outline-success toolbar-btn" id="tickBtn" title="Tick">
              <i class="fa-solid fa-check"></i>
            </button>
            <button class="btn btn-outline-danger toolbar-btn" id="crossBtn" title="Cross">
              <i class="fa-solid fa-xmark"></i>
            </button>
            <button class="btn btn-outline-secondary toolbar-btn" id="panBtn" title="Pan">
              <i class="fa-solid fa-hand-paper"></i>
            </button>
            <button class="btn btn-outline-dark toolbar-btn" id="clearBtn" title="Clear All">
              <i class="fa-solid fa-trash"></i>
            </button>
          </div>

          <!-- Student Submission -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="mb-3">Student Submission: {{student_name}}</h5>
              <canvas id="annotationCanvas" width="1000" height="1200"></canvas>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap + Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });

      // Fabric.js canvas
      const canvas = new fabric.Canvas('annotationCanvas', {
        selection: false,
      });

      // Toolbar functions
      let currentTool = 'pencil';

      function setTool(tool) {
        currentTool = tool;
        if (tool === 'pencil') {
          canvas.isDrawingMode = true;
          canvas.freeDrawingBrush.color = '#000';
          canvas.freeDrawingBrush.width = 2;
        } else if (tool === 'highlight') {
          canvas.isDrawingMode = true;
          canvas.freeDrawingBrush.color = 'yellow';
          canvas.freeDrawingBrush.width = 20;
          canvas.freeDrawingBrush.opacity = 0.3;
        } else {
          canvas.isDrawingMode = false;
        }
      }

      document.getElementById('pencilBtn').onclick = () => setTool('pencil');
      document.getElementById('highlightBtn').onclick = () => setTool('highlight');
      document.getElementById('tickBtn').onclick = () => {
        const tick = new fabric.Text('✔', {
          left: 100,
          top: 100,
          fontSize: 32,
          fill: 'green',
        });
        canvas.add(tick);
      };
      document.getElementById('crossBtn').onclick = () => {
        const cross = new fabric.Text('✖', {
          left: 150,
          top: 100,
          fontSize: 32,
          fill: 'red',
        });
        canvas.add(cross);
      };
      document.getElementById('panBtn').onclick = () => {
        canvas.isDrawingMode = false;
        canvas.defaultCursor = 'grab';
      };
      document.getElementById('clearBtn').onclick = () => canvas.clear();
    </script>
  </body>
</html>
