<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Siswa') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Ultra Compact Variables */
        :root {
            --primary: #0369a1;
            --primary-dark: #075985;
            --secondary: #06b6d4;
            --success: #059669;
            --warning: #d97706;
            --card-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border: #e2e8f0;
            --shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        /* Override App Layout Background */
        .custom-bg {
            background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: calc(100vh - 64px);
        }

        /* Compact Card */
        .card {
            background: var(--card-bg);
            border-radius: 8px;
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
            border: 1px solid var(--border);
        }

        .card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-1px);
        }

        .student-card {
            position: relative;
            overflow: hidden;
        }

        .student-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.2s;
        }

        .student-card:hover::before {
            opacity: 1;
        }

        /* Ultra Compact Grid */
        #studentGrid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 0.75rem;
        }

        @media (max-width: 640px) {
            #studentGrid {
                grid-template-columns: 1fr;
            }
        }

        @media (min-width: 1280px) {
            #studentGrid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        /* Compact Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .btn-secondary:hover {
            background: #475569;
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.6875rem;
        }

        /* Compact Badge */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.125rem 0.5rem;
            border-radius: 999px;
            font-size: 0.625rem;
            font-weight: 600;
        }

        .badge-kuliah { background: #dbeafe; color: #1e40af; }
        .badge-kerja { background: #d1fae5; color: #065f46; }
        .badge-keduanya { background: #fef3c7; color: #92400e; }

        /* Compact Input */
        .input {
            width: 100%;
            padding: 0.375rem 0.625rem 0.375rem 2rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.75rem;
            transition: all 0.2s;
        }

        .input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        /* Avatar Compact */
        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }

        .avatar-1 { background: linear-gradient(135deg, #0369a1, #0891b2); }
        .avatar-2 { background: linear-gradient(135deg, #7c3aed, #a78bfa); }
        .avatar-3 { background: linear-gradient(135deg, #059669, #10b981); }
        .avatar-4 { background: linear-gradient(135deg, #dc2626, #f87171); }

        /* Compact Typography */
        .text-xs { font-size: 0.625rem; line-height: 1rem; }
        .text-sm { font-size: 0.6875rem; line-height: 1.125rem; }
        .text-base { font-size: 0.8125rem; line-height: 1.25rem; }
        .text-lg { font-size: 0.875rem; line-height: 1.375rem; }

        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }

        /* Utilities */
        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Icon Sizes */
        .icon-xs { width: 0.75rem; height: 0.75rem; }
        .icon-sm { width: 0.875rem; height: 0.875rem; }
        .icon-base { width: 1rem; height: 1rem; }

        /* Spacing */
        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 0.75rem; }
        .p-2 { padding: 0.5rem; }
        .p-3 { padding: 0.75rem; }
        .px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 0.75rem; }
        .mt-2 { margin-top: 0.5rem; }

        /* Flexbox */
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .items-start { align-items: flex-start; }
        .justify-between { justify-content: space-between; }
        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>

    <div class="custom-bg">
        <div class="max-w-6xl mx-auto px-3 py-4">
            
            {{-- Ultra Compact Header --}}
            <div class="flex items-center justify-between mb-3 fade-in">
                <div>
                    <h1 class="text-lg font-bold" style="color: var(--text-primary);">
                        📚 Daftar Siswa
                    </h1>
                    {{-- ✅ DITAMBAHKAN: Dynamic counter dengan ID untuk update real-time --}}
                    <p class="text-xs" style="color: var(--text-secondary); margin-top: 0.125rem;">
                        <span id="visibleCount">{{ $students->total() ?? 0 }}</span> siswa terdaftar
                    </p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.students.export') }}" class="btn btn-secondary">
                        <svg class="icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Export
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <svg class="icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                </div>
            </div>

            {{-- ✅ DITAMBAHKAN: Compact Search & Filter Component --}}
            {{-- ================================================= --}}
            <div class="card p-2 mb-3 fade-in" style="animation-delay: 0.05s;">
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="flex-1 relative">
                        <svg class="icon-sm absolute left-2 top-1/2 transform -translate-y-1/2" style="color: var(--text-secondary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input 
                            type="text" 
                            id="searchInput"
                            class="input" 
                            placeholder="Cari nama atau NISN..."
                        >
                    </div>
                    <select id="filterStatus" class="input" style="padding-left: 0.625rem; width: 140px;">
                        <option value="">Semua</option>
                        <option value="kuliah">🎓 Kuliah</option>
                        <option value="kerja">💼 Kerja</option>
                        <option value="keduanya">Keduanya</option>
                    </select>
                </div>
            </div>
            {{-- ================================================= --}}

            {{-- Ultra Compact Grid --}}
            <div id="studentGrid">
                @forelse($students as $student)
                {{-- ✅ DITAMBAHKAN: Data attributes untuk filtering (data-name, data-nisn, data-status) --}}
                <div class="card student-card p-2 fade-in" 
                     data-name="{{ strtolower($student->name) }}" 
                     data-nisn="{{ $student->nisn }}" 
                     data-status="{{ strtolower($student->latest_record->type ?? '') }}"
                     style="animation-delay: {{ $loop->index * 0.02 }}s">
                    
                    {{-- Header --}}
                    <div class="flex items-start gap-2 mb-2">
                        <div class="avatar avatar-{{ ($loop->index % 4) + 1 }}">
                            {{ substr($student->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-bold truncate" style="color: var(--text-primary);">
                                {{ $student->name }}
                            </h3>
                            <p class="text-xs truncate" style="color: var(--text-secondary);">
                                {{ $student->nisn ?? '-' }} • {{ $student->graduation_year ?? '-' }}
                            </p>
                        </div>
                    </div>

                    {{-- Content --}}
                    @if($student->latest_record)
                        <div class="mb-2" style="min-height: 60px;">
                            @php
                                $badgeClass = 'badge-kuliah';
                                $icon = '🎓';
                                if($student->latest_record->type == 'kerja') {
                                    $badgeClass = 'badge-kerja';
                                    $icon = '💼';
                                } elseif($student->latest_record->type == 'keduanya') {
                                    $badgeClass = 'badge-keduanya';
                                    $icon = '🎓💼';
                                }
                            @endphp
                            <span class="badge {{ $badgeClass }} mb-2" style="display: inline-flex;">
                                {{ $icon }} {{ ucfirst($student->latest_record->type) }}
                            </span>

                            @if($student->latest_record->institution_name)
                            <p class="text-xs font-semibold line-clamp-1 mb-1" style="color: var(--text-primary);">
                                {{ $student->latest_record->institution_name }}
                            </p>
                            @endif

                            @if($student->latest_record->major_or_position)
                            <p class="text-xs line-clamp-1" style="color: var(--text-secondary);">
                                {{ $student->latest_record->major_or_position }}
                            </p>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-3" style="min-height: 60px; display: flex; align-items: center; justify-content: center;">
                            <p class="text-xs" style="color: var(--text-secondary);">Belum ada data</p>
                        </div>
                    @endif

                    {{-- Footer --}}
                    <div class="flex items-center justify-between pt-2" style="border-top: 1px solid var(--border);">
                        <div class="flex items-center gap-2 text-xs" style="color: var(--text-secondary);">
                            @if($student->email)
                            <svg class="icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            @endif
                            <span>{{ $student->records_count }} catatan</span>
                        </div>
                        <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-primary btn-sm">
                            Detail
                        </a>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1/-1;">
                    <div class="card p-8 text-center">
                        <svg style="width: 48px; height: 48px; margin: 0 auto 0.75rem; color: #cbd5e1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <p class="text-sm font-semibold" style="color: var(--text-primary);">Belum Ada Data</p>
                        <p class="text-xs mt-1" style="color: var(--text-secondary);">Data siswa akan muncul di sini</p>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- ✅ DITAMBAHKAN: No Results Message --}}
            {{-- ==================================== --}}
            <div id="noResults" class="card p-8 mt-3 text-center" style="display: none;">
                <svg style="width: 48px; height: 48px; margin: 0 auto 0.75rem; color: #cbd5e1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <p class="text-sm font-semibold mb-2" style="color: var(--text-primary);">Tidak Ada Hasil</p>
                <button onclick="resetFilters()" class="btn btn-primary">Reset</button>
            </div>
            {{-- ==================================== --}}

            {{-- Pagination --}}
            @if($students->hasPages())
            <div class="mt-3">
                {{ $students->links() }}
            </div>
            @endif
        </div>
    </div>

    {{-- ✅ DITAMBAHKAN: JavaScript untuk Search & Filter --}}
    {{-- ============================================== --}}
    @push('scripts')
    <script>
        const searchInput = document.getElementById('searchInput');
        const filterStatus = document.getElementById('filterStatus');
        const studentGrid = document.getElementById('studentGrid');
        const cards = document.querySelectorAll('.student-card');
        const noResults = document.getElementById('noResults');
        const visibleCountEl = document.getElementById('visibleCount'); // ✅ DITAMBAHKAN

        function filterCards() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const statusFilter = filterStatus.value.toLowerCase();
            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.dataset.name || '';
                const nisn = card.dataset.nisn || '';
                const status = card.dataset.status || '';
                
                const matchesSearch = name.includes(searchTerm) || nisn.includes(searchTerm);
                const matchesStatus = !statusFilter || status === statusFilter;

                if (matchesSearch && matchesStatus) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // ✅ DITAMBAHKAN: Update visible count
            if (visibleCountEl) {
                visibleCountEl.textContent = visibleCount;
            }

            if (visibleCount === 0 && cards.length > 0) {
                noResults.style.display = 'block';
                studentGrid.style.display = 'none';
            } else {
                noResults.style.display = 'none';
                studentGrid.style.display = 'grid';
            }
        }

        function resetFilters() {
            searchInput.value = '';
            filterStatus.value = '';
            filterCards();
        }

        searchInput.addEventListener('input', filterCards);
        filterStatus.addEventListener('change', filterCards);
    </script>
    @endpush
    {{-- ============================================== --}}
</x-app-layout>