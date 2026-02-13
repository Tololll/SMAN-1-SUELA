<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #8b5cf6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-700: #374151;
            --gray-900: #111827;
        }

        body {
            background: var(--gray-50);
        }

        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 12px;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 1px solid var(--gray-200);
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        .stat-card {
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            position: relative;
        }

        .form-step {
            display: none;
        }

        .form-step.step-active {
            display: block;
        }

        .progress-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .progress-container::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--gray-200);
            z-index: 0;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.4s ease;
            z-index: 1;
        }

        .progress-step {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .progress-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 3px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            color: var(--gray-500);
            transition: all 0.3s;
        }

        .progress-step.step-active .progress-circle {
            border-color: var(--primary);
            background: var(--primary);
            color: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .progress-step.step-completed .progress-circle {
            border-color: var(--success);
            background: var(--success);
            color: white;
        }

        .progress-label {
            margin-top: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gray-500);
        }

        .progress-step.step-active .progress-label {
            color: var(--primary);
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.3s;
            background: white;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .input-field:focus + .input-label,
        .input-field:not(:placeholder-shown) + .input-label {
            top: -10px;
            left: 12px;
            font-size: 0.75rem;
            background: white;
            padding: 0 0.5rem;
            color: var(--primary);
        }

        .input-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            font-size: 0.875rem;
            color: var(--gray-500);
            pointer-events: none;
            transition: all 0.3s;
            font-weight: 500;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: flex;
            align-items: start;
            gap: 0.75rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-left: 4px solid var(--success);
            color: #065f46;
        }

        .alert-error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-left: 4px solid var(--danger);
            color: #991b1b;
        }

        .chart-container {
            position: relative;
            height: 200px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
    </style>

    <div style="background: var(--gray-50); min-height: calc(100vh - 64px);">
        <div class="max-w-6xl mx-auto px-4 py-6">
            
            {{-- Compact Hero --}}
            <div class="hero fade-in" style="margin-bottom: 1.5rem;">
                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                        <div style="flex: 1; min-width: 250px;">
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                                <span class="badge" style="background: rgba(255,255,255,0.2); color: white;">SMAN1SUELA</span>
                                <span style="color: rgba(255,255,255,0.8); font-size: 0.75rem;">{{ now()->format('d M Y') }}</span>
                            </div>
                            <h1 style="font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 0.25rem;">
                                Dashboard Pendataan Alumni SMANUELA 🎓
                            </h1>
                            <p style="font-size: 0.875rem; color: rgba(255,255,255,0.9);">
                                Sistem pendataan perjalanan karir alumni
                            </p>
                        </div>
                        <div style="display: flex; gap: 0.5rem;">
                            @can('manage-students')
                            <a href="{{ route('admin.students.index') }}" class="btn-secondary btn" style="font-size: 0.8125rem; padding: 0.5rem 1rem;">
                                📊 Siswa
                            </a>
                            @endcan
                            @auth
                            <a href="{{ route('students.profile') }}" class="btn-secondary btn" style="font-size: 0.8125rem; padding: 0.5rem 1rem;">
                                ✏️ Profil
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            {{-- Compact Stats --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
                <div class="card stat-card fade-in" style="animation-delay: 0.1s;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #fef3c7, #fde68a);">
                            <svg style="width: 20px; height: 20px; color: #d97706;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div style="text-align: right;">
                            <p style="font-size: 0.75rem; color: var(--gray-500); font-weight: 500;">Total Siswa</p>
                            <p style="font-size: 1.75rem; font-weight: 700; color: var(--gray-900); line-height: 1;">
                                {{ $totalStudents ?? 0 }}
                            </p>
                        </div>
                    </div>
                    <p style="font-size: 0.75rem; color: var(--gray-500); padding-top: 0.75rem; border-top: 1px solid var(--gray-100);">
                        Siswa terdaftar
                    </p>
                </div>

                <div class="card stat-card fade-in" style="animation-delay: 0.2s;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                            <svg style="width: 20px; height: 20px; color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            </svg>
                        </div>
                        <div style="text-align: right;">
                            <p style="font-size: 0.75rem; color: var(--gray-500); font-weight: 500;">Kuliah</p>
                            <p style="font-size: 1.75rem; font-weight: 700; color: var(--gray-900); line-height: 1;">
                                {{ $studentsKuliah ?? 0 }}
                            </p>
                        </div>
                    </div>
                    <p style="font-size: 0.75rem; color: var(--gray-500); padding-top: 0.75rem; border-top: 1px solid var(--gray-100);">
                        Melanjutkan pendidikan
                    </p>
                </div>

                <div class="card stat-card fade-in" style="animation-delay: 0.3s;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #ddd6fe, #c4b5fd);">
                            <svg style="width: 20px; height: 20px; color: #7c3aed;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div style="text-align: right;">
                            <p style="font-size: 0.75rem; color: var(--gray-500); font-weight: 500;">Bekerja</p>
                            <p style="font-size: 1.75rem; font-weight: 700; color: var(--gray-900); line-height: 1;">
                                {{ $studentsKerja ?? 0 }}
                            </p>
                        </div>
                    </div>
                    <p style="font-size: 0.75rem; color: var(--gray-500); padding-top: 0.75rem; border-top: 1px solid var(--gray-100);">
                        Memasuki dunia kerja
                    </p>
                </div>
            </div>

            {{-- Modern Multi-Step Form --}}
            <div id="guest-form" class="card fade-in" style="padding: 1.5rem; margin-bottom: 1.5rem; animation-delay: 0.4s;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--gray-900);">Form Pendaftaran Alumni</h3>
                        <p style="font-size: 0.875rem; color: var(--gray-500);">Lengkapi data Anda tanpa perlu login</p>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    <svg style="width: 20px; height: 20px; flex-shrink: 0;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span style="font-size: 0.875rem; font-weight: 600;">{{ session('success') }}</span>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-error">
                    <svg style="width: 20px; height: 20px; flex-shrink: 0;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <ul style="font-size: 0.875rem;">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form id="multiStepForm" action="{{ route('guest.submit') }}" method="POST" class="form-container">
                    @csrf
                    
                    {{-- Progress Indicator --}}
                    <div class="progress-container">
                        <div class="progress-line" id="progressLine" style="width: 0%;"></div>
                        <div class="progress-step step-active">
                            <div class="progress-circle">1</div>
                            <span class="progress-label">Data Pribadi</span>
                        </div>
                        <div class="progress-step">
                            <div class="progress-circle">2</div>
                            <span class="progress-label">Kontak</span>
                        </div>
                        <div class="progress-step">
                            <div class="progress-circle">3</div>
                            <span class="progress-label">Status</span>
                        </div>
                    </div>

                    {{-- Step 1: Data Pribadi --}}
                    <div class="form-step step-active" id="step1">
                        <div class="input-group">
                            <input type="text" name="name" class="input-field" placeholder=" " value="{{ old('name') }}" required>
                            <label class="input-label">Nama Lengkap *</label>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="input-group">
                                <input type="text" name="nisn" class="input-field" placeholder=" " value="{{ old('nisn') }}">
                                <label class="input-label">NISN</label>
                            </div>
                            <div class="input-group">
                                <input type="number" name="graduation_year" class="input-field" placeholder=" " value="{{ old('graduation_year') }}">
                                <label class="input-label">Tahun Lulus</label>
                            </div>
                        </div>
                    </div>

                    {{-- Step 2: Kontak --}}
                    <div class="form-step" id="step2">
                        <div class="input-group">
                            <input type="email" name="email" class="input-field" placeholder=" " value="{{ old('email') }}">
                            <label class="input-label">Email</label>
                        </div>
                        <div class="input-group">
                            <input type="tel" name="phone" class="input-field" placeholder=" " value="{{ old('phone') }}">
                            <label class="input-label">Nomor Telepon</label>
                        </div>
                        <div class="input-group">
                            <textarea name="address" class="input-field" placeholder=" " rows="3" style="resize: vertical;">{{ old('address') }}</textarea>
                            <label class="input-label">Alamat</label>
                        </div>
                    </div>

                    {{-- Step 3: Status & Aktivitas --}}
                    <div class="form-step" id="step3">
                        <div class="input-group">
                            <select name="type" class="input-field" required style="padding-top: 0.75rem;">
                                <option value="" disabled {{ old('type') ? '' : 'selected' }}>Pilih status...</option>
                                <option value="kuliah" {{ old('type') == 'kuliah' ? 'selected' : '' }}>🎓 Melanjutkan Kuliah</option>
                                <option value="kerja" {{ old('type') == 'kerja' ? 'selected' : '' }}>💼 Bekerja</option>
                                <option value="keduanya" {{ old('type') == 'keduanya' ? 'selected' : '' }}>🎓💼 Keduanya</option>
                            </select>
                            <label class="input-label" style="top: -10px; font-size: 0.75rem; background: white; padding: 0 0.5rem;">Status Saat Ini *</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="institution_name" class="input-field" placeholder=" " value="{{ old('institution_name') }}">
                            <label class="input-label">Nama Universitas / Perusahaan</label>
                        </div>
                        <div class="input-group">
                            <input type="text" name="major_or_position" class="input-field" placeholder=" " value="{{ old('major_or_position') }}">
                            <label class="input-label">Jurusan / Posisi Pekerjaan</label>
                        </div>
                        <div class="input-group">
                            <textarea name="notes" class="input-field" placeholder=" " rows="3" style="resize: vertical;">{{ old('notes') }}</textarea>
                            <label class="input-label">Catatan Tambahan</label>
                        </div>
                    </div>

                    {{-- Navigation Buttons --}}
                    <div style="display: flex; justify-content: space-between; margin-top: 2rem; gap: 1rem;">
                        <button type="button" id="prevBtn" class="btn btn-secondary" style="display: none;">
                            ← Kembali
                        </button>
                        <div style="flex: 1;"></div>
                        <button type="button" id="nextBtn" class="btn btn-primary">
                            Lanjut →
                        </button>
                        <button type="submit" id="submitBtn" class="btn btn-primary" style="display: none;">
                            Kirim Data ✓
                        </button>
                    </div>
                </form>

                <script>
                    // Inline JavaScript untuk memastikan bekerja
                    (function() {
                        let currentStep = 1;
                        const totalSteps = 3;
                        
                        const step1 = document.getElementById('step1');
                        const step2 = document.getElementById('step2');
                        const step3 = document.getElementById('step3');
                        const steps = [step1, step2, step3];
                        
                        const progressSteps = document.querySelectorAll('.progress-step');
                        const progressLine = document.getElementById('progressLine');
                        const prevBtn = document.getElementById('prevBtn');
                        const nextBtn = document.getElementById('nextBtn');
                        const submitBtn = document.getElementById('submitBtn');

                        function updateForm() {
                            // Hide all steps
                            steps.forEach(s => {
                                s.classList.remove('step-active');
                            });
                            
                            // Show current step
                            steps[currentStep - 1].classList.add('step-active');
                            
                            // Update progress bar
                            const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
                            progressLine.style.width = progress + '%';
                            
                            // Update progress circles
                            progressSteps.forEach((step, index) => {
                                step.classList.remove('step-active', 'step-completed');
                                if (index + 1 < currentStep) {
                                    step.classList.add('step-completed');
                                } else if (index + 1 === currentStep) {
                                    step.classList.add('step-active');
                                }
                            });
                            
                            // Update button visibility
                            prevBtn.style.display = currentStep === 1 ? 'none' : 'inline-flex';
                            nextBtn.style.display = currentStep === totalSteps ? 'none' : 'inline-flex';
                            submitBtn.style.display = currentStep === totalSteps ? 'inline-flex' : 'none';
                            
                            console.log('Current step:', currentStep);
                        }

                        nextBtn.onclick = function() {
                            console.log('Next button clicked!');
                            if (currentStep < totalSteps) {
                                currentStep++;
                                updateForm();
                            }
                        };

                        prevBtn.onclick = function() {
                            console.log('Prev button clicked!');
                            if (currentStep > 1) {
                                currentStep--;
                                updateForm();
                            }
                        };

                        // Initialize
                        updateForm();
                        console.log('Multi-step form initialized!');
                    })();
                </script>
            </div>

            {{-- Chart Section --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="card" style="padding: 1.5rem;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">Distribusi Status</h3>
                    <div class="chart-container">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <div class="card" style="padding: 1.5rem;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">Statistik</h3>
                    <div style="space-y: 1rem;">
                        @if(isset($totalStudents) && $totalStudents > 0)
                            @php
                                $pKuliah = round((($studentsKuliah ?? 0) / $totalStudents) * 100, 1);
                                $pKerja = round((($studentsKerja ?? 0) / $totalStudents) * 100, 1);
                            @endphp
                            <div style="margin-bottom: 1rem;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="font-size: 0.875rem; color: var(--gray-700); font-weight: 600;">Kuliah</span>
                                    <span style="font-size: 0.875rem; color: var(--primary); font-weight: 700;">{{ $pKuliah }}%</span>
                                </div>
                                <div style="height: 8px; background: var(--gray-200); border-radius: 999px; overflow: hidden;">
                                    <div style="height: 100%; background: linear-gradient(90deg, var(--primary), var(--secondary)); border-radius: 999px; width: {{ $pKuliah }}%; transition: width 1s ease;"></div>
                                </div>
                            </div>
                            <div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                    <span style="font-size: 0.875rem; color: var(--gray-700); font-weight: 600;">Bekerja</span>
                                    <span style="font-size: 0.875rem; color: var(--secondary); font-weight: 700;">{{ $pKerja }}%</span>
                                </div>
                                <div style="height: 8px; background: var(--gray-200); border-radius: 999px; overflow: hidden;">
                                    <div style="height: 100%; background: linear-gradient(90deg, var(--secondary), var(--primary)); border-radius: 999px; width: {{ $pKerja }}%; transition: width 1s ease;"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart
        const ctx = document.getElementById('statusChart');
        if (ctx) {
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Kuliah', 'Bekerja', 'Keduanya'],
                    datasets: [{
                        data: @json([$studentsKuliah ?? 0, $studentsKerja ?? 0, $studentsKeduanya ?? 0]),
                        backgroundColor: ['#3b82f6', '#8b5cf6', '#f59e0b'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: { size: 12, weight: '600' }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        }
    </script>
    @endpush
</x-app-layout>