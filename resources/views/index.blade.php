<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Saif Academy — Learn & Grow</title>

    <!-- Google Fonts -->
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
      body {
        font-family: 'Inter', sans-serif;
      }

      .hero {
        background: linear-gradient(to right, #3b82f6, #8b5cf6);
        color: white;
      }

      .feature-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s;
      }

      a.btn-primary {
        background: #3b82f6;
        border: none;
      }

      a.btn-primary:hover {
        background: #2563eb;
      }
    </style>
  </head>

  <body class="bg-slate-50">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-indigo-600" href="{{ url('/') }}">Saif Academy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>

        @guest
          <!-- Not logged in -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login / Register</a>
          </li>
        @else
          <!-- Logged in -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              @if(auth()->user()->role === 'admin')
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              @elseif(auth()->user()->role === 'teacher')
                <li><a class="dropdown-item" href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
              @elseif(auth()->user()->role === 'student')
                <li><a class="dropdown-item" href="{{ route('student.dashboard') }}">Dashboard</a></li>
              @endif
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

    <!-- Hero Section -->
    <section class="hero py-20">
      <div class="container text-center">
        <h1 class="display-5 fw-bold mb-4">Learn, Grow & Achieve with Saif Academy</h1>
        <p class="lead mb-6">
          Join thousands of students mastering courses online. Flexible learning, expert teachers,
          and premium content.
        </p>
        <a href="student-login.html" class="btn btn-primary btn-lg me-2">Get Started</a>
        <a href="#courses" class="btn btn-outline-light btn-lg">Explore Courses</a>
      </div>
    </section>

    <!-- Featured Courses -->
    <section id="courses" class="py-16">
      <div class="container">
        <h2 class="text-3xl font-semibold text-center mb-10">Featured Courses</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card feature-card shadow-sm">
              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Course 1" />
              <div class="card-body">
                <h5 class="card-title">Mathematics for Beginners</h5>
                <p class="card-text text-muted">
                  Start your journey in mathematics with clear explanations and practical examples.
                </p>
                <a href="student-login.html" class="btn btn-primary btn-sm">Enroll Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card feature-card shadow-sm">
              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Course 2" />
              <div class="card-body">
                <h5 class="card-title">Python Programming</h5>
                <p class="card-text text-muted">
                  Learn Python from scratch and build real-world projects with our expert
                  instructors.
                </p>
                <a href="student-login.html" class="btn btn-primary btn-sm">Enroll Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card feature-card shadow-sm">
              <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Course 3" />
              <div class="card-body">
                <h5 class="card-title">Data Science Essentials</h5>
                <p class="card-text text-muted">
                  Master data analysis, visualization, and machine learning concepts in a structured
                  path.
                </p>
                <a href="student-login.html" class="btn btn-primary btn-sm">Enroll Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-slate-100">
      <div class="container text-center">
        <h2 class="text-3xl font-semibold mb-6">About Saif Academy</h2>
        <p class="text-lg text-slate-700 mb-6">
          Saif Academy is a premium online learning platform offering a wide range of courses for
          students and professionals. Our mission is to provide accessible, high-quality education
          to help you achieve your learning goals.
        </p>
        <a href="student-login.html" class="btn btn-primary me-2">Join Now</a>
        <a href="teacher-login.html" class="btn btn-outline-primary">Become a Teacher</a>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6 mt-16 shadow-sm">
      <div class="container text-center text-muted">
        &copy; 2025 Saif Academy. All rights reserved.
      </div>
    </footer>

    <!-- Bootstrap + Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  </body>
</html>
