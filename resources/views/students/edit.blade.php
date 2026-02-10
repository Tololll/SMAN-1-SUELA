
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
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-500: #6b7280;
        --gray-700: #374151;
        --gray-900: #111827;
    }

    .form-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
        border-radius: 50%;
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

    .input-error {
        border-color: var(--danger) !important;
    }

    .error-message {
        color: var(--danger);
        font-size: 0.75rem;
        margin-top: 0.375rem;
        font-weight: 500;
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

    .btn-secondary {
        background: var(--gray-100);
        color: var(--gray-700);
        border: 2px solid var(--gray-200);
    }

    .btn-secondary:hover {
        background: var(--gray-200);
        border-color: var(--gray-300);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
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
        transition: all 0.3s;
        text-decoration: none;
    }

    .btn-back:hover {
        border-color: var(--primary);
        color: var(--primary);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        transform: translateY(-2px);
    }

    textarea.input-field {
        resize: vertical;
        min-height: 100px;
        padding-top: 1rem;
    }

    select.input-field {
        cursor: pointer;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.6s ease forwards;
    }

    .danger-zone {
        border: 2px solid #fee2e2;
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
        border-radius: 12px;
        padding: 1.5rem;
    }
</style>

<div style="background: var(--gray-50); min-height: 100vh; padding: 2rem 0;">
    <div class="max-w-3xl mx-auto px-4">
        
        <!-- Back Button -->
        <div class="mb-6 fade-in">
            <a href="{{ route('admin.students.show', $student) }}" class="btn-back">
                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="form-card fade-in" style="animation-delay: 0.1s;">
            <!-- Header -->
            <div class="form-header">
                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                        <div style="width: 48px; height: 48px; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 2px solid rgba(255,255,255,0.3);">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 style="font-size: 1.875rem; font-weight: 700; color: white; margin-bottom: 0.25rem;">
                                Edit Data Siswa
                            </h1>
                            <p style="color: rgba(255,255,255,0.8); font-size: 0.875rem;">
                                Perbarui informasi siswa {{ $student->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.students.update', $student) }}" method="POST" style="padding: 2rem;">
                @csrf
                @method('PUT')

                <!-- Nama Lengkap -->
                <div class="input-group">
                    <input type="text" 
                           name="name" 
                           id="name"
                           class="input-field @error('name') input-error @enderror" 
                           placeholder=" " 
                           value="{{ old('name', $student->name) }}" 
                           required>
                    <label for="name" class="input-label">Nama Lengkap *</label>
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Grid 2 Kolom -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <!-- NISN -->
                    <div class="input-group">
                        <input type="text" 
                               name="nisn" 
                               id="nisn"
                               class="input-field @error('nisn') input-error @enderror" 
                               placeholder=" " 
                               value="{{ old('nisn', $student->nisn) }}">
                        <label for="nisn" class="input-label">NISN</label>
                        @error('nisn')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tahun Lulus -->
                    <div class="input-group">
                        <input type="number" 
                               name="graduation_year" 
                               id="graduation_year"
                               class="input-field @error('graduation_year') input-error @enderror" 
                               placeholder=" " 
                               value="{{ old('graduation_year', $student->graduation_year) }}"
                               min="1900"
                               max="{{ date('Y') + 10 }}">
                        <label for="graduation_year" class="input-label">Tahun Lulus</label>
                        @error('graduation_year')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group">
                    <input type="email" 
                           name="email" 
                           id="email"
                           class="input-field @error('email') input-error @enderror" 
                           placeholder=" " 
                           value="{{ old('email', $student->email) }}">
                    <label for="email" class="input-label">Email</label>
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telepon -->
                <div class="input-group">
                    <input type="tel" 
                           name="phone" 
                           id="phone"
                           class="input-field @error('phone') input-error @enderror" 
                           placeholder=" " 
                           value="{{ old('phone', $student->phone) }}">
                    <label for="phone" class="input-label">Nomor Telepon</label>
                    @error('phone')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="input-group">
                    <select name="status" 
                            id="status"
                            class="input-field @error('status') input-error @enderror"
                            style="padding-top: 0.875rem;">
                        <option value="">Pilih Status...</option>
                        <option value="kuliah" {{ old('status', $student->status) == 'kuliah' ? 'selected' : '' }}>🎓 Kuliah</option>
                        <option value="kerja" {{ old('status', $student->status) == 'kerja' ? 'selected' : '' }}>💼 Bekerja</option>
                        <option value="keduanya" {{ old('status', $student->status) == 'keduanya' ? 'selected' : '' }}>🎓💼 Keduanya</option>
                    </select>
                    <label for="status" class="input-label" style="top: -10px; font-size: 0.75rem; background: white; padding: 0 0.5rem;">Status</label>
                    @error('status')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="input-group">
                    <textarea name="address" 
                              id="address"
                              class="input-field @error('address') input-error @enderror" 
                              placeholder=" " 
                              rows="3">{{ old('address', $student->address) }}</textarea>
                    <label for="address" class="input-label">Alamat</label>
                    @error('address')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div style="display: flex; gap: 1rem; margin-top: 2rem; padding-top: 2rem; border-top: 2px solid var(--gray-100);">
                    <button type="submit" class="btn btn-primary">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                    
                    <a href="{{ route('admin.students.show', $student) }}" class="btn btn-secondary">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>

        <!-- Delete Section - Danger Zone -->
        <div class="form-card fade-in" style="margin-top: 1.5rem; animation-delay: 0.2s;">
            <div style="padding: 2rem;">
                <div class="danger-zone">
                    <div style="display: flex; align-items: start; justify-content: space-between; gap: 2rem; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px;">
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                                <div style="width: 40px; height: 40px; background: #dc2626; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <svg style="width: 20px; height: 20px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <h3 style="font-size: 1.125rem; font-weight: 700; color: #991b1b;">
                                    Zona Berbahaya
                                </h3>
                            </div>
                            <p style="font-size: 0.875rem; color: #7f1d1d; line-height: 1.6;">
                                Menghapus siswa <strong>{{ $student->name }}</strong> akan menghapus <strong>SEMUA data terkait</strong> termasuk catatan alumni. <span style="font-weight: 700;">Tindakan ini TIDAK dapat dibatalkan!</span>
                            </p>
                        </div>
                        
                        <div style="flex-shrink: 0;">
                            <form action="{{ route('admin.students.destroy', $student) }}"
                                  method="POST" 
                                  onsubmit="return confirm('⚠️ PERINGATAN KERAS!\n\n🚨 Anda akan menghapus siswa: {{ $student->name }}\n\n💥 SEMUA catatan alumni ({{ $student->records->count() }} catatan) akan TERHAPUS PERMANEN!\n\n❌ Tindakan ini TIDAK DAPAT DIBATALKAN!\n\nKetik OK jika Anda yakin ingin melanjutkan.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus Siswa Permanen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection