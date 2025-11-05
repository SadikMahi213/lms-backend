<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin Dashboard — Saif Academy</title>

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

    <!-- Tailwind Play CDN (for utility classes) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional icons -->
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
      /* sidebar */

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
      /* premium card styles */

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

      .card-gradient-4 {
        background: linear-gradient(90deg, rgba(249, 115, 22, 0.95), rgba(245, 158, 11, 0.95));
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
            <i class="fa-solid fa-graduation-cap text-white"></i>
          </div>
          <div>
            <div class="brand text-lg">Saif Academy</div>
            <div class="text-xs text-slate-300">Admin Panel</div>
          </div>
        </div>

        <nav class="mt-4">
          <a href="#" class="sidebar-link active"
            ><i class="fa-solid fa-gauge me-2"></i> Dashboard</a
          >
          <a href="courses.html" class="sidebar-link"
            ><i class="fa-solid fa-book-open me-2"></i> Courses</a
          >
          <a href="teachers.html" class="sidebar-link"
            ><i class="fa-solid fa-chalkboard-teacher me-2"></i> Teachers</a
          >
          <a href="enrolled-students.html" class="sidebar-link"
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

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="uploadCSVBtn" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-file-csv me-2"></i> CSV Upload
            </button>
          </div>
        </div>
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
              <h4 class="mb-0">Dashboard</h4>
              <small class="text-muted ms-2">Overview & analytics</small>
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
          <!-- stats cards -->
          <div class="row g-3">
            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-gradient p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm text-opacity-80">Total Students</div>
                    <div class="h3 my-1">{{total_students}}</div>
                    <div class="text-xs text-white/80">Active / Enrolled</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-users fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-gradient-2 p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm text-white/90">Courses</div>
                    <div class="h3 my-1">{{total_courses}}</div>
                    <div class="text-xs text-white/80">{{course_title}}</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-book fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-gradient-3 p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm">Payments</div>
                    <div class="h3 my-1">{{total_payments}}</div>
                    <div class="text-xs text-white/80">Monthly revenue</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-credit-card fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-gradient-4 p-3 shadow-sm">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="text-sm">Exams</div>
                    <div class="h3 my-1">{{total_exams}}</div>
                    <div class="text-xs text-white/80">Scheduled / Completed</div>
                  </div>
                  <div class="bg-white/10 rounded p-3">
                    <i class="fa-solid fa-file-pen fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- content row -->
          <div class="row mt-4 g-3">
            <div class="col-12 col-xl-8">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Recent Courses</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">Manage Courses</a>
                  </div>

                  <div class="table-responsive">
                    <table class="table align-middle">
                      <thead>
                        <tr>
                          <th>Course</th>
                          <th>Teacher</th>
                          <th>Students</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="fw-semibold">{{course_title}}</div>
                            <div class="text-muted small">{{course_desc}}</div>
                          </td>
                          <td>{{teacher_name}}</td>
                          <td>{{enrolled_count}}</td>
                          <td><span class="badge bg-success">Active</span></td>
                          <td><a href="#" class="btn btn-sm btn-outline-secondary">View</a></td>
                        </tr>
                        <!-- repeat rows as needed -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-xl-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h6 class="mb-3">Quick Actions</h6>
                  <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary"
                      ><i class="fa-solid fa-user-plus me-2"></i> Add Student</a
                    >
                    <a href="#" class="btn btn-outline-primary"
                      ><i class="fa-solid fa-file-csv me-2"></i> Import CSV</a
                    >
                    <a href="#" class="btn btn-outline-secondary"
                      ><i class="fa-solid fa-chart-line me-2"></i> Reports</a
                    >
                  </div>

                  <hr class="my-3" />

                  <h6 class="mb-2">Notifications</h6>
                  <ul class="list-unstyled small">
                    <li class="mb-2">
                      <span class="fw-semibold">System:</span> Backup completed successfully.
                    </li>
                    <li class="mb-2">
                      <span class="fw-semibold">Exam:</span> New exam scheduled for
                      {{next_exam_date}}.
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card mt-3 shadow-sm">
                <div class="card-body">
                  <h6 class="mb-2">Storage</h6>
                  <div class="text-muted small mb-2">
                    Used: {{storage_used}} of {{storage_total}}
                  </div>
                  <div class="progress" style="height: 10px">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 45%"
                      aria-valuenow="45"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- Custom scripts -->
    <script>
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });

      // CSV Upload button (demo purpose)
      document.getElementById('uploadCSVBtn').addEventListener('click', function () {
        alert('CSV Upload clicked!');
      });
    </script>
  </body>
</html>
