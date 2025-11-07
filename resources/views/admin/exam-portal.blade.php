<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Exam Portal — Saif Academy Admin</title>

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

    <!-- Tailwind utilities -->
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
        font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
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
          <a href="exam-portal.html" class="sidebar-link active"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
        </nav>

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="createExamBtn" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-plus me-2"></i> Create Exam
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
                <h4 class="mb-0">Exam Portal</h4>
                <small class="text-muted">Create, schedule and manage exams</small>
              </div>
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
            <div class="d-flex gap-2 w-full flex-grow-1">
              <input
                id="examSearch"
                class="form-control form-control-sm"
                placeholder="Search by exam title or course..."
              />
              <select
                id="courseFilter"
                class="form-select form-select-sm hide-xs"
                style="max-width: 220px"
              >
                <option value="">All Courses</option>
                <option value="{{course_id}}">{{course_title}}</option>
                <!-- server populate -->
              </select>
              <select
                id="examStatusFilter"
                class="form-select form-select-sm"
                style="max-width: 160px"
              >
                <option value="">All Status</option>
                <option value="scheduled">Scheduled</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>

            <div class="ms-auto d-flex gap-2">
              <button id="bulkSchedule" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-calendar-plus me-1"></i> Bulk Schedule
              </button>
              <button id="exportExams" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-file-export me-1"></i> Export
              </button>
              <a href="#" class="btn btn-primary btn-sm"
                ><i class="fa-solid fa-plus me-1"></i> New Exam</a
              >
            </div>
          </div>

          <!-- Exams Table -->
          <div class="card card-premium p-0 overflow-hidden">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">All Exams</h5>
                <div class="text-muted small">
                  Total: {{total_exams}} • Upcoming: {{upcoming_exams}}
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th style="width: 38px"><input type="checkbox" id="selectAllExams" /></th>
                      <th>Exam Title</th>
                      <th class="hide-xs">Course</th>
                      <th style="width: 150px">Date</th>
                      <th style="width: 120px">Duration</th>
                      <th style="width: 120px">Status</th>
                      <th class="text-end" style="width: 240px">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="examsTableBody">
                    <!-- template row (server-side) -->
                    <tr>
                      <td><input type="checkbox" class="rowCheckbox" /></td>
                      <td>
                        <div class="fw-semibold">{{exam_title}}</div>
                        <div class="text-muted small">{{exam_short_desc}}</div>
                      </td>
                      <td class="hide-xs">{{course_title}}</td>
                      <td>{{exam_date}}</td>
                      <td>{{duration}} mins</td>
                      <td><span class="badge bg-warning text-dark">{{status}}</span></td>
                      <td class="text-end action-btns">
                        <a href="#" class="btn btn-sm btn-outline-primary"
                          ><i class="fa-solid fa-eye me-1"></i> View</a
                        >
                        <a href="#" class="btn btn-sm btn-outline-secondary"
                          ><i class="fa-solid fa-pen-to-square me-1"></i> Edit</a
                        >
                        <button
                          class="btn btn-sm btn-outline-danger"
                          onclick="confirmDelete('{{exam_title}}')"
                        >
                          <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                      </td>
                    </tr>

                    <!-- empty placeholder -->
                    <tr id="noExams" style="display: none">
                      <td colspan="7" class="text-center text-muted small py-4">
                        No exams found. Create a new exam to get started.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Batch actions & pagination -->
          <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
              <button id="publishResults" class="btn btn-sm btn-success me-2">
                Publish Results
              </button>
              <button id="cancelSelected" class="btn btn-sm btn-outline-danger">
                Cancel Selected
              </button>
            </div>

            <nav>
              <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>

          <footer class="mt-5 text-center text-muted small">
            Saif Academy Admin — Exam Portal
          </footer>
        </main>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
      // Safe sidebar toggle
      const sidebarToggle = document.getElementById('sidebarToggle');
      const sidebar = document.getElementById('sidebar');
      if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', () => {
          sidebar.classList.toggle('show');
        });
      }

      // Demo actions
      const createExamBtn = document.getElementById('createExamBtn');
      const bulkSchedule = document.getElementById('bulkSchedule');
      const exportExams = document.getElementById('exportExams');

      if (createExamBtn) {
        createExamBtn.addEventListener('click', () => alert('Open create exam modal.'));
      }
      if (bulkSchedule) {
        bulkSchedule.addEventListener('click', () => alert('Bulk schedule clicked.'));
      }
      if (exportExams) {
        exportExams.addEventListener('click', () => alert('Export exams CSV.'));
      }

      // Select all toggle
      $('#selectAllExams').on('change', function () {
        $('.rowCheckbox').prop('checked', this.checked);
      });

      // Delete confirmation
      function confirmDelete(name) {
        if (confirm('Delete exam "' + name + '"? This action cannot be undone.')) {
          alert('Delete requested for: ' + name);
        }
      }

      // Simple filters placeholder
      $('#examSearch, #courseFilter, #examStatusFilter').on('input change', function () {
        console.log(
          'Filter changed',
          $('#examSearch').val(),
          $('#courseFilter').val(),
          $('#examStatusFilter').val()
        );
      });
    </script>
  </body>
</html>
