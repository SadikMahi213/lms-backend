<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Students — Saif Academy Admin</title>

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

    <!-- Tailwind Play CDN -->
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
            <i class="fa-solid fa-graduation-cap text-white"></i>
          </div>
          <div>
            <div class="brand text-lg">Saif Academy</div>
            <div class="text-xs text-slate-300">Admin Panel</div>
          </div>
        </div>

        <nav class="mt-4">
          <a href="dashboard.html" class="sidebar-link"
            ><i class="fa-solid fa-gauge me-2"></i> Dashboard</a
          >
          <a href="courses.html" class="sidebar-link"
            ><i class="fa-solid fa-book-open me-2"></i> Courses</a
          >
          <a href="teachers.html" class="sidebar-link"
            ><i class="fa-solid fa-chalkboard-teacher me-2"></i> Teachers</a
          >
          <a href="students.html" class="sidebar-link active"
            ><i class="fa-solid fa-user-graduate me-2"></i> Students</a
          >
          <a href="payments.html" class="sidebar-link"
            ><i class="fa-solid fa-credit-card me-2"></i> Payments</a
          >
          <a href="notice-board.html" class="sidebar-link"
            ><i class="fa-solid fa-bell me-2"></i> Notices</a
          >
          <a href="portfolio.html" class="sidebar-link"
            ><i class="fa-solid fa-briefcase me-2"></i> Portfolio</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
          <a href="exam-portal.html" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
        </nav>
      </aside>

      <!-- Main content -->
      <div class="flex-1 min-h-screen">
        <!-- topbar -->
        <header class="bg-white border-b shadow-sm">
          <div class="container-fluid d-flex align-items-center justify-content-between px-4 py-3">
            <div class="d-flex align-items-center gap-3">
              <button id="sidebarToggle" class="btn btn-outline-secondary d-lg-none">
                <i class="fa-solid fa-bars"></i>
              </button>
              <h4 class="mb-0">Students</h4>
              <small class="text-muted ms-2">Manage all enrolled students</small>
            </div>

            <div class="d-flex align-items-center gap-3">
              <div class="d-none d-md-block text-muted">
                Welcome, <strong>{{admin_name}}</strong>
              </div>
              <div class="dropdown">
                <a
                  class="d-flex align-items-center text-decoration-none"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <img
                    src="https://ui-avatars.com/api/?name=Admin&background=7c3aed&color=fff"
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
                  <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </header>

        <main class="p-4 container-fluid">
          <!-- Filters and search -->
          <div class="row mb-4 g-2 align-items-center">
            <div class="col-md-6">
              <input
                type="text"
                id="searchInput"
                class="form-control"
                placeholder="Search by name or email..."
              />
            </div>
            <div class="col-md-3">
              <select class="form-select" id="statusFilter">
                <option value="">Filter by Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Pending">Pending</option>
              </select>
            </div>
            <div class="col-md-3 text-end">
              <a href="#" class="btn btn-primary"
                ><i class="fa-solid fa-user-plus me-2"></i>Add Student</a
              >
            </div>
          </div>

          <!-- Student table -->
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Enrolled Courses</th>
                      <th>Status</th>
                      <th class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="studentTableBody">
                    <tr>
                      <td><strong>Rahim Uddin</strong></td>
                      <td>rahim@example.com</td>
                      <td>Mathematics, Physics</td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-primary">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </td>
                    </tr>

                    <tr>
                      <td><strong>Karim Hossain</strong></td>
                      <td>karim@example.com</td>
                      <td>Programming 101</td>
                      <td><span class="badge bg-warning text-dark">Pending</span></td>
                      <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-primary">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </td>
                    </tr>

                    <tr>
                      <td><strong>Farzana Akter</strong></td>
                      <td>farzana@example.com</td>
                      <td>Design Basics</td>
                      <td><span class="badge bg-secondary">Inactive</span></td>
                      <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-primary">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', () => {
        document.getElementById('sidebar').classList.toggle('show');
      });

      // Filter and search logic
      const searchInput = document.getElementById('searchInput');
      const statusFilter = document.getElementById('statusFilter');
      const rows = document.querySelectorAll('#studentTableBody tr');

      function filterTable() {
        const searchText = searchInput.value.toLowerCase();
        const status = statusFilter.value;

        rows.forEach((row) => {
          const name = row.children[0].innerText.toLowerCase();
          const email = row.children[1].innerText.toLowerCase();
          const studentStatus = row.children[3].innerText.trim();

          const matchText = name.includes(searchText) || email.includes(searchText);
          const matchStatus = !status || studentStatus === status;

          if (matchText && matchStatus) row.style.display = '';
          else row.style.display = 'none';
        });
      }

      searchInput.addEventListener('input', filterTable);
      statusFilter.addEventListener('change', filterTable);
    </script>
  </body>
</html>
