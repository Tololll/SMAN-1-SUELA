@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    
    * {
        font-family: 'Inter', sans-serif;
    }

    :root {
        --primary: #3b82f6;
        --primary-dark: #2563eb;
        --secondary: #8b5cf6;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-500: #6b7280;
        --gray-700: #374151;
        --gray-900: #111827;
    }

    .profile-container {
        background: var(--gray-50);
        min-height: 100vh;
        padding: 2rem 0;
    }

    .profile-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        padding: 3rem 2rem;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(59, 130, 246, 0.3);
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    .profile-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 700;
        color: var(--primary);
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        position: relative;
        z-index: 1;
        border: 4px solid rgba(255,255,255,0.3);
    }

    .profile-title {
        text-align: center;
        color: white;
        position: relative;
        z-index: 1;
    }

    .profile-title h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .profile-title p {
        font-size: 1.125rem;
        opacity: 0.95;
    }

    .card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        border: 1px solid var(--gray-200);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 1.75rem 2rem;
        border-bottom: 2px solid var(--gray-200);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .card-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .card-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gray-900);
        margin: 0;
    }

    .card-body {
        padding: 2rem;
    }

    .input-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .input-field {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
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

    textarea.input-field {
        resize: vertical;
        min-height: 100px;
        padding-top: 1rem;
    }

    select.input-field {
        cursor: pointer;
        padding-top: 0.875rem;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .btn {
        padding: 0.875rem 1.75rem;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 700;
        transition: all 0.3s;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        justify-content: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-success {
        background: linear-gradient(135deg, var(--success), #059669);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: var(--gray-50);
        border-radius: 12px;
        border: 2px solid var(--gray-200);
        transition: all 0.3s;
    }

    .timeline-item:hover {
        transform: translateX(8px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-color: var(--primary);
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -2.6rem;
        top: 1.5rem;
        width: 16px;
        height: 16px;
        background: white;
        border: 4px solid var(--primary);
        border-radius: 50%;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
    }

    .timeline-badge {
        display: inline-block;
        padding: 0.375rem 0.875rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .timeline-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 0.5rem;
    }

    .timeline-subtitle {
        color: var(--gray-600);
        font-size: 0.875rem;
        margin-bottom: 0.75rem;
    }

    .timeline-date {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-500);
        font-size: 0.813rem;
        font-weight: 500;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: var(--gray-500);
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
        opacity: 0.5;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.6s ease forwards;
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 500;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border: 2px solid #6ee7b7;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 2px solid #fca5a5;
    }

    @media (max-width: 768px) {
        .grid-2 {
            grid-template-columns: 1fr;
        }
        
        .profile-header {
            padding: 2rem 1rem;
        }
        
        .profile-title h1 {
            font-size: 1.875rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
    }
</style>

<div class="profile-container">
    <div class="max-w-4xl mx-auto px-4">
        
        <!-- Profile Header -->
        <div class="profile-header fade-in">
            <div class="profile-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="profile-title">
                <h1>{{ auth()->user()->name ?? 'User' }}</h1>
                <p>✨ Kelola profil dan riwayat alumni Anda</p>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success fade-in">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error fade-in">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Profile Form Card -->
        <div class="card fade-in" style="animation-delay: 0.1s;">
            <div class="card-header">
                <div class="card-icon">
                    <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h2>Informasi Profil</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('students.profile.store') }}">
                    @csrf
                    
                    <!-- Nama Lengkap -->
                    <div class="input-group">
                        <input type="text" 
                               name="name" 
                               id="name"
                               class="input-field" 
                               placeholder=" " 
                               value="{{ old('name', $student->name ?? auth()->user()->name) }}" 
                               required>
                        <label for="name" class="input-label">Nama Lengkap *</label>
                    </div>

                    <!-- Grid 2 Kolom -->
                    <div class="grid-2">
                        <!-- NISN -->
                        <div class="input-group">
                            <input type="text" 
                                   name="nisn" 
                                   id="nisn"
                                   class="input-field" 
                                   placeholder=" " 
                                   value="{{ old('nisn', $student->nisn ?? '') }}">
                            <label for="nisn" class="input-label">NISN</label>
                        </div>

                        <!-- Tahun Lulus -->
                        <div class="input-group">
                            <input type="number" 
                                   name="graduation_year" 
                                   id="graduation_year"
                                   class="input-field" 
                                   placeholder=" " 
                                   value="{{ old('graduation_year', $student->graduation_year ?? '') }}"
                                   min="1900"
                                   max="{{ date('Y') + 10 }}">
                            <label for="graduation_year" class="input-label">Tahun Lulus</label>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <input type="email" 
                               name="email" 
                               id="email"
                               class="input-field" 
                               placeholder=" " 
                               value="{{ old('email', $student->email ?? auth()->user()->email) }}">
                        <label for="email" class="input-label">Email</label>
                    </div>

                    <!-- Telepon -->
                    <div class="input-group">
                        <input type="tel" 
                               name="phone" 
                               id="phone"
                               class="input-field" 
                               placeholder=" " 
                               value="{{ old('phone', $student->phone ?? '') }}">
                        <label for="phone" class="input-label">Nomor Telepon</label>
                    </div>

                    <!-- Alamat -->
                    <div class="input-group">
                        <textarea name="address" 
                                  id="address"
                                  class="input-field" 
                                  placeholder=" " 
                                  rows="3">{{ old('address', $student->address ?? '') }}</textarea>
                        <label for="address" class="input-label">Alamat Lengkap</label>
                    </div>

                    <!-- Submit Button -->
                    <div style="padding-top: 1rem; border-top: 2px solid var(--gray-100);">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Alumni Record Card -->
        <div class="card fade-in" style="animation-delay: 0.2s;">
            <div class="card-header">
                <div class="card-icon">
                    <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <h2>Tambah Catatan Alumni</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('student.records.store') }}">
                    @csrf
                    
                    <!-- Tipe -->
                    <div class="input-group">
                        <select name="type" 
                                id="type"
                                class="input-field"
                                required>
                            <option value="">Pilih Status...</option>
                            <option value="kuliah">🎓 Melanjutkan Kuliah</option>
                            <option value="kerja">💼 Bekerja</option>
                            <option value="keduanya">🎓💼 Keduanya</option>
                        </select>
                        <label for="type" class="input-label" style="top: -10px; font-size: 0.75rem; background: white; padding: 0 0.5rem;">Tipe Aktivitas *</label>
                    </div>

                    <!-- Grid 2 Kolom -->
                    <div class="grid-2">
                        <!-- Nama Institusi -->
                        <div class="input-group">
                            <input type="text" 
                                   name="institution_name" 
                                   id="institution_name"
                                   class="input-field" 
                                   placeholder=" " 
                                   required>
                            <label for="institution_name" class="input-label">Nama Institusi/Perusahaan *</label>
                        </div>

                        <!-- Jurusan/Jabatan -->
                        <div class="input-group">
                            <input type="text" 
                                   name="major_or_position" 
                                   id="major_or_position"
                                   class="input-field" 
                                   placeholder=" ">
                            <label for="major_or_position" class="input-label">Jurusan/Jabatan</label>
                        </div>
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="input-group">
                        <input type="date" 
                               name="start_date" 
                               id="start_date"
                               class="input-field" 
                               placeholder=" ">
                        <label for="start_date" class="input-label" style="top: -10px; font-size: 0.75rem; background: white; padding: 0 0.5rem;">Tanggal Mulai</label>
                    </div>

                    <!-- Catatan -->
                    <div class="input-group">
                        <textarea name="notes" 
                                  id="notes"
                                  class="input-field" 
                                  placeholder=" " 
                                  rows="3"></textarea>
                        <label for="notes" class="input-label">Catatan Tambahan</label>
                    </div>

                    <!-- Submit Button -->
                    <div style="padding-top: 1rem; border-top: 2px solid var(--gray-100);">
                        <button type="submit" class="btn btn-success" style="width: 100%;">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambahkan Catatan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Timeline History -->
        @if($student && $student->records->count() > 0)
        <div class="card fade-in" style="animation-delay: 0.3s;">
            <div class="card-header">
                <div class="card-icon">
                    <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2>Riwayat Alumni ({{ $student->records->count() }})</h2>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @foreach($student->records->sortByDesc('start_date') as $record)
                    <div class="timeline-item">
                        <div class="timeline-badge">
                            @if($record->type == 'kuliah')
                                🎓 Kuliah
                            @elseif($record->type == 'kerja')
                                💼 Bekerja
                            @else
                                🎓💼 Keduanya
                            @endif
                        </div>
                        <div class="timeline-title">{{ $record->institution_name }}</div>
                        @if($record->major_or_position)
                            <div class="timeline-subtitle">{{ $record->major_or_position }}</div>
                        @endif
                        @if($record->start_date)
                            <div class="timeline-date">
                                <svg style="width: 14px; height: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($record->start_date)->format('d M Y') }}
                            </div>
                        @endif
                        @if($record->notes)
                            <div style="margin-top: 0.75rem; padding-top: 0.75rem; border-top: 1px solid var(--gray-200); color: var(--gray-600); font-size: 0.875rem; line-height: 1.5;">
                                {{ $record->notes }}
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="card fade-in" style="animation-delay: 0.3s;">
            <div class="card-body">
                <div class="empty-state">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">
                        Belum Ada Riwayat
                    </h3>
                    <p style="font-size: 0.875rem;">
                        Tambahkan catatan alumni pertama Anda menggunakan form di atas
                    </p>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection