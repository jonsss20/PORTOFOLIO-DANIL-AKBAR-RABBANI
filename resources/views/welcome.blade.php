<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Danil Akbar Rabbani | Full-Stack Web & Mobile Developer</title>
    
    <!-- Google Fonts: PT Sans (Headings) & DM Sans (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            500: '#ff6b2b',
                            600: '#ea580c',
                            700: '#c2410c',
                        }
                    },
                    fontFamily: {
                        heading: ['PT Sans', 'sans-serif'],
                        body: ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: rgba(15, 23, 42, 0.6); }
        ::-webkit-scrollbar-thumb { background: #ff6b2b; border-radius: 4px; }
        .bg-grid-pattern {
            background-size: 30px 30px;
            background-image: radial-gradient(circle, rgba(255, 107, 43, 0.12) 1px, transparent 1px);
        }
        .ambient-glow { box-shadow: 0 0 50px -10px rgba(255, 107, 43, 0.15); }
    </style>
</head>

<body x-data="portfolioApp()" 
      x-init="initTheme()" 
      :class="{ 'dark bg-zinc-950 text-zinc-100': darkMode, 'bg-zinc-50 text-zinc-900': !darkMode }" 
      class="font-body transition-colors duration-300 min-h-screen selection:bg-brand-500 selection:text-white flex flex-col justify-between">

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 backdrop-blur-md bg-zinc-950/80 dark:bg-zinc-950/80 border-b border-zinc-200/20 dark:border-zinc-800/80 transition-colors">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="#" class="group flex items-center gap-2">
                <div class="w-9 h-9 rounded-xl bg-brand-500/10 border border-brand-500/30 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <span class="font-heading font-bold text-brand-500 text-xl">D</span>
                </div>
                <span class="font-heading font-bold text-xl tracking-tight text-zinc-900 dark:text-zinc-100">
                    danil<span class="text-brand-500">.dev</span>
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="#tentang" class="text-zinc-600 dark:text-zinc-400 hover:text-brand-500 transition-colors">Tentang</a>
                <a href="#projek" class="text-zinc-600 dark:text-zinc-400 hover:text-brand-500 transition-colors">Projek</a>
                <a href="#pengalaman" class="text-zinc-600 dark:text-zinc-400 hover:text-brand-500 transition-colors">Pengalaman</a>
                <a href="#kontak" class="text-zinc-600 dark:text-zinc-400 hover:text-brand-500 transition-colors">Kontak</a>
            </nav>

            <div class="flex items-center gap-3">
                <button @click="toggleTheme()" type="button" class="p-2.5 rounded-xl border border-zinc-200 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300 hover:border-brand-500/50 transition-colors">
                    <i x-show="!darkMode" class="fa-solid fa-moon text-base"></i>
                    <i x-show="darkMode" class="fa-solid fa-sun text-base text-amber-400"></i>
                </button>
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="md:hidden p-2.5 rounded-xl border border-zinc-200 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-900 text-zinc-700 dark:text-zinc-300">
                    <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'"></i>
                </button>
                <a href="#kontak" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white bg-brand-500 hover:bg-brand-600 shadow-lg shadow-brand-500/25 transition-all">
                    <i class="fa-solid fa-paper-plane text-xs"></i> Kontak Saya
                </a>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-b border-zinc-200 dark:border-zinc-800 bg-zinc-900/95 px-4 pt-2 pb-6 space-y-3">
            <a href="#tentang" @click="mobileMenuOpen = false" class="block py-2 text-zinc-300 hover:text-brand-500">Tentang</a>
            <a href="#projek" @click="mobileMenuOpen = false" class="block py-2 text-zinc-300 hover:text-brand-500">Projek</a>
            <a href="#pengalaman" @click="mobileMenuOpen = false" class="block py-2 text-zinc-300 hover:text-brand-500">Pengalaman</a>
            <a href="#kontak" @click="mobileMenuOpen = false" class="block py-2 text-zinc-300 hover:text-brand-500">Kontak</a>
        </div>
    </header>

    <main class="flex-grow">
        <!-- Hero Section -->
        <section id="tentang" class="relative py-16 md:py-24 bg-grid-pattern overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 text-xs font-semibold">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            Available for Web & Mobile Projects
                        </div>

                        <div class="space-y-2">
                            <h1 class="font-heading font-bold text-4xl sm:text-5xl lg:text-6xl text-zinc-900 dark:text-zinc-50 tracking-tight leading-tight">
                                Danil Akbar Rabbani
                            </h1>
                            <p class="text-lg sm:text-xl font-medium text-brand-500">
                                Full-Stack Web & Mobile Developer | Machine Learning Enthusiast
                            </p>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 text-xs sm:text-sm text-zinc-600 dark:text-zinc-400">
                            <span class="inline-flex items-center gap-1.5 bg-zinc-200/60 dark:bg-zinc-800/60 px-3 py-1 rounded-lg border border-zinc-300/50 dark:border-zinc-700/50">
                                <i class="fa-solid fa-graduation-cap text-brand-500"></i> STMIK Mardira Indonesia (Teknik Informatika)
                            </span>
                            <span class="inline-flex items-center gap-1.5 bg-zinc-200/60 dark:bg-zinc-800/60 px-3 py-1 rounded-lg border border-zinc-300/50 dark:border-zinc-700/50">
                                <i class="fa-solid fa-location-dot text-brand-500"></i> Ciamis, Jawa Barat, Indonesia
                            </span>
                        </div>

                        <p class="text-zinc-600 dark:text-zinc-300 leading-relaxed text-base sm:text-lg">
                            Mahasiswa Teknik Informatika STMIK Mardira Indonesia & Full-Stack Developer berdomisili di Ciamis. Berpengalaman dalam pengembangan aplikasi web modern (Laravel, Node.js, Tailwind CSS), aplikasi mobile berbasis Deep Learning (React Native + TensorFlow CNN), integrasi API (Fonnte WhatsApp API), serta aktif memimpin Forum Pemuda Singandaru.
                        </p>

                        <div class="pt-2 flex flex-wrap items-center gap-4">
                            <a href="#projek" class="px-6 py-3 rounded-xl bg-brand-500 hover:bg-brand-600 text-white font-semibold text-sm shadow-lg shadow-brand-500/20 transition-all flex items-center gap-2">
                                Explore Portfolio <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                            <a href="#kontak" class="px-6 py-3 rounded-xl border border-zinc-300 dark:border-zinc-800 hover:border-brand-500/50 bg-white dark:bg-zinc-900 text-zinc-800 dark:text-zinc-200 font-semibold text-sm transition-all flex items-center gap-2">
                                <i class="fa-regular fa-envelope"></i> Kontak Langsung
                            </a>
                        </div>
                    </div>

                    <!-- Visual Profile Card -->
                    <div class="lg:col-span-5 relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-brand-500/30 to-amber-500/20 rounded-3xl blur-xl opacity-70"></div>
                        <div class="relative rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/90 p-6 shadow-2xl backdrop-blur-sm space-y-6">
                            <div class="flex items-center gap-4 border-b border-zinc-100 dark:border-zinc-800 pb-5">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-brand-500 to-amber-500 p-0.5 shadow-md flex items-center justify-center text-zinc-100 font-heading font-bold text-2xl">
                                    DAR
                                </div>
                                <div>
                                    <h3 class="font-heading font-bold text-lg text-zinc-900 dark:text-zinc-100">Danil Akbar Rabbani</h3>
                                    <p class="text-xs text-brand-500 font-medium">@danil.rabbani</p>
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">STMIK Mardira Indonesia</p>
                                </div>
                            </div>
                            <div class="bg-zinc-950 rounded-xl p-4 font-mono text-xs text-zinc-300 border border-zinc-800 space-y-1">
                                <p><span class="text-purple-400">const</span> <span class="text-amber-300">developer</span> = {</p>
                                <p class="pl-4"><span class="text-sky-300">name</span>: <span class="text-emerald-300">'Danil Akbar Rabbani'</span>,</p>
                                <p class="pl-4"><span class="text-sky-300">location</span>: <span class="text-emerald-300">'Ciamis, Jawa Barat'</span>,</p>
                                <p class="pl-4"><span class="text-sky-300">focus</span>: [<span class="text-emerald-300">'Full-Stack'</span>, <span class="text-emerald-300">'React Native'</span>, <span class="text-emerald-300">'Deep Learning'</span>],</p>
                                <p class="pl-4"><span class="text-sky-300">status</span>: <span class="text-amber-300">'Building impactful software'</span></p>
                                <p>};</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projek" class="py-20 border-t border-zinc-200/80 dark:border-zinc-800/80">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 text-brand-500 font-semibold text-xs uppercase tracking-widest mb-2">
                            <i class="fa-solid fa-folder-open"></i> Selected Work
                        </div>
                        <h2 class="font-heading font-bold text-3xl sm:text-4xl text-zinc-900 dark:text-zinc-100">
                            Projek & Studi Kasus
                        </h2>
                    </div>

                    <!-- Category Filter Tabs -->
                    <div class="flex flex-wrap gap-2 p-1.5 bg-zinc-200/60 dark:bg-zinc-900 rounded-xl border border-zinc-300/40 dark:border-zinc-800">
                        <button @click="activeFilter = 'all'" :class="activeFilter === 'all' ? 'bg-brand-500 text-white shadow-md' : 'text-zinc-600 dark:text-zinc-400'" class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">Semua</button>
                        <button @click="activeFilter = 'mobile-ai'" :class="activeFilter === 'mobile-ai' ? 'bg-brand-500 text-white shadow-md' : 'text-zinc-600 dark:text-zinc-400'" class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">Mobile & AI</button>
                        <button @click="activeFilter = 'web'" :class="activeFilter === 'web' ? 'bg-brand-500 text-white shadow-md' : 'text-zinc-600 dark:text-zinc-400'" class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">Web Application</button>
                        <button @click="activeFilter = 'branding'" :class="activeFilter === 'branding' ? 'bg-brand-500 text-white shadow-md' : 'text-zinc-600 dark:text-zinc-400'" class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">UI/UX & Branding</button>
                        <button @click="activeFilter = 'api'" :class="activeFilter === 'api' ? 'bg-brand-500 text-white shadow-md' : 'text-zinc-600 dark:text-zinc-400'" class="px-4 py-2 rounded-lg text-xs font-semibold transition-all">API & Integrasi</button>
                    </div>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <template x-for="project in filteredProjects" :key="project.id">
                        <div class="group relative rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 overflow-hidden hover:border-brand-500/50 transition-all duration-300 flex flex-col justify-between hover:shadow-xl hover:-translate-y-1">
                            <div class="p-6 sm:p-8 space-y-5">
                                <div class="flex items-center justify-between">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/10 text-brand-500 border border-brand-500/20" x-text="project.categoryLabel"></span>
                                    <span class="text-xs text-zinc-500 dark:text-zinc-400" x-text="project.year"></span>
                                </div>

                                <div class="h-44 rounded-xl bg-zinc-950 relative overflow-hidden border border-zinc-800 p-4 flex flex-col justify-between">
                                    <div class="flex items-center justify-between text-zinc-500 text-xs font-mono">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                        </div>
                                        <span x-text="project.codeTag" class="text-zinc-400"></span>
                                    </div>
                                    <div class="text-center my-auto space-y-2">
                                        <i :class="project.iconClass" class="text-4xl text-brand-500"></i>
                                        <p class="text-xs font-mono text-zinc-400" x-text="project.highlightMetric"></p>
                                    </div>
                                    <div class="flex items-center justify-between text-[11px] text-zinc-500 border-t border-zinc-800/80 pt-2 font-mono">
                                        <span>STATUS: COMPLETED</span>
                                        <span class="text-brand-500">VERIFIED CODE</span>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="font-heading font-bold text-xl sm:text-2xl text-zinc-900 dark:text-zinc-100 group-hover:text-brand-500 transition-colors" x-text="project.title"></h3>
                                    <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-2 line-clamp-3 leading-relaxed" x-text="project.shortDesc"></p>
                                </div>

                                <div class="flex flex-wrap gap-2 pt-2">
                                    <template x-for="tag in project.tags" :key="tag">
                                        <span class="px-2.5 py-1 rounded-md text-[11px] font-medium bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 border border-zinc-200/80 dark:border-zinc-700/60" x-text="tag"></span>
                                    </template>
                                </div>
                            </div>

                            <div class="px-6 sm:px-8 py-4 bg-zinc-50 dark:bg-zinc-900/90 border-t border-zinc-100 dark:border-zinc-800 flex items-center justify-between">
                                <button @click="openModal(project)" class="text-xs font-semibold text-brand-500 hover:text-brand-600 flex items-center gap-2 group/btn">
                                    Lihat Studi Kasus & Detail <i class="fa-solid fa-arrow-right text-[10px] group-hover/btn:translate-x-1 transition-transform"></i>
                                </button>
                                <span class="text-xs text-zinc-500 dark:text-zinc-400" x-text="project.locationBadge"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- Pengalaman & Aktivitas Section -->
        <section id="pengalaman" class="py-20 border-t border-zinc-200/80 dark:border-zinc-800/80 bg-zinc-100/50 dark:bg-zinc-900/30">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <div class="inline-flex items-center gap-2 text-brand-500 font-semibold text-xs uppercase tracking-widest mb-2">
                        <i class="fa-solid fa-briefcase"></i> Track Record
                    </div>
                    <h2 class="font-heading font-bold text-3xl sm:text-4xl text-zinc-900 dark:text-zinc-100">
                        Pengalaman & Peran Organisasi
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm">
                        <span class="text-xs font-semibold text-brand-500 bg-brand-500/10 px-3 py-1 rounded-full">Agu 2025 - Des 2025</span>
                        <h3 class="font-heading font-bold text-xl text-zinc-900 dark:text-zinc-100 mt-4">Front-End & Back-End Web Developer AI Cohort</h3>
                        <p class="text-xs text-zinc-500 mt-1">Program Asah (Dicoding x Accenture)</p>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-3 leading-relaxed">Menyelesaikan modul teknis intensif pengembangan web full-stack, integrasi AI, serta memimpin manajemen proyek capstone sebagai QA & Deployment Lead.</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm">
                        <span class="text-xs font-semibold text-brand-500 bg-brand-500/10 px-3 py-1 rounded-full">Aktif / Berkelanjutan</span>
                        <h3 class="font-heading font-bold text-xl text-zinc-900 dark:text-zinc-100 mt-4">Ketua & Peneliti Lapangan</h3>
                        <p class="text-xs text-zinc-500 mt-1">Forum Pemuda Singandaru & Peternakan Kang Nur</p>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-3 leading-relaxed">Memimpin kegiatan sosial kemasyarakatan di Kawali serta mengumpulkan dataset riset citra langsung untuk kebutuhan skripsi SkinRabbit Detector.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kontak Section -->
        <section id="kontak" class="py-20 border-t border-zinc-200/80 dark:border-zinc-800/80">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-3xl p-8 sm:p-12 shadow-xl">
                    <div class="text-center max-w-xl mx-auto mb-10">
                        <h2 class="font-heading font-bold text-3xl text-zinc-900 dark:text-zinc-100">Mari Berkolaborasi</h2>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-2">Punya proyek web, aplikasi mobile, atau riset AI? Hubungi saya melalui formulir di bawah ini.</p>
                    </div>
                    <form @submit.prevent="submitForm()" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-zinc-700 dark:text-zinc-300 mb-1">Nama Lengkap</label>
                                <input type="text" x-model="formData.name" required class="w-full px-4 py-3 rounded-xl bg-zinc-50 dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 text-sm focus:border-brand-500 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-zinc-700 dark:text-zinc-300 mb-1">Email</label>
                                <input type="email" x-model="formData.email" required class="w-full px-4 py-3 rounded-xl bg-zinc-50 dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 text-sm focus:border-brand-500 outline-none transition-colors">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-zinc-700 dark:text-zinc-300 mb-1">Pesan / Ide Projek</label>
                            <textarea x-model="formData.message" rows="4" required class="w-full px-4 py-3 rounded-xl bg-zinc-50 dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 text-sm focus:border-brand-500 outline-none transition-colors resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-500 hover:bg-brand-600 text-white font-semibold text-sm shadow-lg shadow-brand-500/20 transition-all">
                            Kirim Pesan Sekarang →
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="py-8 border-t border-zinc-200 dark:border-zinc-800 text-center text-xs text-zinc-500">
        <p>&copy; 2026 Danil Akbar Rabbani. Dibangun dengan Laravel & Tailwind CSS.</p>
    </footer>

    <!-- Project Detail Modal -->
    <div x-show="modalOpen" x-cloak @keydown.escape.window="modalOpen = false" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
        <div x-show="modalOpen" @click="modalOpen = false" class="fixed inset-0 bg-zinc-950/80 backdrop-blur-sm"></div>
        <div x-show="modalOpen" class="relative w-full max-w-3xl bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-2xl overflow-hidden z-10 my-8">
            <template x-if="selectedProject">
                <div>
                    <div class="px-6 py-5 border-b border-zinc-200 dark:border-zinc-800 flex items-center justify-between bg-zinc-50 dark:bg-zinc-900">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/10 text-brand-500 border border-brand-500/20" x-text="selectedProject.categoryLabel"></span>
                            <span class="text-xs text-zinc-500" x-text="selectedProject.year"></span>
                        </div>
                        <button @click="modalOpen = false" class="p-2 rounded-xl text-zinc-500 hover:text-zinc-900 dark:hover:text-zinc-100 hover:bg-zinc-200/50 dark:hover:bg-zinc-800">
                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>
                    </div>
                    <div class="p-6 sm:p-8 space-y-6 max-h-[75vh] overflow-y-auto">
                        <div>
                            <h2 class="font-heading font-bold text-2xl sm:text-3xl text-zinc-900 dark:text-zinc-100" x-text="selectedProject.title"></h2>
                            <p class="text-sm font-medium text-brand-500 mt-1" x-text="selectedProject.subtitle"></p>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 rounded-xl bg-zinc-100 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800">
                            <div>
                                <span class="text-[11px] font-semibold text-zinc-500 uppercase">Peran</span>
                                <p class="text-xs font-bold text-zinc-900 dark:text-zinc-200 mt-0.5" x-text="selectedProject.role"></p>
                            </div>
                            <div>
                                <span class="text-[11px] font-semibold text-zinc-500 uppercase">Dampak</span>
                                <p class="text-xs font-bold text-brand-500 mt-0.5" x-text="selectedProject.impact"></p>
                            </div>
                            <div>
                                <span class="text-[11px] font-semibold text-zinc-500 uppercase">Lokasi / Mitra</span>
                                <p class="text-xs font-bold text-zinc-900 dark:text-zinc-200 mt-0.5" x-text="selectedProject.partner"></p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <h3 class="font-heading font-bold text-lg text-zinc-900 dark:text-zinc-100">Deskripsi & Studi Kasus</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-300 leading-relaxed whitespace-pre-line" x-text="selectedProject.fullDesc"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="toastShow" x-cloak class="fixed bottom-6 right-6 z-50 bg-zinc-900 text-white border border-brand-500/50 px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3">
        <span class="w-2.5 h-2.5 rounded-full bg-brand-500 animate-pulse"></span>
        <span x-text="toastMessage" class="text-sm font-medium"></span>
    </div>

    <!-- Alpine.js Application Logic -->
    <script>
        function portfolioApp() {
            return {
                darkMode: false,
                mobileMenuOpen: false,
                activeFilter: 'all',
                modalOpen: false,
                selectedProject: null,
                toastShow: false,
                toastMessage: '',
                formData: { name: '', email: '', message: '' },
                
                initTheme() {
                    const stored = localStorage.getItem('theme');
                    if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        this.darkMode = true;
                    }
                },
                toggleTheme() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
                },
                openModal(project) {
                    this.selectedProject = project;
                    this.modalOpen = true;
                },

                // ⬇️ SIMPAN/GANTI KODE SUBMITFORM() DI SINI ⬇️
                submitForm() {
                    if (!this.formData.name || !this.formData.message) return;

                    this.toastMessage = 'Mengirim pesan ke Email & WhatsApp...';
                    this.toastShow = true;

                    // 1. Kirim data ke Backend Laravel via AJAX untuk Email
                    fetch('/contact', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.formData)
                    }).catch(err => console.log('Email sync note:', err));

                    // 2. Format teks dan buka WhatsApp secara bersamaan
                    const text = `Halo Danil, saya tertarik untuk berkolaborasi!%0A%0A` +
                                 `*Nama:* ${encodeURIComponent(this.formData.name)}%0A` +
                                 `*Email:* ${encodeURIComponent(this.formData.email || '-')}%0A` +
                                 `*Pesan/Ide Projek:*%0A${encodeURIComponent(this.formData.message)}`;

                    const waUrl = `https://wa.me/6285723613467?text=${text}`;

                    setTimeout(() => {
                        window.open(waUrl, '_blank');
                        this.toastMessage = 'Pesan terkirim ke sistem!';
                        this.formData = { name: '', email: '', message: '' };
                        setTimeout(() => { this.toastShow = false; }, 3000);
                    }, 1000);
                },

        projects: [
            {
                id: 'skinrabbit',
                category: 'mobile-ai',
                categoryLabel: 'Mobile & AI',
                year: '2026',
                codeTag: 'skin_rabbit_cnn.py',
                iconClass: 'fa-solid fa-shield-cat',
                highlightMetric: 'Accuracy > 90%',
                title: 'SkinRabbit Detector',
                subtitle: 'Klasifikasi Penyakit Kulit Kelinci Menggunakan CNN MobileNetV2',
                shortDesc: 'Penelitian tugas akhir skripsi berupa model deep learning MobileNetV2 untuk deteksi dini Scabies dan Ringworm pada kelinci.',
                tags: ['Python', 'TensorFlow', 'React Native', 'Google Colab'],
                locationBadge: 'Sidaharja, Ciamis',
                role: 'Lead Researcher & Developer',
                impact: 'Akurasi deteksi > 90% pada dataset uji lapangan',
                partner: 'Peternakan Kang Nur',
                fullDesc: 'Penelitian skripsi ini difokuskan untuk membantu peternak skala UMKM mengidentifikasi penyakit kulit kelinci secara dini melalui aplikasi Android berbasis React Native yang didukung model Convolutional Neural Network (MobileNetV2).'
            },
            {
                id: 'kastirta',
                category: 'web',
                categoryLabel: 'Web Application',
                year: '2026',
                codeTag: 'kastirta_billing.php',
                iconClass: 'fa-solid fa-faucet-drip',
                highlightMetric: 'Fonnte WhatsApp API',
                title: 'KasTirta Singandaru',
                subtitle: 'Sistem Manajemen Tagihan Air Komunitas Warga',
                shortDesc: 'Aplikasi web pencatatan meteran dan penagihan kas air desa terintegrasi notifikasi WhatsApp otomatis via Fonnte API.',
                tags: ['PHP', 'MySQL', 'Bootstrap', 'Fonnte API'],
                locationBadge: 'Singandaru, Ciamis',
                role: 'Full-Stack Developer',
                impact: 'Memangkas waktu rekapitulasi bulanan hingga 70%',
                partner: 'Pengurus KasTirta',
                fullDesc: 'Sistem manajemen tagihan air komunitas yang dirancang untuk mendigitalkan pencatatan meteran warga di Singandaru, lengkap dengan pengiriman pengingat tagihan otomatis via WhatsApp.'
            },
            {
                id: 'panada',
                category: 'web',
                categoryLabel: 'Web Application',
                year: '2026',
                codeTag: 'cafe_panada_pos.php',
                iconClass: 'fa-solid fa-mug-hot',
                highlightMetric: 'QR Table Ordering',
                title: 'Cafe Panada POS & QR Order',
                subtitle: 'Self-Service Cafe Ordering & Receipt System',
                shortDesc: 'MVP sistem pemesanan mandiri via QR Code meja dan manajemen pencetakan struk kasir berbasis Laravel.',
                tags: ['Laravel', 'Tailwind CSS', 'MySQL'],
                locationBadge: 'Commercial MVP',
                role: 'Backend Developer',
                impact: 'Mengurangi waktu tunggu pesanan dari 10m ke <2m',
                partner: 'Cafe Panada',
                fullDesc: 'Aplikasi web Laravel yang memungkinkan pelanggan melakukan pemesanan langsung dari meja kafe dengan memindai QR Code, terintegrasi ke layar dapur dan manajemen struk kasir.'
            },
            {
                id: 'alhidayah',
                category: 'web',
                categoryLabel: 'Web Application',
                year: '2025',
                codeTag: 'alhidayah_portal.php',
                iconClass: 'fa-solid fa-school',
                highlightMetric: 'Portal & CMS Santri',
                title: 'Pesantren Al-Hidayah Web Portal',
                subtitle: 'Portal Informasi Resmi & Pendaftaran Santri',
                shortDesc: 'Pengembangan website profil dan portal informasi resmi untuk transparansi kegiatan serta pendaftaran santri baru.',
                tags: ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript'],
                locationBadge: 'Ciamis',
                role: 'Web Developer',
                impact: 'Memperluas jangkauan informasi pendaftaran santri',
                partner: 'Pondok Pesantren Al-Hidayah',
                fullDesc: 'Portal web informatif untuk menampilkan profil pendidikan, berita kegiatan pondok pesantren, dan formulir pendaftaran online bagi calon santri.'
            },
            {
                id: 'ratecard',
                category: 'branding',
                categoryLabel: 'UI/UX & Branding',
                year: '2026',
                codeTag: 'bobby_ratecard.fig',
                iconClass: 'fa-solid fa-id-card-clip',
                highlightMetric: 'Figma Visual Design',
                title: 'Rate Card Bobby Irawan',
                subtitle: 'Professional Digital Rate Card & Media Branding',
                shortDesc: 'Desain visual digital rate card profesional dan interaktif untuk keperluan kolaborasi, promosi media sosial, dan sponsorship.',
                tags: ['Figma', 'Canva', 'UI/UX Design'],
                locationBadge: 'Personal Branding',
                role: 'UI/UX Designer',
                impact: 'Meningkatkan profesionalitas negosiasi brand partnership',
                partner: 'Bobby Irawan',
                fullDesc: 'Perancangan aset visual rate card kreator konten yang bersih dan modern guna menonjolkan statistik demografi audiens kepada calon mitra bisnis.'
            },
            {
                id: 'bananabobbs',
                category: 'branding',
                categoryLabel: 'UI/UX & Branding',
                year: '2026',
                codeTag: 'banana_bobbs_brand.fig',
                iconClass: 'fa-solid fa-store',
                highlightMetric: 'Visual Identity & Web',
                title: 'Banana Bobbs Branding & Web',
                subtitle: 'Kuliner Kreatif Identity & Landing Page',
                shortDesc: 'Perancangan identitas visual brand kuliner kreatif beserta landing page katalog produk untuk memperkuat pemasaran digital.',
                tags: ['Figma', 'Tailwind CSS', 'HTML/CSS'],
                locationBadge: 'Culinary Brand',
                role: 'UI/UX & Front-End Developer',
                impact: 'Memperkuat brand awareness di kanal digital',
                partner: 'Banana Bobbs',
                fullDesc: 'Proyek pembuatan identitas merek dan landing page katalog produk kuliner kreatif untuk meningkatkan daya tarik konsumen muda di internet.'
            }
        ],

                get filteredProjects() {
                    if (this.activeFilter === 'all') return this.projects;
                    return this.projects.filter(p => p.category === this.activeFilter);
                }
            }
        }
    </script>
</body>
</html>