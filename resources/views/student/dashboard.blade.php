<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Student Dashboard — Saif Academy</title>

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

      .card-gradient {
        background: linear-gradient(90deg, rgba(59, 130, 246, 0.95), rgba(99, 102, 241, 0.95));
        color: #fff;
      }

      .card-gradient-2 {
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.95), rgba(34, 197, 94, 0.95));
        color: #fff;
      }

      .card-gradient-3 {
        background: linear-gradient(90deg, rgba(236, 72, 153, 0.95), rgba(168, 85, 247, 0.95));
        color: #fff;
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
            <i class="fa-solid fa-user-graduate text-white"></i>
          </div>
          <div>
            <div class="brand text-lg">Saif Academy</div>
            <div class="text-xs text-slate-300">Student Panel</div>
          </div>
        </div>

        <nav class="mt-4">
          <a href="{{ route('student.dashboard') }}" class="sidebar-link active"
            ><i class="fa-solid fa-gauge me-2"></i> Dashboard</a
          >
          <a href="{{ route('student.my-courses') }}" class="sidebar-link"
            ><i class="fa-solid fa-book-open me-2"></i> My Courses</a
          >
          <a href="{{ route('student.library') }}" class="sidebar-link"
            ><i class="fa-solid fa-book me-2"></i> Library</a
          >
          <a href="{{ route('student.exam-portal-general') }}" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
          <a href="{{ route('student.message-inbox') }}" class="sidebar-link"
            ><i class="fa-solid fa-inbox me-2"></i> Message Inbox</a
          >
          <a href="{{ route('student.cart') }}" class="sidebar-link"
            ><i class="fa-solid fa-cart-shopping me-2"></i> Add to Cart</a
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
              <h4 class="mb-0">Student Dashboard</h4>
              <small class="text-muted ms-2">Your Learning Overview</small>
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
                    src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=3b82f6&color=fff"
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
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </header>

        <main class="p-4 container-fluid">
          <!-- Overview Cards -->
          <div class="row g-3">
            <div class="col-12 col-md-4">
              <div class="card card-gradient p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm text-white/90">Enrolled Courses</div>
                    <div class="h3 my-1">0</div>
                    <div class="text-xs text-white/80">Active / Total</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-book fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4">
              <div class="card card-gradient-2 p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm text-white/90">Upcoming Exams</div>
                    <div class="h3 my-1">0</div>
                    <div class="text-xs text-white/80">Next week</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-file-pen fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4">
              <div class="card card-gradient-3 p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm text-white/90">Messages</div>
                    <div class="h3 my-1">0</div>
                    <div class="text-xs text-white/80">Unread</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-envelope fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Recent Courses & Messages -->
          <div class="row mt-4 g-3">
            <div class="col-12 col-xl-8">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">My Recent Courses</h5>
                    <a href="{{ route('student.my-courses') }}" class="btn btn-sm btn-outline-primary">Manage</a>
                  </div>

                  <div class="table-responsive">
                    <table class="table align-middle">
                      <thead>
                        <tr>
                          <th>Course</th>
                          <th>Progress</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="3" class="text-center text-muted">No courses enrolled yet. <a href="{{ route('student.my-courses') }}">Browse Courses</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Messages Panel -->
            <div class="col-12 col-xl-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h6 class="mb-3">Recent Messages</h6>
                  <ul class="list-group list-group-flush small">
                    <li class="list-group-item px-0 border-0">
                      <div class="text-center text-muted py-3">No messages yet</div>
                    </li>
                  </ul>
                      <div class="text-muted">New notice available.</div>
                      <div class="text-xs text-muted">5h ago</div>
                    </li>
                  </ul>
                </div>
              </div>
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
    </script>
  </body>
</html>
