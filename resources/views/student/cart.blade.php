<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Add to Cart — Saif Academy</title>

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

      .course-card {
        transition: transform 0.2s, box-shadow 0.2s;
      }

      .course-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
      }

      .sidebar-link {
        color: #cbd5e1;
        display: block;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.2s;
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
          <a href="{{ route('student.dashboard') }}" class="sidebar-link"
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
          @foreach($courses as $course)
    <div class="course-item">
        <h4>{{ $course->title }}</h4>
        <a href="{{ route('student.cart.add', $course->id) }}">Add to cart</a>
    </div>
@endforeach

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
              @auth('web')
    <button type="button" class="btn btn-primary btn-sm add-to-cart-btn" data-course-id="{{ $course->id }}">
        Add to Cart
    </button>
@else
    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Add to Cart</a>
@endauth

              <small class="text-muted ms-2">Enroll in Courses</small>
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

        <main class="p-4 container-fluid">
          <h5 class="mb-4">Available Courses</h5>

          <div class="row g-4">
    @forelse($courses as $course)
        <div class="col-md-4">
            <div class="card course-card shadow-sm">
                @if($course->thumbnail)
                    <img src="{{ asset('storage/'.$course->thumbnail) }}" class="card-img-top" alt="{{ $course->name }}">
                @else
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="No Thumbnail">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($course->short_description, 100) }}</p>
                    <p class="text-sm text-muted">Teacher: {{ $course->teacher->name ?? 'N/A' }}</p>
                    <p class="text-sm text-muted">Enrolled Students: {{ $course->students_count }}</p>

                    {{-- Enroll Button --}}
                    @auth('web')
                        <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Enroll Now</button>
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Enroll Now</a>
                    @endauth
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card shadow-sm text-center py-5">
                <i class="fa-solid fa-shopping-cart fa-3x text-muted mb-3"></i>
                <h6 class="text-muted">No courses available at the moment</h6>
                <p class="text-muted small">Check back later for new courses!</p>
            </div>
        </div>
    @endforelse
</div>
<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartModalLabel">Course Added</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Course has been added to your cart successfully!
      </div>
      <div class="modal-footer">
        <a href="{{ route('student.cart') }}" class="btn btn-primary">Go to Cart</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue</button>
      </div>
    </div>
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
    <script>
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', function() {
        let courseId = this.dataset.courseId;

        fetch(`/student/cart/add/${courseId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Show modal
                var cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
                cartModal.show();
            } else {
                alert('Error adding course to cart');
            }
        })
        .catch(err => console.error(err));
    });
});
</script>

  </body>
</html>
