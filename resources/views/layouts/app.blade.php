<!DOCTYPE html>
<html lang="id" 
      x-data="{ 
          dark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
          toast: { show: false, message: '' },
          showToast(msg) {
              this.toast.message = msg;
              this.toast.show = true;
              setTimeout(() => this.toast.show = false, 3500);
          }
      }" 
      :class="{ 'dark': dark }" 
      x-init="$watch('dark', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil['nama'] }} — Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3 { font-family: 'PT Sans', sans-serif; }
    </style>
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 transition-colors duration-300 antialiased min-h-screen relative">

    <!-- Glowing Background Overlay -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[600px] h-[350px] bg-brand/15 blur-[130px] rounded-full pointer-events-none z-0"></div>

    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 z-40 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800 transition-colors">
        <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="#" class="font-bold text-lg text-zinc-900 dark:text-white tracking-tight">
                danil<span class="text-brand">.akbar</span>
            </a>

            <div class="flex items-center gap-4">
                <a href="#projects" class="text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-brand dark:hover:text-brand transition-colors hidden sm:block">Proyek</a>
                <a href="#experience" class="text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-brand dark:hover:text-brand transition-colors hidden sm:block">Pengalaman</a>
                <a href="#contact" class="text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-brand dark:hover:text-brand transition-colors hidden sm:block">Kontak</a>

                <!-- Dark Mode Toggle Button -->
                <button @click="dark = !dark" 
                        class="p-2 rounded-full border border-zinc-300 dark:border-zinc-700 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
                        :aria-label="dark ? 'Switch to light mode' : 'Switch to dark mode'">
                    <svg x-show="!dark" class="w-4 h-4 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
                    <svg x-show="dark" class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 pt-28 pb-16 relative z-10">
        @yield('content')
    </main>

    <!-- Toast Notification Overlay -->
    <div x-show="toast.show" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="fixed bottom-6 right-6 z-50 bg-zinc-900 text-white border border-brand/50 px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3">
        <span class="w-2.5 h-2.5 rounded-full bg-brand animate-pulse"></span>
        <span x-text="toast.message" class="text-sm font-medium"></span>
    </div>

</body>
</html>