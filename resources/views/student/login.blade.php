<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login / Register — Saif Academy</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    body {
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
      background: #f1f5f9; /* slate-100 */
    }

    .login-card {
      max-width: 400px;
      margin: 6rem auto;
      background: #fff;
      border-radius: 0.75rem;
      padding: 2rem;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: #3b82f6; /* indigo-500 */
      text-align: center;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="brand">Saif Academy</div>
    <p class="text-center text-muted mb-4">Login / Register Panel</p>

    <!-- Single form for both student & teacher -->
    <form action="#" method="POST">
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required />
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="********" required />
      </div>

      <!-- Role Selection -->
      <div class="mb-3">
        <label for="role" class="form-label">Login As</label>
        <select name="role" id="role" class="form-control" required>
          <option value="student">Student</option>
          <option value="teacher">Teacher</option>
        </select>
      </div>

      <!-- Forgot Password -->
      <div class="mb-3 text-end">
        <a href="#" class="text-indigo-500 text-sm hover:underline">Forgot password?</a>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary w-100">
        <i class="fa-solid fa-right-to-bracket me-2"></i> Login / Register
      </button>
    </form>

    <hr class="my-4" />
    <p class="text-center text-muted text-sm">
      Don't have an account yet?
      <a href="#" class="text-indigo-500 hover:underline">Register Here</a>
    </p>
  </div>

  <!-- Bootstrap + Font Awesome -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
