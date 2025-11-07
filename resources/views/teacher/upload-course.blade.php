<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Upload Course — Saif Academy</title>

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

      .sidebar-link {
        color: #cbd5e1;
        display: block;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
      }

      .sidebar-link:hover,
      .sidebar-link.active {
        background: rgba(255, 255, 255, 0.04);
        color: #fff;
        text-decoration: none;
      }

      .brand {
        font-weight: 700;
        letter-spacing: 0.3px;
        color: #fff;
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
          <a href="{{ route('teacher.dashboard') }}" class="sidebar-link"
            ><i class="fa-solid fa-gauge me-2"></i> Dashboard</a
          >
          <a href="{{ route('teacher.upload-course') }}" class="sidebar-link"
            ><i class="fa-solid fa-book-open me-2"></i> My Courses</a
          >
          <a href="{{ route('teacher.upload-course') }}" class="sidebar-link active"
            ><i class="fa-solid fa-upload me-2"></i> Upload Course</a
          >
          <a href="{{ route('teacher.dashboard') }}" class="sidebar-link"
            ><i class="fa-solid fa-user-graduate me-2"></i> My Students</a
          >
          <a href="{{ route('teacher.exam-creation') }}" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exams</a
          >
          <a href="{{ route('teacher.message-inbox') }}" class="sidebar-link"
            ><i class="fa-solid fa-inbox me-2"></i> Inbox</a
          >
          <a href="#" class="sidebar-link"
            ><i class="fa-solid fa-user me-2"></i> Profile</a
          >
        </nav>

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="uploadCSVBtn" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-file-arrow-up me-2"></i> Upload CSV
            </button>
          </div>
        </div>
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
              <h4 class="mb-0">Upload Course</h4>
              <small class="text-muted ms-2">Create and publish new courses</small>
            </div>

            <div class="d-flex align-items-center gap-3">
              <div class="d-none d-md-block text-muted">
                Welcome, <strong>{{ auth()->user()->name }}</strong>
              </div>
              <div class="dropdown">
                <a
                  class="d-flex align-items-center text-decoration-none"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <img
                    src="https://ui-avatars.com/api/?name=Teacher&background=3b82f6&color=fff"
                    class="rounded-circle"
                    width="38"
                    height="38"
                    alt="avatar"
                  />
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="dropdown-item text-danger">Logout</button></form></li>
                </ul>
              </div>
            </div>
          </div>
        </header>

        <main class="p-4 container-fluid">
          <!-- Upload Course Form -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="mb-3">Course Information</h5>
              <form id="uploadCourseForm">
                <div class="mb-3">
                  <label class="form-label">Course Title</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter course title"
                    required
                  />
                </div>

                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Write a short description..."
                    required
                  ></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select">
                      <option selected>Select category</option>
                      <option>Mathematics</option>
                      <option>Physics</option>
                      <option>Computer Science</option>
                      <option>Economics</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="form-label">Course Thumbnail</label>
                    <input type="file" class="form-control" accept="image/*" />
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Upload Course Materials</label>
                  <input type="file" class="form-control" multiple accept=".pdf,.mp4,.zip,.pptx" />
                  <small class="text-muted">You can upload PDFs, videos, or zip files.</small>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                  <button type="reset" class="btn btn-outline-secondary">Clear</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-upload me-2"></i> Publish Course
                  </button>
                </div>
              </form>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap + Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });

      document.getElementById('uploadCSVBtn').addEventListener('click', function () {
        alert('Upload CSV clicked!');
      });

      document.getElementById('uploadCourseForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('✅ Course uploaded successfully!');
        this.reset();
      });
    </script>
  </body>
</html>
