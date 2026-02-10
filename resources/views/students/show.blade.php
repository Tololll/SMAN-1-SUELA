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

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .fade-in {
        animation: fadeIn 0.6s ease forwards;
    }

    .slide-in {
        animation: slideIn 0.5s ease forwards;
    }

    .card-modern {
        background: white;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    .card-modern:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        transform: translateY(-4px);
    }

    .info-card {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        padding: 1.25rem;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .info-card::before {
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

    .info-card:hover::before {
        opacity: 1;
    }

    .record-card {
        border: 2px solid var(--gray-100);
        border-radius: 16px;
        padding: 1.5rem;
        background: white;
        transition: all 0.3s ease;
        position: relative;
    }

    .record-card:hover {
        border-color: var(--primary);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
        transform: translateY(-2px);
    }

    .badge-type {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: white;
        border: 2px solid var(--gray-200);
        border-radius: 10px;
        color: var(--gray-700);
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        border-color: var(--primary);
        color: var(--primary);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        transform: translateY(-2px);
    }

    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        background: #fee2e2;
        color: #dc2626;
        border: 2px solid #fecaca;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
        border-color: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
    }

    .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .profile-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 16px 16px 0 0;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .avatar-circle {
        width: 64px;
        height: 64px;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid rgba(255,255,255,0.3);
        font-size: 1.875rem;
        font-weight: 700;
        color: white;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 1rem;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .institution-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 1rem;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        border: 2px solid rgba(255,255,255,0.3);
        font-size: 0.875rem;
        font-weight: 700;
        color: white;
    }

    .section-header {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        border-radius: 16px 16px 0 0;
        padding: 1.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .section-header::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.1;
        background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0);
        background-size: 40px 40px;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: var(--gray-100);
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }
</style>

<div style="background: var(--gray-50); min-height: 100vh; padding: 2rem 0;">
    <div class="max-w-6xl mx-auto px-4">
        
        <!-- Back Button -->
        <div class="mb-6 slide-in">
            <a href="{{ route('admin.students.index') }}" class="btn-back">
                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Daftar Siswa
            </a>
        </div>

        <!-- Student Profile Card -->
        <div class="card-modern fade-in" style="margin-bottom: 1.5rem; animation-delay: 0.1s;">
            <!-- Profile Header -->
            <div class="profile-header">
                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; align-items: start; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
                        <div style="flex: 1; min-width: 300px;">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <div class="avatar-circle">
                                    {{ substr($student->name, 0, 1) }}
                                </div>
                                <div>
                                    <h1 style="font-size: 1.875rem; font-weight: 700; color: white; margin-bottom: 0.25rem;">
                                        {{ $student->name }}
                                    </h1>
                                    <p style="color: rgba(255,255,255,0.8); font-size: 0.875rem; font-weight: 600;">
                                        NISN: {{ $student->nisn }}
                                    </p>
                                </div>
                            </div>
                            
                            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 1.25rem;">
                                <span class="status-badge" style="color: var(--primary);">
                                    <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ ucfirst($student->status ?? 'Belum diisi') }}
                                </span>
                                
                                @if($student->latest_institution)
                                <span class="institution-badge">
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    {{ $student->latest_institution }}
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <a href="{{ route('admin.students.edit', $student) }}" class="btn-edit">
                                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Information Grid -->
            <div style="padding: 2rem;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">
                    <!-- Tahun Lulus -->
                    <div class="info-card" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border: 1px solid #6ee7b7;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div class="icon-box" style="background: linear-gradient(135deg, #10b981, #059669); box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p style="font-size: 0.75rem; font-weight: 700; color: #065f46; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                    Tahun Lulus
                                </p>
                                <p style="font-size: 1.5rem; font-weight: 700; color: #064e3b;">
                                    {{ $student->graduation_year }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="info-card" style="background: linear-gradient(135deg, #ddd6fe 0%, #c4b5fd 100%); border: 1px solid #a78bfa;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div class="icon-box" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed); box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);">
                                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div style="flex: 1; min-width: 0;">
                                <p style="font-size: 0.75rem; font-weight: 700; color: #5b21b6; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                    Email
                                </p>
                                <p style="font-size: 0.9rem; font-weight: 600; color: #4c1d95; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $student->email ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="info-card" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border: 1px solid #fcd34d;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div class="icon-box" style="background: linear-gradient(135deg, #f59e0b, #d97706); box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);">
                                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p style="font-size: 0.75rem; font-weight: 700; color: #92400e; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                    Telepon
                                </p>
                                <p style="font-size: 0.9rem; font-weight: 600; color: #78350f;">
                                    {{ $student->phone ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="info-card" style="background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%); border: 1px solid #f87171;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div class="icon-box" style="background: linear-gradient(135deg, #ef4444, #dc2626); box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div style="flex: 1;">
                                <p style="font-size: 0.75rem; font-weight: 700; color: #991b1b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                    Alamat
                                </p>
                                <p style="font-size: 0.9rem; font-weight: 600; color: #7f1d1d; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $student->address ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Source -->
                <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 2px solid var(--gray-100);">
                    <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: var(--gray-50); border-radius: 12px; border: 1px solid var(--gray-200);">
                        <div class="icon-box" style="background: var(--gray-200); width: 40px; height: 40px;">
                            <svg style="width: 20px; height: 20px; color: var(--gray-600);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                                Sumber Data
                            </p>
                            @if($student->user)
                                <p style="font-size: 0.875rem; font-weight: 700; color: var(--gray-900);">
                                    {{ $student->user->name }} 
                                    <span style="font-weight: 400; color: var(--gray-500);">({{ $student->user->email }})</span>
                                </p>
                            @else
                                <span style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; background: #fef3c7; color: #92400e; border-radius: 8px; font-weight: 700; font-size: 0.875rem;">
                                    <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    Guest Submission
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alumni Records Section -->
        <div class="card-modern fade-in" style="animation-delay: 0.2s;">
            <div class="section-header">
                <div style="position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 2px solid rgba(255,255,255,0.2);">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 style="font-size: 1.5rem; font-weight: 700; color: white; margin-bottom: 0.25rem;">
                                Catatan Alumni
                            </h2>
                            <p style="color: rgba(255,255,255,0.7); font-size: 0.875rem;">
                                Riwayat aktivitas dan pencapaian
                            </p>
                        </div>
                    </div>
                    <div style="padding: 0.5rem 1rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 10px; border: 2px solid rgba(255,255,255,0.2);">
                        <p style="font-size: 0.875rem; font-weight: 700; color: white;">
                            {{ $student->records->count() }} Catatan
                        </p>
                    </div>
                </div>
            </div>

            <div style="padding: 2rem;">
                @if($student->records->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg style="width: 40px; height: 40px; color: var(--gray-400);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">
                            Belum Ada Catatan
                        </h3>
                        <p style="color: var(--gray-500); font-size: 0.875rem; max-width: 400px; margin: 0 auto;">
                            Data aktivitas dan pencapaian alumni akan muncul di sini setelah ditambahkan
                        </p>
                    </div>
                @else
                    <div style="display: grid; gap: 1rem;">
                        @foreach($student->records as $r)
                            <div class="record-card" style="animation: fadeIn 0.5s ease forwards; animation-delay: {{ $loop->index * 0.1 }}s; opacity: 0;">
                                <div style="display: flex; align-items: start; justify-content: space-between; gap: 1.5rem;">
                                    <div style="flex: 1;">
                                        <!-- Type Badge & Institution -->
                                        <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 0.75rem; margin-bottom: 1rem;">
                                            @if($r->type === 'kuliah')
                                                <span class="badge-type" style="background: linear-gradient(135deg, #3b82f6, #6366f1); color: white;">
                                                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                                    </svg>
                                                    Kuliah
                                                </span>
                                            @elseif($r->type === 'kerja')
                                                <span class="badge-type" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
                                                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>
                                                    Bekerja
                                                </span>
                                            @else
                                                <span class="badge-type" style="background: linear-gradient(135deg, #8b5cf6, #a855f7); color: white; text-transform: capitalize;">
                                                    {{ $r->type }}
                                                </span>
                                            @endif
                                            
                                            <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--gray-900);">
                                                {{ $r->institution_name }}
                                            </h3>
                                        </div>

                                        <!-- Major/Position -->
                                        @if($r->major_or_position)
                                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; background: var(--gray-50); border-radius: 8px; margin-bottom: 0.75rem;">
                                            <svg style="width: 16px; height: 16px; color: var(--gray-500);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                            <span style="font-size: 0.875rem; font-weight: 600; color: var(--gray-700);">
                                                {{ $r->major_or_position }}
                                            </span>
                                        </div>
                                        @endif

                                        <!-- Notes -->
                                        @if($r->notes)
                                        <div style="margin-top: 1rem; padding: 1rem; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border-left: 4px solid var(--primary); border-radius: 10px;">
                                            <p style="font-size: 0.875rem; color: #1e3a8a; line-height: 1.6;">
                                                {{ $r->notes }}
                                            </p>
                                        </div>
                                        @endif

                                        <!-- Timestamp -->
                                        <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 1rem;">
                                            <svg style="width: 16px; height: 16px; color: var(--gray-400);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span style="font-size: 0.75rem; color: var(--gray-500); font-weight: 600;">
                                                {{ $r->created_at->format('d M Y, H:i') }} WIB
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.records.destroy', $r) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsectiongit commit -m "Initial commit"