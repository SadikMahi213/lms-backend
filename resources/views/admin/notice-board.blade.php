<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Notice Board — Saif Academy Admin</title>

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

    <!-- Tailwind (utilities) -->
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

      .notice-card {
        border-left: 4px solid;
        border-radius: 10px;
        background: #fff;
      }

      .priority-high {
        border-color: #ef4444;
      }

      .priority-medium {
        border-color: #f59e0b;
      }

      .priority-low {
        border-color: #10b981;
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
          <a href="notice-board.html" class="sidebar-link active"
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
            <button id="btnNewNotice" class="btn btn-sm btn-light w-full">
              <i class="fa-solid fa-plus me-2"></i> New Notice
            </button>
          </div>
        </div>
      </aside>

      <!-- Main -->
      <div class="flex-1 min-h-screen">
        <header class="bg-white border-b shadow-sm">
          <div class="container-fluid d-flex align-items-center justify-content-between px-4 py-3">
            <div class="d-flex align-items-center gap-3">
              <button id="sidebarToggle" class="btn btn-outline-secondary d-lg-none">
                <i class="fa-solid fa-bars"></i>
              </button>
              <div>
                <h4 class="mb-0">Notice Board</h4>
                <small class="text-muted">Create, edit and manage system notices</small>
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
            <div class="d-flex gap-2 w-full">
              <input
                id="noticeSearch"
                class="form-control form-control-sm"
                placeholder="Search notices by title or content..."
              />
              <select
                id="priorityFilter"
                class="form-select form-select-sm"
                style="max-width: 160px"
              >
                <option value="">All Priorities</option>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
              </select>
              <input
                id="dateFilter"
                type="date"
                class="form-control form-control-sm"
                style="max-width: 180px"
              />
            </div>

            <div class="ms-auto d-flex gap-2">
              <button id="btnExportNotices" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-file-export me-1"></i> Export
              </button>
              <button id="btnNewNoticeTop" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-plus me-1"></i> Create Notice
              </button>
            </div>
          </div>

          <!-- Notices list -->
          <div class="row g-3">
            <div class="col-12 col-lg-8">
              <div class="card card-premium p-0 overflow-hidden">
                <div class="card-body p-3">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Active Notices</h5>
                    <div class="text-muted small">Total: {{total_notices}}</div>
                  </div>

                  <div id="noticesList" class="list-group list-group-flush">
                    <!-- example notice template (server rendered) -->
                    <div class="list-group-item mb-3 notice-card priority-high p-3">
                      <div class="d-flex justify-content-between">
                        <div>
                          <div class="fw-semibold">{{notice_title}}</div>
                          <div class="text-muted small">{{notice_content}}</div>
                        </div>
                        <div class="text-end">
                          <div class="text-muted small">{{notice_date}}</div>
                          <div class="mt-2"><span class="badge bg-danger">High</span></div>
                        </div>
                      </div>

                      <div class="mt-3 d-flex justify-content-end gap-2">
                        <button
                          class="btn btn-sm btn-outline-primary btn-edit"
                          data-id="{{notice_id}}"
                        >
                          <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                        </button>
                        <button
                          class="btn btn-sm btn-outline-danger btn-delete"
                          data-id="{{notice_id}}"
                          data-title="{{notice_title}}"
                        >
                          <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                      </div>
                    </div>

                    <!-- placeholder empty state -->
                    <div
                      id="noNotices"
                      class="text-center text-muted small py-4"
                      style="display: none"
                    >
                      No notices found. Create a new notice to get started.
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right column: priority quick list & recent -->
            <div class="col-12 col-lg-4">
              <div class="card shadow-sm mb-3">
                <div class="card-body">
                  <h6 class="mb-3">Quick Priorities</h6>
                  <div class="d-grid gap-2">
                    <button class="btn btn-danger btn-sm" data-filter="high">High Priority</button>
                    <button class="btn btn-warning btn-sm" data-filter="medium">
                      Medium Priority
                    </button>
                    <button class="btn btn-success btn-sm" data-filter="low">Low Priority</button>
                  </div>
                </div>
              </div>

              <div class="card shadow-sm">
                <div class="card-body">
                  <h6 class="mb-3">Recent Notices</h6>
                  <ul class="list-unstyled small mb-0">
                    <li class="mb-2">
                      <span class="fw-semibold">{{recent_notice_title}}</span><br /><span
                        class="text-muted"
                        >{{recent_notice_date}}</span
                      >
                    </li>
                    <!-- repeat server-side -->
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <footer class="mt-5 text-center text-muted small">
            Saif Academy Admin — Notice Board
          </footer>
        </main>
      </div>
    </div>

    <!-- Create / Edit Modal -->
    <div class="modal fade" id="noticeModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form id="noticeForm">
            <div class="modal-header">
              <h5 class="modal-title" id="noticeModalTitle">Create Notice</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="noticeId" />
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input id="noticeTitle" class="form-control" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea id="noticeContent" class="form-control" rows="4" required></textarea>
              </div>
              <div class="row g-2">
                <div class="col-6">
                  <label class="form-label">Date</label>
                  <input id="noticeDate" type="date" class="form-control" required />
                </div>
                <div class="col-6">
                  <label class="form-label">Priority</label>
                  <select id="noticePriority" class="form-select" required>
                    <option value="high">High</option>
                    <option value="medium" selected>Medium</option>
                    <option value="low">Low</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Cancel
              </button>
              <button type="submit" class="btn btn-primary" id="saveNoticeBtn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Notice</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete <strong id="deleteNoticeTitle"></strong>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Cancel
            </button>
            <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>
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

      // Modal references
      const noticeModal = new bootstrap.Modal(document.getElementById('noticeModal'));
      const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));

      // Demo in-memory notices array (replace with server data)
      let notices = [
        {
          id: 1,
          title: '{{notice_title}}',
          content: '{{notice_content}}',
          date: '{{notice_date}}',
          priority: 'high',
        },
      ];

      function renderNotices() {
        const $list = $('#noticesList');
        // remove previously rendered dynamic items (keep server-rendered template if any)
        $list.find('.notice-card.dynamic').remove();

        if (!notices.length) {
          $('#noNotices').show();
          return;
        }
        $('#noNotices').hide();

        notices.forEach((n) => {
          const priorityClass =
            n.priority === 'high'
              ? 'priority-high'
              : n.priority === 'medium'
              ? 'priority-medium'
              : 'priority-low';
          const badgeClass =
            n.priority === 'high'
              ? 'bg-danger'
              : n.priority === 'medium'
              ? 'bg-warning text-dark'
              : 'bg-success';

          const $item = $(`
            <div class="list-group-item mb-3 notice-card dynamic ${priorityClass} p-3" data-id="${
            n.id
          }">
              <div class="d-flex justify-content-between">
                <div>
                  <div class="fw-semibold">${escapeHtml(n.title)}</div>
                  <div class="text-muted small mt-1">${escapeHtml(n.content)}</div>
                </div>
                <div class="text-end">
                  <div class="text-muted small">${escapeHtml(n.date)}</div>
                  <div class="mt-2"><span class="badge ${badgeClass}">${capitalize(
            n.priority
          )}</span></div>
                </div>
              </div>
              <div class="mt-3 d-flex justify-content-end gap-2">
                <button class="btn btn-sm btn-outline-primary btn-edit" data-id="${
                  n.id
                }"><i class="fa-solid fa-pen-to-square me-1"></i> Edit</button>
                <button class="btn btn-sm btn-outline-danger btn-delete" data-id="${
                  n.id
                }" data-title="${escapeHtml(
            n.title
          )}"><i class="fa-solid fa-trash me-1"></i> Delete</button>
              </div>
            </div>
          `);

          $list.prepend($item);
        });
      }

      // helpers
      function capitalize(s) {
        return (s || '').charAt(0).toUpperCase() + (s || '').slice(1);
      }

      function escapeHtml(str) {
        return String(str || '').replace(/[&<>"'`=/]/g, function (s) {
          return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;',
            '`': '&#x60;',
            '=': '&#x3D;',
          }[s];
        });
      }

      // initial render
      renderNotices();

      // Open create modal
      $('#btnNewNotice, #btnNewNoticeTop').on('click', function () {
        $('#noticeModalTitle').text('Create Notice');
        $('#noticeForm')[0].reset();
        $('#noticeId').val('');
        noticeModal.show();
      });

      // Save (create / edit)
      $('#noticeForm').on('submit', function (e) {
        e.preventDefault();
        const id = $('#noticeId').val();
        const payload = {
          id: id ? parseInt(id, 10) : Date.now(),
          title: $('#noticeTitle').val().trim(),
          content: $('#noticeContent').val().trim(),
          date: $('#noticeDate').val(),
          priority: $('#noticePriority').val(),
        };

        if (!payload.title || !payload.content || !payload.date) {
          alert('Please fill all required fields.');
          return;
        }

        if (id) {
          // edit
          notices = notices.map((n) => (n.id === payload.id ? payload : n));
        } else {
          // create (add to start)
          notices.unshift(payload);
        }

        renderNotices();
        noticeModal.hide();
      });

      // Edit handler (delegated)
      $(document).on('click', '.btn-edit', function () {
        const id = parseInt($(this).data('id'), 10);
        const n = notices.find((x) => x.id === id);
        if (!n) return;
        $('#noticeModalTitle').text('Edit Notice');
        $('#noticeId').val(n.id);
        $('#noticeTitle').val(n.title);
        $('#noticeContent').val(n.content);
        $('#noticeDate').val(n.date);
        $('#noticePriority').val(n.priority);
        noticeModal.show();
      });

      // Delete handler (delegated)
      let deleteId = null;
      $(document).on('click', '.btn-delete', function () {
        deleteId = parseInt($(this).data('id'), 10);
        const title = $(this).data('title') || '';
        $('#deleteNoticeTitle').text(title);
        deleteModal.show();
      });

      $('#confirmDeleteBtn').on('click', function () {
        if (deleteId !== null) {
          notices = notices.filter((n) => n.id !== deleteId);
          renderNotices();
          deleteModal.hide();
          deleteId = null;
        }
      });

      // Filters (demo only)
      $('#noticeSearch, #priorityFilter, #dateFilter').on('input change', function () {
        // Replace with server-side filtering / AJAX for production
        console.log(
          'Filter change',
          $('#noticeSearch').val(),
          $('#priorityFilter').val(),
          $('#dateFilter').val()
        );
      });

      // Quick priority buttons
      $('[data-filter]').on('click', function () {
        $('#priorityFilter').val($(this).data('filter')).trigger('change');
      });

      // Export placeholder
      $('#btnExportNotices').on('click', function () {
        alert('Export notices CSV - implement server endpoint.');
      });
    </script>
  </body>
</html>
