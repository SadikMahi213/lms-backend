<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Exam Creation — Saif Academy</title>

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

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <style>
      body {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc;
      }

      .form-section {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 2rem;
      }
    </style>
  </head>

  <body>
    <div class="min-h-screen flex">
      <!-- Sidebar -->
      <aside id="sidebar" class="bg-slate-800 text-slate-200 p-4 min-w-[270px] hidden lg:block">
        <div class="mb-6 flex items-center gap-3 px-2">
          <div
            class="rounded-md bg-gradient-to-tr from-indigo-500 to-purple-600 w-10 h-10 flex items-center justify-center"
          >
            <i class="fa-solid fa-chalkboard-teacher text-white"></i>
          </div>
          <div>
            <div class="text-lg font-bold text-white">Saif Academy</div>
            <div class="text-xs text-slate-300">Teacher Panel</div>
          </div>
        </div>

        <nav class="mt-4">
          <a href="dashboard.html" class="sidebar-link d-block py-2 text-slate-400 hover:text-white"
            ><i class="fa-solid fa-gauge me-2"></i> Dashboard</a
          >
          <a
            href="exam-creation.html"
            class="sidebar-link text-white bg-slate-700 d-block py-2 rounded"
            ><i class="fa-solid fa-file-circle-plus me-2"></i> Create Exam</a
          >
          <a
            href="my-courses.html"
            class="sidebar-link d-block py-2 text-slate-400 hover:text-white"
            ><i class="fa-solid fa-book-open me-2"></i> My Courses</a
          >
        </nav>
      </aside>

      <!-- Main -->
      <main class="flex-1 p-4 lg:p-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-semibold">Create New Exam</h3>
          <a href="dashboard.html" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Dashboard
          </a>
        </div>

        <div class="form-section">
          <form id="examForm">
            <div class="mb-3">
              <label class="form-label">Exam Title</label>
              <input
                type="text"
                id="examTitle"
                class="form-control"
                placeholder="e.g. Calculus Midterm Exam"
                required
              />
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Batch / Course</label>
                <select id="examBatch" class="form-select" required>
                  <option value="">Select Batch</option>
                  <option value="Batch A">Batch A</option>
                  <option value="Batch B">Batch B</option>
                  <option value="Batch C">Batch C</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Exam Date</label>
                <input type="date" id="examDate" class="form-control" required />
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Exam Type</label>
              <select id="examType" class="form-select" required>
                <option value="">Select Type</option>
                <option value="MCQ">MCQ</option>
                <option value="Written">Written</option>
              </select>
            </div>

            <!-- Question Section -->
            <div id="questionSection" class="mb-3 hidden">
              <label class="form-label">Questions</label>
              <div id="questionsContainer"></div>
              <button type="button" id="addQuestionBtn" class="btn btn-sm btn-outline-primary mt-2">
                <i class="fa-solid fa-plus me-1"></i> Add Question
              </button>
            </div>

            <!-- File Upload for Written -->
            <div id="pdfSection" class="mb-3 hidden">
              <label class="form-label">Upload Exam PDF (Optional)</label>
              <input type="file" accept=".pdf" class="form-control" id="examPDF" />
            </div>

            <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-paper-plane me-2"></i> Publish Exam
              </button>
            </div>
          </form>
        </div>
      </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const examType = document.getElementById('examType');
      const questionSection = document.getElementById('questionSection');
      const pdfSection = document.getElementById('pdfSection');
      const questionsContainer = document.getElementById('questionsContainer');
      const addQuestionBtn = document.getElementById('addQuestionBtn');

      examType.addEventListener('change', () => {
        const type = examType.value;
        if (type === 'MCQ') {
          questionSection.classList.remove('hidden');
          pdfSection.classList.add('hidden');
        } else if (type === 'Written') {
          questionSection.classList.add('hidden');
          pdfSection.classList.remove('hidden');
        } else {
          questionSection.classList.add('hidden');
          pdfSection.classList.add('hidden');
        }
      });

      addQuestionBtn.addEventListener('click', () => {
        const div = document.createElement('div');
        div.className = 'border rounded p-3 mb-2';
        div.innerHTML = `
          <label class="form-label">Question</label>
          <input type="text" class="form-control mb-2" placeholder="Enter question text" required />
          <div class="row g-2">
            <div class="col"><input type="text" class="form-control" placeholder="Option A" required></div>
            <div class="col"><input type="text" class="form-control" placeholder="Option B" required></div>
            <div class="col"><input type="text" class="form-control" placeholder="Option C" required></div>
            <div class="col"><input type="text" class="form-control" placeholder="Option D" required></div>
          </div>
          <div class="mt-2">
            <label class="form-label">Correct Answer</label>
            <select class="form-select">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
          </div>
        `;
        questionsContainer.appendChild(div);
      });

      document.getElementById('examForm').addEventListener('submit', (e) => {
        e.preventDefault();
        alert('✅ Exam Created Successfully!');
        e.target.reset();
        questionSection.classList.add('hidden');
        pdfSection.classList.add('hidden');
        questionsContainer.innerHTML = '';
      });
    </script>
  </body>
</html>
