<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Portfolio & Stats — Saif Academy Admin</title>

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

      .stat-value {
        font-size: 1.6rem;
        font-weight: 700;
      }

      .chart-card {
        min-height: 220px;
      }
    </style>
  </head>

  <body>
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
          <a href="enrolled-students.html" class="sidebar-link"
            ><i class="fa-solid fa-user-graduate me-2"></i> Students</a
          >
          <a href="payments.html" class="sidebar-link"
            ><i class="fa-solid fa-credit-card me-2"></i> Payments</a
          >
          <a href="notice-board.html" class="sidebar-link"
            ><i class="fa-solid fa-bell me-2"></i> Notices</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
          <a href="#" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
        </nav>

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="openReports" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-chart-line me-2"></i> Reports
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
                <h4 class="mb-0">Portfolio & Stats</h4>
                <small class="text-muted"
                  >Overview of students, courses, revenue and exam performance</small
                >
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
          <!-- Summary cards -->
          <div class="row g-3">
            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-premium p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="text-sm text-muted">Total Students</div>
                    <div class="stat-value">{{total_students}}</div>
                    <div class="text-xs text-muted">Active / Enrolled</div>
                  </div>
                  <div class="bg-indigo-50 text-indigo-700 rounded p-3">
                    <i class="fa-solid fa-users fa-lg"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-premium p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="text-sm text-muted">Total Courses</div>
                    <div class="stat-value">{{total_courses}}</div>
                    <div class="text-xs text-muted">{{most_popular_course}}</div>
                  </div>
                  <div class="bg-emerald-50 text-emerald-700 rounded p-3">
                    <i class="fa-solid fa-book fa-lg"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-premium p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="text-sm text-muted">Revenue (Monthly)</div>
                    <div class="stat-value">₹ {{monthly_revenue}}</div>
                    <div class="text-xs text-muted">{{revenue_change}} vs prev month</div>
                  </div>
                  <div class="bg-rose-50 text-rose-700 rounded p-3">
                    <i class="fa-solid fa-credit-card fa-lg"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-premium p-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="text-sm text-muted">Exam Pass Rate</div>
                    <div class="stat-value">{{exam_pass_rate}}%</div>
                    <div class="text-xs text-muted">Last 30 days</div>
                  </div>
                  <div class="bg-yellow-50 text-yellow-800 rounded p-3">
                    <i class="fa-solid fa-file-pen fa-lg"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Charts row -->
          <div class="row g-3 mt-3">
            <div class="col-12 col-lg-6">
              <div class="card card-premium p-3 chart-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="mb-0">Student Growth</h6>
                  <small class="text-muted">Last 12 months</small>
                </div>
                <canvas id="studentsGrowthChart" style="width: 100%; height: 220px"></canvas>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card card-premium p-3 chart-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="mb-0">Revenue</h6>
                  <small class="text-muted">Monthly</small>
                </div>
                <canvas id="revenueChart" style="width: 100%; height: 220px"></canvas>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card card-premium p-3 chart-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="mb-0">Exam Results Distribution</h6>
                  <small class="text-muted">Last exam</small>
                </div>
                <canvas id="examResultsChart" style="width: 100%; height: 220px"></canvas>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card card-premium p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h6 class="mb-0">Top Courses by Enrollment</h6>
                  <small class="text-muted">This month</small>
                </div>
                <ul class="list-group list-group-flush">
                  <!-- server rendered items -->
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">{{top_course_1}}</div>
                      <div class="text-muted small">{{top_course_1_teacher}}</div>
                    </div>
                    <div class="text-muted small">{{top_course_1_count}} students</div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">{{top_course_2}}</div>
                      <div class="text-muted small">{{top_course_2_teacher}}</div>
                    </div>
                    <div class="text-muted small">{{top_course_2_count}} students</div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">{{top_course_3}}</div>
                      <div class="text-muted small">{{top_course_3_teacher}}</div>
                    </div>
                    <div class="text-muted small">{{top_course_3_count}} students</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <footer class="mt-4 text-center text-muted small">
            Saif Academy Admin — Portfolio & Stats
          </footer>
        </main>
      </div>
    </div>

    <!-- Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
      // Safe DOM references
      const sidebarToggle = document.getElementById('sidebarToggle');
      const sidebar = document.getElementById('sidebar');
      const openReportsBtn = document.getElementById('openReports');

      // Sidebar toggle
      if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
          sidebar.classList.toggle('show');
        });
      }

      // Demo button
      if (openReportsBtn) {
        openReportsBtn.addEventListener('click', function () {
          alert('Open detailed reports.');
        });
      }

      // Initialize charts once to avoid redeclaration errors
      (function initPortfolioCharts() {
        if (window.__saifPortfolioInit) return;
        window.__saifPortfolioInit = true;

        const months = [
          'Jan',
          'Feb',
          'Mar',
          'Apr',
          'May',
          'Jun',
          'Jul',
          'Aug',
          'Sep',
          'Oct',
          'Nov',
          'Dec',
        ];

        // Students growth chart
        const studentsEl = document.getElementById('studentsGrowthChart');
        if (studentsEl && window.Chart) {
          const studentsCtx = studentsEl.getContext('2d');
          new Chart(studentsCtx, {
            type: 'line',
            data: {
              labels: months,
              datasets: [
                {
                  label: 'Students',
                  data: [120, 140, 160, 180, 210, 230, 260, 300, 340, 380, 420, 460],
                  borderColor: '#4f46e5',
                  backgroundColor: 'rgba(79,70,229,0.08)',
                  fill: true,
                  tension: 0.3,
                },
              ],
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  display: false,
                },
              },
              scales: {
                y: {
                  beginAtZero: true,
                },
              },
            },
          });
        }

        // Revenue chart
        const revenueEl = document.getElementById('revenueChart');
        if (revenueEl && window.Chart) {
          const revenueCtx = revenueEl.getContext('2d');
          new Chart(revenueCtx, {
            type: 'bar',
            data: {
              labels: months,
              datasets: [
                {
                  label: 'Revenue',
                  data: [
                    12000, 15000, 14000, 18000, 20000, 22000, 24000, 26000, 28000, 30000, 32000,
                    36000,
                  ],
                  backgroundColor: '#10b981',
                },
              ],
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  display: false,
                },
              },
              scales: {
                y: {
                  beginAtZero: true,
                },
              },
            },
          });
        }

        // Exam results doughnut
        const examEl = document.getElementById('examResultsChart');
        if (examEl && window.Chart) {
          const examCtx = examEl.getContext('2d');
          new Chart(examCtx, {
            type: 'doughnut',
            data: {
              labels: ['Pass', 'Fail', 'Absent'],
              datasets: [
                {
                  data: [72, 18, 10],
                  backgroundColor: ['#059669', '#ef4444', '#f59e0b'],
                },
              ],
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'bottom',
                },
              },
            },
          });
        }
      })();
    </script>
  </body>
</html>
