<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Dashboard — Saif Academy</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    :root { --sidebar-width: 270px; }
    body { font-family: 'Inter', sans-serif; }

    /* Sidebar */
    #sidebar { width: var(--sidebar-width); min-width: var(--sidebar-width); }
    @media (max-width: 992px) {
      #sidebar { position: fixed; left: -100%; top: 0; height: 100vh; z-index: 1050; transition: left 0.25s; }
      #sidebar.show { left: 0; }
    }

    /* Sidebar links */
    .sidebar-link { color: #cbd5e1; display: block; padding: 0.75rem 1rem; border-radius: 0.5rem; }
    .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.05); color: #fff; text-decoration: none; }

    /* Brand */
    .brand { font-weight: 700; letter-spacing: 0.3px; color: #fff; }

    /* Card gradients */
    .card-gradient { background: linear-gradient(90deg, rgba(59,130,246,0.95), rgba(99,102,241,0.95)); color: #fff; }
    .card-gradient-2 { background: linear-gradient(90deg, rgba(16,185,129,0.95), rgba(34,197,94,0.95)); color: #fff; }
    .card-gradient-3 { background: linear-gradient(90deg, rgba(236,72,153,0.95), rgba(168,85,247,0.95)); color: #fff; }
    .card-gradient-4 { background: linear-gradient(90deg, rgba(249,115,22,0.95), rgba(245,158,11,0.95)); color: #fff; }
  </style>
</head>

<body class="bg-slate-50">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="bg-slate-800 p-4 shadow-lg flex flex-col">
      <div class="flex items-center gap-3 mb-6 px-2">
        <div class="rounded-md bg-gradient-to-tr from-indigo-500 to-purple-600 w-10 h-10 flex items-center justify-center">
          <i class="fa-solid fa-graduation-cap text-white"></i>
        </div>
        <div>
          <div class="brand text-lg">Saif Academy</div>
          <div class="text-xs text-slate-300">Admin Panel</div>
        </div>
      </div>

      <nav class="mt-4 flex-1">
        <a href="#" class="sidebar-link active"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
        <a href="{{ route('admin.courses') }}" class="sidebar-link"><i class="fa-solid fa-book-open me-2"></i> Courses</a>
        <a href="{{ route('admin.teachers') }}" class="sidebar-link"><i class="fa-solid fa-chalkboard-teacher me-2"></i> Teachers</a>
        <a href="{{ route('admin.students.index') }}" class="sidebar-link"><i class="fa-solid fa-user-graduate me-2"></i> Students</a>
        <a href="{{ route('admin.payments') }}" class="sidebar-link"><i class="fa-solid fa-credit-card me-2"></i> Payments</a>
        <a href="{{ route('admin.notice-board') }}" class="sidebar-link"><i class="fa-solid fa-bell me-2"></i> Notices</a>
        <a href="{{ route('admin.portfolio') }}" class="sidebar-link"><i class="fa-solid fa-briefcase me-2"></i> Portfolio</a>
        <a href="{{ route('admin.library') }}" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
        <a href="{{ route('admin.exam-portal') }}" class="sidebar-link"><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a>
      </nav>

      <div class="mt-auto px-2 pt-6">
        <!--<div class="text-xs text-slate-400">Quick actions</div>--!>
        <div class="flex gap-2 mt-2">
          <!-- Button to trigger modal -->
<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Students CSV</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('admin.students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="file" class="form-label">Choose CSV file</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </form>
      
    </div>
  </div>
</div>


        </div>
      </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col min-h-screen">
      <!-- Topbar -->
      <header class="bg-white border-b shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center px-4 py-3">
          <div class="d-flex align-items-center gap-3">
            <button id="sidebarToggle" class="btn btn-outline-secondary d-lg-none">
              <i class="fa-solid fa-bars"></i>
            </button>
            <h4 class="mb-0">Dashboard</h4>
            <small class="text-muted ms-2">Overview & Analytics</small>
          </div>
          <div class="d-flex align-items-center gap-3">
            <div class="d-none d-md-block text-muted">Welcome, <strong>{{ auth()->user()->name }}</strong></div>
            <div class="dropdown">
              <a class="d-flex align-items-center text-decoration-none" href="#" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name=Admin&background=7c3aed&color=fff" class="rounded-circle" width="38" height="38" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <main class="p-4 container-fluid flex-1">
        <!-- Stats cards -->
        <div class="row g-3 mb-4">
          <div class="col-12 col-md-6 col-xl-3">
            <div class="card card-gradient p-3 shadow-sm">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="text-sm text-white/80">Total Students</div>
                  <div class="h3 my-1">{{ $total_students }}</div>
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
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="text-sm text-white/90">Courses</div>
                  <div class="h3 my-1">0</div>
                  <div class="text-xs text-white/80">Sample Course</div>
                </div>
                <div class="bg-white/10 rounded p-3">
                  <i class="fa-solid fa-book fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3">
            <div class="card card-gradient-3 p-3 shadow-sm">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="text-sm">Payments</div>
                  <div class="h3 my-1">\${{ $total_payments }}</div>
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
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="text-sm">Exams</div>
                  <div class="h3 my-1">0</div>
                  <div class="text-xs text-white/80">Scheduled / Completed</div>
                </div>
                <div class="bg-white/10 rounded p-3">
                  <i class="fa-solid fa-file-pen fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Students Table -->
        <div class="row g-3">
          <div class="col-12 col-xl-8">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="mb-0">Students</h5>
                  <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    <i class="fa-solid fa-user-plus me-1"></i> Add Student
                  </button>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover align-middle">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($students as $student)
                      <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->created_at }}</td>
                        <td class="d-flex gap-1">
                          <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                          <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Actions Sidebar -->
          <div class="col-12 col-xl-4">
            <div class="card shadow-sm p-3 mb-3">
              <h6 class="mb-3">Quick Actions</h6>
              <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                  <i class="fa-solid fa-user-plus me-2"></i> Add Student
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
    Import CSV
</button>
                <a href="#" class="btn btn-outline-secondary"><i class="fa-solid fa-chart-line me-2"></i> Reports</a>
              </div>
            </div>

            <div class="card shadow-sm p-3 mb-3">
              <h6 class="mb-2">Notifications</h6>
              <ul class="list-unstyled small">
                <li class="mb-2"><span class="fw-semibold">System:</span> Backup completed successfully.</li>
                <li class="mb-2"><span class="fw-semibold">Exam:</span> No exams scheduled.</li>
              </ul>
            </div>

            <div class="card shadow-sm p-3">
              <h6 class="mb-2">Storage</h6>
              <div class="text-muted small mb-2">Used: 0GB of 100GB</div>
              <div class="progress" style="height: 10px">
                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Add Student Modal -->
  <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.students.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="mb-3">
              <label for="course" class="form-label">Course</label>
              <input type="text" name="course" id="course" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Student</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('show');
    });
    document.getElementById('uploadCSVBtn').addEventListener('click', function () {
      alert('CSV Upload clicked!');
    });
  </script>
</body>
</html>
