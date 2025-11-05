<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Courses — Saif Academy Admin</title>

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

    <!-- Tailwind CDN (utility classes) -->
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
        background: #f8fafc;
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

      .brand {
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.3px;
      }

      .sidebar-link {
        color: #cbd5e1;
        display: block;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
      }

      .sidebar-link:hover,
      .sidebar-link.active {
        background: rgba(255, 255, 255, 0.04);
        color: #fff;
      }

      .card-premium {
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
      }

      .table tbody tr:hover {
        background: #fbfdff;
      }

      .action-btns .btn {
        margin-left: 6px;
      }

      @media (max-width: 640px) {
        .hide-xs {
          display: none;
        }
      }
    </style>
  </head>

  <body>
    <div class="min-h-screen flex">
      <!-- Sidebar (same as dashboard) -->
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
          <a href="courses.html" class="sidebar-link active"
            ><i class="fa-solid fa-book-open me-2"></i> Courses</a
          >
          <a href="#" class="sidebar-link"
            ><i class="fa-solid fa-chalkboard-teacher me-2"></i> Teachers</a
          >
          <a href="enrolled-students.html" class="sidebar-link"
            ><i class="fa-solid fa-user-graduate me-2"></i> Students</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-credit-card me-2"></i> Payments</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-bell me-2"></i> Notices</a>
          <a href="portfolio.html" class="sidebar-link"
            ><i class="fa-solid fa-briefcase me-2"></i> Portfolio</a
          >
          <a href="stats.html" class="sidebar-link"
            ><i class="fa-solid fa-chart-bar me-2"></i> Stats</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
          <a href="#" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
        </nav>

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="uploadCSVBtn" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-file-csv me-2"></i> CSV Upload
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
              <div>
                <h4 class="mb-0">Courses Management</h4>
                <small class="text-muted">Manage courses, teachers and enrollment</small>
              </div>
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
          <!-- Controls -->
          <div
            class="d-flex flex-column flex-md-row gap-3 align-items-start align-items-md-center mb-3"
          >
            <div class="d-flex gap-2 w-full">
              <input
                id="search"
                class="form-control form-control-sm"
                placeholder="Search course or teacher..."
              />
              <select id="statusFilter" class="form-select form-select-sm" style="max-width: 160px">
                <option value="">All Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="archived">Archived</option>
              </select>
            </div>

            <div class="ms-auto d-flex gap-2">
              <button id="bulkImport" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-file-csv me-1"></i> Bulk Import
              </button>
              <button id="exportCSV" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-file-export me-1"></i> Export CSV
              </button>
              <a href="#" class="btn btn-primary btn-sm"
                ><i class="fa-solid fa-plus me-1"></i> Add Course</a
              >
            </div>
          </div>

          <!-- Courses Table Card -->
          <div class="card card-premium p-0 overflow-hidden">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">All Courses</h5>
                <div class="text-muted small">Total: {{total_courses}}</div>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th style="width: 38px"><input type="checkbox" id="selectAll" /></th>
                      <th>Course</th>
                      <th class="hide-xs">Teacher</th>
                      <th style="width: 120px">Enrolled</th>
                      <th style="width: 120px">Status</th>
                      <th class="text-end" style="width: 190px">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="coursesTableBody">
                    <!-- server-side / template rows -->
                    <tr>
                      <td><input type="checkbox" class="rowCheckbox" /></td>
                      <td>
                        <div class="fw-semibold">{{course_name}}</div>
                        <div class="text-muted small">{{course_short_desc}}</div>
                      </td>
                      <td class="hide-xs">{{teacher_name}}</td>
                      <td>{{enrolled_count}}</td>
                      <td><span class="badge bg-success">Published</span></td>
                      <td class="text-end action-btns">
                        <a href="#" class="btn btn-sm btn-outline-primary"
                          ><i class="fa-solid fa-eye me-1"></i> View</a
                        >
                        <a href="#" class="btn btn-sm btn-outline-secondary"
                          ><i class="fa-solid fa-pen-to-square me-1"></i> Edit</a
                        >
                        <button
                          class="btn btn-sm btn-outline-danger"
                          onclick="confirmDelete('{{course_name}}')"
                        >
                          <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                      </td>
                    </tr>

                    <!-- placeholder empty state row -->
                    <tr id="noRows" style="display: none">
                      <td colspan="6" class="text-center text-muted small py-4">
                        No courses found. Use "Add Course" or import via CSV.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Pagination & footer actions -->
          <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
              <button id="publishSelected" class="btn btn-sm btn-success me-2">
                Publish Selected
              </button>
              <button id="archiveSelected" class="btn btn-sm btn-outline-secondary">
                Archive Selected
              </button>
            </div>

            <nav>
              <!-- server rendered pagination -->
              <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>

          <footer class="mt-5 text-center text-muted small">
            Saif Academy Admin — Courses Management
          </footer>
        </main>
      </div>
    </div>

    <!-- Bootstrap + FontAwesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <!-- jQuery for small behaviors -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });

      // CSV demo actions
      document.getElementById('uploadCSVBtn').addEventListener('click', function () {
        alert('CSV Upload - open file picker / route to CSV import.');
      });
      document.getElementById('bulkImport').addEventListener('click', function () {
        alert('Bulk import clicked. Implement server endpoint to accept CSV files.');
      });
      document.getElementById('exportCSV').addEventListener('click', function () {
        alert('Export CSV clicked. Implement export functionality on server.');
      });

      // Select all toggle
      $('#selectAll').on('change', function () {
        $('.rowCheckbox').prop('checked', this.checked);
      });

      function confirmDelete(name) {
        if (confirm('Delete course "' + name + '"? This action cannot be undone.')) {
          // call server delete endpoint
          alert('Delete requested for: ' + name);
        }
      }

      // Simple client-side filter example (for demo/static placeholders)
      $('#search, #statusFilter').on('input change', function () {
        // Implement server-side filtering for real app. This is a placeholder.
        console.log('Filter changed', $('#search').val(), $('#statusFilter').val());
      });
    </script>
  </body>
</html>
