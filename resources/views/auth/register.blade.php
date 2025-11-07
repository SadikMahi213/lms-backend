<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Saif Academy</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px 0;
        }
        
        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        
        .register-left {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 40px;
        }
        
        .register-right {
            padding: 60px 40px;
        }
        
        .role-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .role-btn {
            flex: 1;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }
        
        .role-btn:hover {
            border-color: #667eea;
            transform: translateY(-2px);
        }
        
        .role-btn.active {
            border-color: #667eea;
            background: #f0f4ff;
        }
        
        .role-btn input[type="radio"] {
            display: none;
        }
        
        .role-btn i {
            font-size: 24px;
            color: #667eea;
            display: block;
            margin-bottom: 5px;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
        }
        
        .btn-register:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container row g-0">
            <div class="col-md-5 register-left d-none d-md-flex flex-column justify-content-center">
                <h2 class="mb-4"><i class="fas fa-graduation-cap me-2"></i>Saif Academy</h2>
                <p class="lead">Join our learning community today!</p>
                <ul class="list-unstyled mt-4">
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Access quality courses</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Learn at your own pace</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Get certified</li>
                </ul>
            </div>
            
            <div class="col-md-7 register-right">
                <h3 class="mb-4">Create Your Account</h3>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Your Role</label>
                        <div class="role-selector">
                            <label class="role-btn {{ old('role') === 'student' || !old('role') ? 'active' : '' }}">
                                <input type="radio" name="role" value="student" {{ old('role') === 'student' || !old('role') ? 'checked' : '' }} required>
                                <i class="fas fa-user-graduate"></i>
                                <div>Student</div>
                            </label>
                            
                            <label class="role-btn {{ old('role') === 'teacher' ? 'active' : '' }}">
                                <input type="radio" name="role" value="teacher" {{ old('role') === 'teacher' ? 'checked' : '' }} required>
                                <i class="fas fa-chalkboard-teacher"></i>
                                <div>Teacher</div>
                            </label>
                            
                            <label class="role-btn {{ old('role') === 'admin' ? 'active' : '' }}">
                                <input type="radio" name="role" value="admin" {{ old('role') === 'admin' ? 'checked' : '' }} required>
                                <i class="fas fa-user-shield"></i>
                                <div>Admin</div>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small class="text-muted">Minimum 8 characters</small>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-register w-100 mb-3">
                        <i class="fas fa-user-plus me-2"></i>Register
                    </button>
                    
                    <div class="text-center">
                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login here</a></p>
                        <p class="mt-2"><a href="{{ url('/') }}" class="text-decoration-none">Back to Home</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle role button selection
        document.querySelectorAll('.role-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
