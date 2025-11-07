<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Payments — Saif Academy Admin</title>

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

      .action-btns .btn {
        margin-left: 6px;
      }

      .status-badge {
        min-width: 96px;
        text-align: center;
        display: inline-block;
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
          <a href="payments.html" class="sidebar-link active"
            ><i class="fa-solid fa-credit-card me-2"></i> Payments</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-bell me-2"></i> Notices</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
          <a href="#" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
        </nav>

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="refundsBtn" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-money-bill-transfer me-2"></i> Process Refund
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
                <h4 class="mb-0">Payment Management</h4>
                <small class="text-muted">View and manage student payments</small>
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
          <!-- Filters & search -->
          <div
            class="d-flex flex-column flex-md-row gap-3 align-items-start align-items-md-center mb-3"
          >
            <div class="d-flex gap-2 w-full">
              <input
                id="paymentSearch"
                class="form-control form-control-sm"
                placeholder="Search by student, course or transaction id..."
              />
              <select
                id="courseFilter"
                class="form-select form-select-sm hide-xs"
                style="max-width: 220px"
              >
                <option value="">All Courses</option>
                @foreach($courses as $course)
        <option value="{{ $course->id }}">{{ $course->title }}</option>
    @endforeach
              </select>
              <select
                id="paymentStatusFilter"
                class="form-select form-select-sm"
                style="max-width: 160px"
              >
                <option value="">All Status</option>
                <option value="paid">Paid</option>
                <option value="pending">Pending</option>
                <option value="refunded">Refunded</option>
              </select>
            </div>

            <div class="ms-auto d-flex gap-2">
              <button id="exportPayments" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-file-export me-1"></i> Export
              </button>
              <a href="#" class="btn btn-primary btn-sm"
                ><i class="fa-solid fa-plus me-1"></i> Add Payment</a
              >
            </div>
          </div>

          <!-- Payments table -->
          <div class="card card-premium p-0 overflow-hidden">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Payments</h5>
                <div class="text-muted small">
                  <h3>Total Payments: {{ $total_payments }} </h3>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th style="width: 38px"><input type="checkbox" id="selectAllPayments" /></th>
                      <th>Student</th>
                      <th class="hide-xs">Course</th>
                      <th style="width: 140px">Amount</th>
                      <th style="width: 140px">Status</th>
                      <th class="text-end" style="width: 220px">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="paymentsTableBody">
@forelse($payments as $payment)
<tr>
    <td><input type="checkbox" class="rowCheckbox" /></td>
    <td>
        <div class="d-flex align-items-center gap-3">
            <img src="{{ $payment->student->avatar ?? asset('images/default-avatar.png') }}" alt="avatar" class="rounded-circle" width="42" height="42"/>
            <div>
                <div class="fw-semibold">{{ $payment->student->name }}</div>
                <div class="text-muted small">{{ $payment->student->email }}</div>
            </div>
        </div>
    </td>
    <td class="hide-xs">{{ $payment->course->title }}</td>
    <td> ৳ {{ $payment->amount }}</td>
    <td>
        <span class="badge status-badge 
            @if($payment->status == 'paid') bg-success 
            @elseif($payment->status == 'pending') bg-warning 
            @elseif($payment->status == 'refunded') bg-danger 
            @endif">
            {{ ucfirst($payment->status) }}
        </span>
    </td>
    <td class="text-end action-btns">
        <button class="btn btn-sm btn-outline-success" onclick="confirmMarkPaid('{{ $payment->student->name }}','{{ $payment->transaction_id }}')">
            <i class="fa-solid fa-check me-1"></i> Mark Paid
        </button>
        <button class="btn btn-sm btn-outline-warning" onclick="confirmRefund('{{ $payment->student->name }}','{{ $payment->transaction_id }}')">
            <i class="fa-solid fa-rotate-left me-1"></i> Refund
        </button>
    </td>
</tr>
@empty
<tr id="noPayments">
    <td colspan="6" class="text-center text-muted small py-4">
        No payments found. Use filters or import data.
    </td>
</tr>
@endforelse
</tbody>

                </table>
              </div>
            </div>
          </div>

          <!-- Batch actions & pagination -->
          <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
              <button id="markSelectedPaid" class="btn btn-sm btn-success me-2">
                Mark Selected Paid
              </button>
              <button id="refundSelected" class="btn btn-sm btn-outline-danger">
                Refund Selected
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
            Saif Academy Admin — Payment Management
          </footer>
        </main>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });

      // Demo actions
      document.getElementById('exportPayments').addEventListener('click', function () {
        alert('Export payments CSV.');
      });
      document.getElementById('refundsBtn').addEventListener('click', function () {
        alert('Open refund processing panel.');
      });

      // Select all toggle
      $('#selectAllPayments').on('change', function () {
        $('.rowCheckbox').prop('checked', this.checked);
      });

      function confirmMarkPaid(student, tx) {
        if (confirm('Mark payment for "' + student + '" (TX: ' + tx + ') as paid?')) {
          // call server endpoint to mark paid
          alert('Marked paid: ' + tx);
        }
      }

      function confirmRefund(student, tx) {
        if (confirm('Refund payment for "' + student + '" (TX: ' + tx + ')?')) {
          // call server endpoint to refund
          alert('Refund requested: ' + tx);
        }
      }

      // Batch actions (demo placeholders)
      $('#markSelectedPaid').on('click', function () {
        alert('Mark selected payments as paid. Implement server logic.');
      });
      $('#refundSelected').on('click', function () {
        alert('Refund selected payments. Implement server logic.');
      });

      // Filters (demo placeholder)
      $('#paymentSearch, #courseFilter, #paymentStatusFilter').on('input change', function () {
        console.log(
          'Filter changed',
          $('#paymentSearch').val(),
          $('#courseFilter').val(),
          $('#paymentStatusFilter').val()
        );
      });
    </script>
  </body>
</html>
```// filepath: f:\Saif Academy Frontend\admin\payments.html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Payments — Saif Academy Admin</title>

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

      .action-btns .btn {
        margin-left: 6px;
      }

      .status-badge {
        min-width: 96px;
        text-align: center;
        display: inline-block;
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
          <a href="payments.html" class="sidebar-link active"
            ><i class="fa-solid fa-credit-card me-2"></i> Payments</a
          >
          <a href="#" class="sidebar-link"><i class="fa-solid fa-bell me-2"></i> Notices</a>
          <a href="#" class="sidebar-link"><i class="fa-solid fa-book me-2"></i> Library</a>
          <a href="#" class="sidebar-link"
            ><i class="fa-solid fa-file-lines me-2"></i> Exam Portal</a
          >
        </nav>

        <div class="mt-auto px-2 pt-6">
          <div class="text-xs text-slate-400">Quick actions</div>
          <div class="flex gap-2 mt-2">
            <button id="refundsBtn" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-money-bill-transfer me-2"></i> Process Refund
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
                <h4 class="mb-0">Payment Management</h4>
                <small class="text-muted">View and manage student payments</small>
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
          <!-- Filters & search -->
          <div
            class="d-flex flex-column flex-md-row gap-3 align-items-start align-items-md-center mb-3"
          >
            <div class="d-flex gap-2 w-full">
              <input
                id="paymentSearch"
                class="form-control form-control-sm"
                placeholder="Search by student, course or transaction id..."
              />
              <select
                id="courseFilter"
                class="form-select form-select-sm hide-xs"
                style="max-width: 220px"
              >
                <option value="">All Courses</option>
                <option value="{{$course_id}}">{{$course_title}}</option>
              </select>
              <select
                id="paymentStatusFilter"
                class="form-select form-select-sm"
                style="max-width: 160px"
              >
                <option value="">All Status</option>
                <option value="paid">Paid</option>
                <option value="pending">Pending</option>
                <option value="refunded">Refunded</option>
              </select>
            </div>

            <div class="ms-auto d-flex gap-2">
              <button id="exportPayments" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-file-export me-1"></i> Export
              </button>
              <a href="#" class="btn btn-primary btn-sm"
                ><i class="fa-solid fa-plus me-1"></i> Add Payment</a
              >
            </div>
          </div>

          <!-- Payments table -->
          <div class="card card-premium p-0 overflow-hidden">
            <div class="card-body p-3">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Payments</h5>
                <div class="text-muted small">
                  Total: {{$total_payments}} • Revenue: {{$total_revenue}}
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th style="width: 38px"><input type="checkbox" id="selectAllPayments" /></th>
                      <th>Student</th>
                      <th class="hide-xs">Course</th>
                      <th style="width: 140px">Amount</th>
                      <th style="width: 140px">Status</th>
                      <th class="text-end" style="width: 220px">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="paymentsTableBody">
                    <!-- template row (server-side) -->
                    <tr>
                      <td><input type="checkbox" class="rowCheckbox" /></td>
                      <td>
                        <div class="d-flex align-items-center gap-3">
                          <img
                            src="{{ $payment->student->avatar ?? asset('images/default-avatar.png') }}"
                            alt="avatar"
                            class="rounded-circle"
                            width="42"
                            height="42"
                          />
                          <div>
                            <div class="fw-semibold">{{ auth()->user()->name }}</div>
                            <div class="text-muted small">{{ $payment->student->email }}</div>
                          </div>
                        </div>
                      </td>
                      <td class="hide-xs">{{ $payment->course->title }}</td>
                      <td>৳ {{ $payment->course->title }}</td>
                      <td>
                        <span class="badge status-badge bg-success">{{$payment_status}}</span>
                      </td>
                      <td class="text-end action-btns">
                        <button
                          class="btn btn-sm btn-outline-success"
                          onclick="confirmMarkPaid('{{ auth()->user()->name }}','{{transaction_id}}')"
                        >
                          <i class="fa-solid fa-check me-1"></i> Mark Paid
                        </button>
                        <button
                          class="btn btn-sm btn-outline-warning"
                          onclick="confirmRefund('{{ auth()->user()->name }}','{{transaction_id}}')"
                        >
                          <i class="fa-solid fa-rotate-left me-1"></i> Refund
                        </button>
                      </td>
                    </tr>

                    <!-- empty placeholder -->
                    <tr id="noPayments" style="display: none">
                      <td colspan="6" class="text-center text-muted small py-4">
                        No payments found. Use filters or import data.
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
              <button id="markSelectedPaid" class="btn btn-sm btn-success me-2">
                Mark Selected Paid
              </button>
              <button id="refundSelected" class="btn btn-sm btn-outline-danger">
                Refund Selected
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
            Saif Academy Admin — Payment Management
          </footer>
        </main>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
      // Sidebar toggle
      document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
      });

      // Demo actions
      document.getElementById('exportPayments').addEventListener('click', function () {
        alert('Export payments CSV.');
      });
      document.getElementById('refundsBtn').addEventListener('click', function () {
        alert('Open refund processing panel.');
      });

      // Select all toggle
      $('#selectAllPayments').on('change', function () {
        $('.rowCheckbox').prop('checked', this.checked);
      });

      function confirmMarkPaid(student, tx) {
        if (confirm('Mark payment for "' + student + '" (TX: ' + tx + ') as paid?')) {
          // call server endpoint to mark paid
          alert('Marked paid: ' + tx);
        }
      }

      function confirmRefund(student, tx) {
        if (confirm('Refund payment for "' + student + '" (TX: ' + tx + ')?')) {
          // call server endpoint to refund
          alert('Refund requested: ' + tx);
        }
      }

      // Batch actions (demo placeholders)
      $('#markSelectedPaid').on('click', function () {
        alert('Mark selected payments as paid. Implement server logic.');
      });
      $('#refundSelected').on('click', function () {
        alert('Refund selected payments. Implement server logic.');
      });

      // Filters (demo placeholder)
      $('#paymentSearch, #courseFilter, #paymentStatusFilter').on('input change', function () {
        console.log(
          'Filter changed',
          $('#paymentSearch').val(),
          $('#courseFilter').val(),
          $('#paymentStatusFilter').val()
        );
      });
    </script>
  </body>
</html>
