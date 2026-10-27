@extends('layouts.app')

@section('content')
<div x-data="{ activeModal: null }">

    <!-- 1. HERO SECTION & TERMINAL SNIPPET -->
    <header class="mb-24 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-7">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand/10 border border-brand/20 text-brand text-xs font-semibold mb-6">
                <span class="w-2 h-2 rounded-full bg-brand animate-pulse"></span>
                Available for Web & Mobile Projects
            </div>

            <h1 class="text-4xl sm:text-6xl font-bold text-zinc-900 dark:text-white mb-6 tracking-tight leading-tight">
                Hi, Saya <span class="text-brand">{{ $profil['nama'] }}</span>
            </h1>

            <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed mb-8">
                {{ $profil['bio'] }}
            </p>

            <div class="flex flex-wrap gap-4 text-xs font-medium text-zinc-500 dark:text-zinc-400 mb-8">
                <span class="flex items-center gap-1.5">📍 {{ $profil['lokasi'] }}</span>
                <span class="flex items-center gap-1.5">🎓 {{ $profil['kampus'] }}</span>
            </div>

            <div class="flex flex-wrap gap-2">
                @foreach($skills as $skill)
                    <span class="px-3 py-1 bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-lg text-xs font-medium">
                        {{ $skill }}
                    </span>
                @endforeach
            </div>
        </div>

        <!-- Terminal Snippet Interaktif -->
        <div class="lg:col-span-5">
            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl overflow-hidden shadow-2xl font-mono text-xs">
                <div class="bg-zinc-950 px-4 py-3 flex items-center justify-between border-b border-zinc-800">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-red-500/80 inline-block"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-500/80 inline-block"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500/80 inline-block"></span>
                    </div>
                    <span class="text-zinc-500 text-[10px]">danil@dev-machine:~</span>
                </div>
                <div class="p-5 space-y-3 text-zinc-300">
                    <p><span class="text-brand">$</span> cat profile.json</p>
                    <div class="pl-3 border-l border-zinc-800 space-y-1 text-zinc-400">
                        <p>{ <span class="text-amber-400">"role"</span>: <span class="text-emerald-400">"Full-Stack & AI"</span>,</p>
                        <p>&nbsp;&nbsp;<span class="text-amber-400">"focus"</span>: <span class="text-emerald-400">"Laravel, React Native, CNN"</span>,</p>
                        <p>&nbsp;&nbsp;<span class="text-amber-400">"status"</span>: <span class="text-emerald-400">"Ready for Collab"</span> }</p>
                    </div>
                    <p><span class="text-brand">$</span> <span class="animate-pulse">_</span></p>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. FILTER & PROYEK GRID -->
    <section id="projects" class="mb-24" x-data="{ filter: 'Semua' }">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
            <div>
                <h2 class="text-3xl font-bold text-zinc-900 dark:text-white">Selected Projects</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Klik pada proyek untuk membuka Studi Kasus rincinya.</p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-none">
                @php $categories = ['Semua', 'Web Application', 'Mobile & AI', 'UI/UX & Branding', 'API & Integrasi']; @endphp
                @foreach($categories as $cat)
                    <button @click="filter = '{{ $cat }}'"
                            :class="filter === '{{ $cat }}' ? 'bg-brand text-white border-brand' : 'bg-zinc-100 dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 border-zinc-200 dark:border-zinc-800 hover:text-brand'"
                            class="px-4 py-2 rounded-full border text-xs font-medium transition-colors whitespace-nowrap">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($projects as $project)
                <div x-show="filter === 'Semua' || filter === '{{ $project['kategori'] }}'" 
                     x-transition
                     @click="activeModal = '{{ $project['id'] }}'"
                     class="group cursor-pointer bg-zinc-50 dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800/80 p-6 rounded-2xl hover:border-brand/60 transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-brand text-[11px] font-bold tracking-wider uppercase bg-brand/10 px-2.5 py-1 rounded-full">
                                {{ $project['kategori'] }}
                            </span>
                            <span class="text-xs text-zinc-400 group-hover:text-brand transition-colors">Studi Kasus →</span>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-white mb-3 group-hover:text-brand transition-colors">
                            {{ $project['judul'] }}
                        </h3>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm mb-6 line-clamp-2 leading-relaxed">
                            {{ $project['deskripsi'] }}
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-1.5 pt-4 border-t border-zinc-200/60 dark:border-zinc-800/60">
                        @foreach($project['tech'] as $tech)
                            <span class="text-[11px] bg-zinc-200/70 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 px-2.5 py-0.5 rounded">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 3. MODAL STUDI KASUS (CASE STUDY WINDOW) -->
    @foreach($projects as $project)
        <div x-show="activeModal === '{{ $project['id'] }}'" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
             x-transition.opacity>
            <div @click.away="activeModal = null" 
                 class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-2xl max-w-2xl w-full p-6 sm:p-8 relative shadow-2xl overflow-y-auto max-h-[85vh]">
                
                <button @click="activeModal = null" class="absolute top-5 right-5 text-zinc-400 hover:text-zinc-900 dark:hover:text-white text-xl">✕</button>

                <div class="text-brand text-xs font-bold uppercase tracking-wider mb-2">{{ $project['kategori'] }}</div>
                <h3 class="text-2xl font-bold text-zinc-900 dark:text-white mb-6">{{ $project['judul'] }}</h3>

                <div class="space-y-5 text-sm text-zinc-600 dark:text-zinc-300">
                    <div>
                        <h4 class="font-semibold text-zinc-900 dark:text-white mb-1">📌 Latar Belakang Masalah</h4>
                        <p class="leading-relaxed">{{ $project['masalah'] }}</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-zinc-900 dark:text-white mb-1">💡 Solusi Teknis</h4>
                        <p class="leading-relaxed">{{ $project['solusi'] }}</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-zinc-900 dark:text-white mb-1">🚀 Hasil & Dampak</h4>
                        <p class="leading-relaxed text-emerald-600 dark:text-emerald-400 font-medium">{{ $project['dampak'] }}</p>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-zinc-200 dark:border-zinc-800 flex justify-between items-center">
                    <div class="flex flex-wrap gap-2">
                        @foreach($project['tech'] as $tech)
                            <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 px-3 py-1 rounded-full font-medium">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <button @click="activeModal = null" class="px-5 py-2 bg-brand text-white text-xs font-semibold rounded-lg hover:bg-brand/90 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <!-- 4. TIMELINE PENGALAMAN -->
    <section id="experience" class="mb-24">
        <h2 class="text-3xl font-bold text-zinc-900 dark:text-white mb-10">Experience & Activities</h2>
        <div class="space-y-8 border-l border-zinc-200 dark:border-zinc-800 ml-3 md:ml-0 md:pl-0 md:border-none">
            @foreach($experiences as $exp)
                <div class="relative pl-8 md:pl-0 md:grid md:grid-cols-4 md:gap-8 items-baseline">
                    <div class="absolute left-[-5px] top-2 w-2.5 h-2.5 rounded-full bg-brand md:hidden"></div>
                    <div class="text-xs text-zinc-500 font-medium mb-2 md:mb-0 md:text-right uppercase tracking-wider">
                        {{ $exp['tahun'] }}
                    </div>
                    <div class="md:col-span-3 pb-8 md:pb-0 md:border-l md:border-zinc-200 dark:md:border-zinc-800 md:pl-8 relative">
                        <div class="hidden md:block absolute left-[-5px] top-2 w-2.5 h-2.5 rounded-full bg-brand"></div>
                        <h3 class="text-lg font-bold text-zinc-900 dark:text-white">{{ $exp['peran'] }}</h3>
                        <div class="text-brand text-sm font-medium mb-3">{{ $exp['institusi'] }}</div>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed">{{ $exp['deskripsi'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 5. FORMULIR KONTAK & TOAST FEEDBACK -->
    <section id="contact" class="mb-16">
        <div class="bg-zinc-50 dark:bg-zinc-900/60 border border-zinc-200 dark:border-zinc-800 rounded-3xl p-8 sm:p-12 relative overflow-hidden">
            <div class="max-w-xl">
                <h2 class="text-3xl font-bold text-zinc-900 dark:text-white mb-3">Mari Berkolaborasi</h2>
                <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-8 leading-relaxed">Punya gagasan proyek web, aplikasi mobile, atau kebutuhan riset AI? Kirimkan pesan di bawah ini.</p>

                <form @submit.prevent="submitForm()" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-zinc-700 dark:text-zinc-300 mb-1">Nama Lengkap</label>
                            <input type="text" x-model="formData.name" required class="w-full px-4 py-3 rounded-xl bg-zinc-50 dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 text-sm focus:border-brand-500 outline-none transition-colors text-zinc-900 dark:text-zinc-100">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-zinc-700 dark:text-zinc-300 mb-1">Email</label>
                            <input type="email" x-model="formData.email" required class="w-full px-4 py-3 rounded-xl bg-zinc-50 dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 text-sm focus:border-brand-500 outline-none transition-colors text-zinc-900 dark:text-zinc-100">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-zinc-700 dark:text-zinc-300 mb-1">Pesan / Ide Projek</label>
                        <textarea x-model="formData.message" rows="4" required class="w-full px-4 py-3 rounded-xl bg-zinc-50 dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 text-sm focus:border-brand-500 outline-none transition-colors resize-none text-zinc-900 dark:text-zinc-100"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-500 hover:bg-brand-600 text-white font-semibold text-sm shadow-lg shadow-brand-500/20 transition-all">
                        Kirim Pesan ke Email & WhatsApp →
                    </button>
                </form>
            </div>
        </div>
    </section>

</div>
@endsection