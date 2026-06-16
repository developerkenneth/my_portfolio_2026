<?php
require_once "../init/core.php";
require_once ROOT_PATH . "/init/Auth.php";
session_start();

Auth::logout_redirect();
// add page title
$page_title = "Inquiries";
// including all php assets
include_once "assets/php/head.php";
include_once "assets/php/sidebar.php";
include_once "assets/php/header.php";

?>

<main class="ml-64 pt-24 pb-12 px-10 max-w-6xl">
    <div class="mb-10">
        <h2 class="text-3xl font-black tracking-tighter text-slate-50">Global Preferences</h2>
        <p class="text-on-surface-variant mt-1 text-sm">Configure your development environment and administrative privileges.</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Profile Management -->
        <section class="lg:col-span-8 bg-surface-container border border-slate-800/30 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-slate-800/50 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-bold text-white leading-tight">Profile Management</h3>
                    <p class="text-[10px] uppercase tracking-widest text-blue-500 font-black mt-1">Identity Cluster</p>
                </div>
                <span class="material-symbols-outlined text-slate-600">badge</span>
            </div>
            <div class="p-8 space-y-8">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="relative group">
                        <img alt="User Avatar" class="w-24 h-24 rounded-2xl object-cover border-2 border-slate-800 group-hover:border-primary transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3qeWA73b7aBrF9064Nu9RDkbTq5tGqbfGQsOmgzvOF9Xu6go3XswUg24ZwDnr7AwJwObSXjr2PuKPu_1fIpD4zD69EkKaAOXpx6iBs8wndhNIM5_fGR-jbaqBCHVBdVB5J7CFeFl1V6eT-NPGI0xjIsdlGBRMEnDmUm79OJsogIycSnnctsJRJSFLVN3tJi1seNDZusGF9dOIJoYAHyE4vHT_F8kNN3cmCRhsWmfQsFkvfDLH15b-RKa9gY94gQD_1Vg9C0oEYBE" />
                        <button class="absolute -bottom-2 -right-2 p-2 bg-primary rounded-xl text-white shadow-lg hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-sm">photo_camera</span>
                        </button>
                    </div>
                    <div class="flex-1 space-y-4 w-full">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Full Name</label>
                                <input class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-sm input-focus-ring text-slate-100" type="text" value="Alex Rivera" />
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Email Address</label>
                                <input class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-sm input-focus-ring text-slate-100" type="email" value="alex.rivera@devportfolio.io" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 border-t border-slate-800/30 flex justify-end">
                    <button class="px-6 py-2.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-900/20 hover:brightness-110 transition-all active:scale-95">
                        Save Changes
                    </button>
                </div>
            </div>
        </section>
        <!-- System Preferences -->
        <section class="lg:col-span-4 bg-surface-container-high border border-slate-800/30 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-slate-800/50">
                <h3 class="text-lg font-bold text-white leading-tight">Preferences</h3>
                <p class="text-[10px] uppercase tracking-widest text-blue-500 font-black mt-1">UX Parameters</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-200">Dark Mode</p>
                        <p class="text-[10px] text-slate-500">Invert system luminosity</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input checked="" class="sr-only peer" type="checkbox" />
                        <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Language</label>
                    <select class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2 text-sm text-slate-300 input-focus-ring appearance-none">
                        <option>English (US)</option>
                        <option>German</option>
                        <option>Japanese</option>
                    </select>
                </div>
                <div class="pt-2">
                    <p class="text-xs font-bold text-slate-200 mb-4">Notifications</p>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 group cursor-pointer">
                            <input checked="" class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-primary focus:ring-primary focus:ring-offset-slate-950" type="checkbox" />
                            <span class="text-xs text-slate-400 group-hover:text-slate-200 transition-colors">Critical System Alerts</span>
                        </label>
                        <label class="flex items-center gap-3 group cursor-pointer">
                            <input class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-primary focus:ring-primary focus:ring-offset-slate-950" type="checkbox" />
                            <span class="text-xs text-slate-400 group-hover:text-slate-200 transition-colors">New Inquiry Digest</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <!-- API Configuration (Bento Style) -->
        <section class="lg:col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 bg-surface-container border border-slate-800/30 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-blue-500">api</span>
                    <h3 class="text-xl font-black tracking-tight">API Configurations</h3>
                </div>
                <div class="space-y-6">
                    <div class="p-4 bg-slate-900/50 rounded-xl border border-slate-800/50 flex items-center gap-4">
                        <div class="w-10 h-10 bg-[#635BFF]/10 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#635BFF]">payments</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold">Stripe Connect</p>
                            <p class="text-xs text-slate-500 font-mono">sk_live_•••••••••••••••••</p>
                        </div>
                        <button class="px-3 py-1.5 border border-slate-700 text-[10px] font-bold rounded-lg hover:bg-slate-800">ROTATE KEY</button>
                    </div>
                    <div class="p-4 bg-slate-900/50 rounded-xl border border-slate-800/50 flex items-center gap-4">
                        <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-white">code</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold">GitHub OAuth</p>
                            <p class="text-xs text-slate-500 font-mono">ghp_••••••••••••••••••••</p>
                        </div>
                        <button class="px-3 py-1.5 border border-slate-700 text-[10px] font-bold rounded-lg hover:bg-slate-800">REFRESH</button>
                    </div>
                </div>
                <div class="mt-6 flex justify-between items-center">
                    <p class="text-[10px] text-slate-500 italic">Connected to 4 external services.</p>
                    <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                        Add New Integration <span class="material-symbols-outlined text-sm">add</span>
                    </button>
                </div>
            </div>
            <div class="bg-primary/5 border border-primary/20 rounded-2xl p-8 flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-bold text-white">Network Status</h4>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-400">Endpoint Latency</span>
                            <span class="text-xs font-mono text-blue-500">24ms</span>
                        </div>
                        <div class="w-full bg-slate-800 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-blue-500 h-full w-4/5 animate-pulse"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></div>
                        <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Operational</span>
                    </div>
                    <p class="text-xs text-slate-400">All systems performing within optimal baseline parameters.</p>
                </div>
            </div>
        </section>
        <!-- Security & Danger Zone -->
        <section class="lg:col-span-7 bg-surface-container border border-slate-800/30 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-slate-800/50">
                <h3 class="text-lg font-bold text-white leading-tight">Security Protocol</h3>
                <p class="text-[10px] uppercase tracking-widest text-blue-500 font-black mt-1">Access Control</p>
            </div>
            <div class="p-8 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Current Password</label>
                        <input class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-sm input-focus-ring text-slate-100" type="password" value="••••••••••••" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] uppercase font-bold tracking-widest text-slate-400">New Password</label>
                        <input class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-sm input-focus-ring text-slate-100" placeholder="Min 12 characters" type="password" />
                    </div>
                </div>
                <div class="p-4 rounded-xl bg-slate-900/50 border border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">security</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Multi-Factor Auth (MFA)</p>
                            <p class="text-[10px] text-slate-500">Authenticator app or SMS codes</p>
                        </div>
                    </div>
                    <button class="px-4 py-2 bg-blue-500/10 text-blue-500 text-[10px] font-black uppercase tracking-widest rounded-lg hover:bg-blue-500/20">Enable</button>
                </div>
                <div class="flex justify-end pt-4">
                    <button class="px-6 py-2.5 bg-primary text-white text-sm font-bold rounded-xl hover:brightness-110">Update Security</button>
                </div>
            </div>
        </section>
        <section class="lg:col-span-5 bg-error-container/10 border border-error/20 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-error/20">
                <h3 class="text-lg font-bold text-error leading-tight uppercase tracking-tighter">Danger Zone</h3>
                <p class="text-[10px] uppercase tracking-widest text-error/60 font-black mt-1">Irreversible Actions</p>
            </div>
            <div class="p-8 space-y-6">
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-error mt-0.5">warning</span>
                        <div>
                            <p class="text-sm font-bold text-slate-200">Deactivate Instance</p>
                            <p class="text-xs text-slate-500">Temporarily take your portfolio offline. All public routes will return 503.</p>
                        </div>
                    </div>
                    <button class="w-full py-2.5 bg-slate-900 border border-slate-800 text-slate-300 text-xs font-bold rounded-xl hover:bg-slate-800 transition-all">Deactivate Portfolio</button>
                </div>
                <div class="h-px bg-error/10"></div>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm font-bold text-error">Terminate Account</p>
                        <p class="text-xs text-slate-500 mt-1">Permanently delete all project data, assets, and analytics. This action cannot be undone.</p>
                    </div>
                    <button class="w-full py-2.5 bg-error/10 text-error border border-error/20 text-xs font-bold rounded-xl hover:bg-error hover:text-white transition-all">Delete Everything</button>
                </div>
            </div>
        </section>
    </div>

</main>

<!-- add necessary script here -->
<?php
include_once "assets/php/footer.php";
?>