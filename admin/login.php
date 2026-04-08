<?php
include_once "assets/php/process_login.php";
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | EmethSoftwares</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary-fixed-variant": "#0369a1",
                        "inverse-on-surface": "#0f172a",
                        "tertiary-fixed": "#e0f2fe",
                        "on-secondary-container": "#94a3b8",
                        "outline": "#475569",
                        "surface-container-high": "#1e293b",
                        "tertiary": "#0ea5e9",
                        "primary-fixed-dim": "#93c5fd",
                        "on-tertiary-container": "#e0f2fe",
                        "on-primary-fixed-variant": "#1d4ed8",
                        "surface-container-lowest": "#080c14",
                        "on-primary-fixed": "#1e3a8a",
                        "on-error-container": "#fee2e2",
                        "tertiary-fixed-dim": "#bae6fd",
                        "primary-fixed": "#dbeafe",
                        "surface-bright": "#1a2130",
                        "on-secondary-fixed-variant": "#334155",
                        "tertiary-container": "#0c4a6e",
                        "on-surface": "#f1f5f9",
                        "on-tertiary-fixed": "#082f49",
                        "on-error": "#ffffff",
                        "secondary-fixed": "#e2e8f0",
                        "on-tertiary": "#ffffff",
                        "background": "#101622",
                        "on-secondary": "#f1f5f9",
                        "on-primary-container": "#dbeafe",
                        "primary": "#0d59f2",
                        "surface-container-low": "#101622",
                        "secondary": "#334155",
                        "primary-container": "#1e293b",
                        "outline-variant": "#1e293b",
                        "surface-variant": "#1e293b",
                        "inverse-surface": "#f8fafc",
                        "secondary-container": "#1e293b",
                        "surface-container-highest": "#334155",
                        "surface-tint": "#0d59f2",
                        "inverse-primary": "#60a5fa",
                        "error-container": "#7f1d1d",
                        "on-primary": "#ffffff",
                        "surface": "#101622",
                        "on-surface-variant": "#94a3b8",
                        "on-background": "#f8fafc",
                        "surface-dim": "#0c111a",
                        "secondary-fixed-dim": "#cbd5e1",
                        "on-secondary-fixed": "#0f172a",
                        "surface-container": "#161e2e",
                        "error": "#ef4444"
                    },
                    fontFamily: {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .precision-gradient-text {
            background: linear-gradient(to right, #0d59f2, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body min-h-screen flex flex-col">
    <!-- TopAppBar from JSON -->
    <nav class="bg-[#101622] flex justify-between items-center w-full px-6 py-4 fixed top-0 z-50">
        <div class="flex items-center gap-2">
            <span class="text-xl font-black tracking-[-0.025em] text-white font-['Inter']">Emeth Securities</span>
        </div>
        <div class="flex items-center gap-6">
            <div class="hidden md:flex gap-8">
                <!-- Navigation is suppressed for transactional login page per rules -->
            </div>
            <div class="flex items-center gap-4">
                <button class="text-[#94a3b8] hover:text-white transition-colors duration-200">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                </button>
                <button class="text-[#94a3b8] hover:text-white transition-colors duration-200">
                    <span class="material-symbols-outlined" data-icon="dark_mode">dark_mode</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- Main Content Canvas -->
    <main class="flex-grow flex items-center justify-center px-4 pt-20 pb-12 relative overflow-hidden">
        <!-- Abstract Decorative Element -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="w-full max-w-md relative z-10">
            <!-- Login Card -->
            <div class="bg-surface-container border border-outline-variant/30 rounded-xl shadow-xl overflow-hidden backdrop-blur-sm">
                <div class="p-8 md:p-10">
                    <!-- Header -->
                    <div class="mb-10 text-center md:text-left">
                        <span class="text-[10px] uppercase tracking-[0.2em] text-primary font-bold mb-2 block">System Access</span>
                        <h1 class="text-4xl font-extrabold tracking-tighter text-white mb-2">Welcome Back</h1>
                        <p class="text-on-surface-variant text-sm">Authentication required for dashboard access.</p>
                    </div>
                    <!-- Form -->
                    <form action="#" method="post" class="space-y-6">

                        <!-- error card -->

                        <?php if (!empty($errors)) : ?>
                            <div class="bg-error-container/20 border border-error/30 rounded-lg p-4 mb-6 flex items-start gap-3 animate-pulse">
                                <span class="material-symbols-outlined text-error text-[20px] shrink-0" data-icon="warning">warning</span>
                                <div class="space-y-1">
                                    <p class="text-sm font-semibold text-white">Authentication Failed</p>
                                    <?php foreach ($errors as $error): ?>
                                        <?=
                                        '<p class="text-xs text-on-error-container opacity-90">
                                        ' . $error . '
                                        </p>'
                                        ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-[0.1em] font-bold text-on-secondary-container" for="username">Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]" data-icon="user">person</span>
                                </div>
                                <input class="w-full bg-surface-container-low border border-outline-variant/50 rounded-lg py-3 pl-11 pr-4 text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200" id="username" name="username" placeholder="john" type="text" />
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="space-y-2">
                            <div class="flex justify-between items-end">
                                <label class="text-[10px] uppercase tracking-[0.1em] font-bold text-on-secondary-container" for="password">Password</label>
                                <a class="text-xs text-primary hover:text-primary-fixed-dim transition-colors font-semibold" href="#">Forgot Password?</a>
                            </div>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]" data-icon="lock">lock</span>
                                </div>
                                <input class="w-full bg-surface-container-low border border-outline-variant/50 rounded-lg py-3 pl-11 pr-4 text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200" name="password" id="password" placeholder="••••••••" type="password" />
                            </div>
                        </div>
                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input class="w-4 h-4 rounded border-outline-variant/50 bg-surface-container-low text-primary focus:ring-primary focus:ring-offset-background" id="remember" type="checkbox" />
                            <label class="ml-3 text-sm text-on-surface-variant" for="remember">Remember me</label>
                        </div>
                        <!-- Sign In Button -->
                        <button class="w-full bg-primary text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-fixed-variant transition-all duration-200 flex items-center justify-center gap-2 group" type="submit">
                            <span>Sign In</span>
                            <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
                        </button>
                    </form>
                    <!-- Footer Note -->
                    <div class="mt-8 pt-8 border-t border-outline-variant/20 text-center">
                        <p class="text-xs text-on-surface-variant">
                            Restricted access for authorized personnel only.
                            <br class="hidden sm:block" />
                            All activity is logged and monitored.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer from JSON -->
    <footer class="bg-[#101622] border-t border-white/10 flex flex-col md:flex-row justify-between items-center w-full px-8 py-6 gap-4">
        <div class="text-[#0d59f2]">
            <span class="font-['Inter'] text-[10px] uppercase tracking-[0.1em]">© 2024 Indigo Precision. Engineering Excellence.</span>
        </div>
        <div class="flex gap-6">
            <a class="font-['Inter'] text-[10px] uppercase tracking-[0.1em] text-[#94a3b8] hover:text-[#0d59f2] transition-opacity opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
            <a class="font-['Inter'] text-[10px] uppercase tracking-[0.1em] text-[#94a3b8] hover:text-[#0d59f2] transition-opacity opacity-80 hover:opacity-100" href="#">Terms of Service</a>
            <a class="font-['Inter'] text-[10px] uppercase tracking-[0.1em] text-[#94a3b8] hover:text-[#0d59f2] transition-opacity opacity-80 hover:opacity-100" href="#">Technical Documentation</a>
        </div>
    </footer>
</body>
<script src="assets/js/app.js"></script>

</html>