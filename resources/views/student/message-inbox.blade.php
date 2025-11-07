<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Message Inbox — Saif Academy</title>

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
            <i class="fa-solid fa-user-graduate text-white"></i>
          </div>
          <div>
            <div class="brand text-lg">Saif Academy</div>
            <div class="text-xs text-slate-300">Student Panel</div>
          </div>
        </div>

        <nav class="mt-4">
          <a href="{{ route('student.dashboard') }}" class="sidebar-link">
            <i class="fa-solid fa-gauge me-2"></i> Dashboard
          </a>
          <a href="{{ route('student.my-courses') }}" class="sidebar-link">
            <i class="fa-solid fa-book-open me-2"></i> My Courses
          </a>
          <a href="{{ route('student.library') }}" class="sidebar-link">
            <i class="fa-solid fa-book me-2"></i> Library
          </a>
          <a href="{{ route('student.exam-portal-general') }}" class="sidebar-link">
            <i class="fa-solid fa-file-lines me-2"></i> Exam Portal
          </a>
          <a href="message-inbox.html" class="sidebar-link active">
            <i class="fa-solid fa-inbox me-2"></i> Message Inbox
          </a>
          <a href="{{ route('student.cart') }}" class="sidebar-link">
            <i class="fa-solid fa-cart-shopping me-2"></i> Add to Cart
          </a>
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
              <h4 class="mb-0">Message Inbox</h4>
              <small class="text-muted ms-2">All your messages from teachers & admin</small>
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
                    src="https://ui-avatars.com/api/?name=Student&background=3b82f6&color=fff"
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

        <!-- Main Content -->
        <main class="p-4 container-fluid">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="mb-3">Inbox</h5>

              <div class="table-responsive">
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th>From</th>
                      <th>Subject / Preview</th>
                      <th>Received</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4" class="text-center text-muted py-4">
                        No messages yet.
                      </td>
                    </tr>
                    <tr style="display:none;">
                      <td>{{ auth()->user()->name }}</td>
                      <td>
                        <div class="fw-semibold">New Notice</div>
                        <div class="text-muted small">Check the latest exam schedule.</div>
                      </td>
                      <td>5h ago</td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                          <i class="fa-solid fa-reply me-1"></i> Reply
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                      </td>
                    </tr>
                    <!-- Repeat more messages as needed -->
                  </tbody>
                </table>
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
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });
    </script>
  </body>
</html>
