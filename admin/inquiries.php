<?php

// add page title
$page_title = "Inquiries";
// including all php assets
include_once "assets/php/head.php";
include_once "assets/php/sidebar.php";
include_once "assets/php/header.php";

?>
<!-- Main Content -->
<main class="ml-64 mt-16 p-8 h-[calc(100vh-64px)] overflow-y-auto ">
    <div class="mb-8">
        <h2 class="text-4xl font-black tracking-tighter text-on-background">Contact <span class="text-gradient">Inquiries</span></h2>
        <p class="text-on-surface-variant mt-2 max-w-2xl">Manage and respond to technical support requests and project inquiries from the global network.</p>
    </div>
    <!-- Filter Bar -->
    <div class="flex items-center justify-between mb-6 bg-surface-container/50 p-2 rounded-xl border border-outline-variant/10">
        <div class="flex gap-2">
            <button class="px-5 py-2 rounded-lg bg-primary text-on-primary text-sm font-bold shadow-lg shadow-primary/10">
                All Inquiries
            </button>
            <button class="px-5 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors text-sm font-medium">
                Unread
            </button>
            <button class="px-5 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors text-sm font-medium flex items-center gap-2">
                <span class="material-symbols-outlined text-sm" data-icon="flag">flag</span>
                Flagged
            </button>
        </div>
        <div class="flex items-center gap-4 px-4">
            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">Showing <span id="current-page">1</span> of <span id="total-page">2</span></p>
        </div>
    </div>



    <!-- High-Fidelity Data Table -->
    <div class="bg-surface-container rounded-xl overflow-hidden border border-outline-variant/10">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-high/50">
                    <th class="px-6 py-4 text-[10px] uppercase tracking-[0.15em] text-on-surface-variant font-black">Sender</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-[0.15em] text-on-surface-variant font-black">ip address</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-[0.15em] text-on-surface-variant font-black">Date</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-[0.15em] text-on-surface-variant font-black">Status</th>
                    <th class="px-6 py-4 text-[10px] uppercase tracking-[0.15em] text-on-surface-variant font-black text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="table-body" class="divide-y divide-outline-variant/10">
                <!-- Row 1 -->
                <!-- <tr class="hover:bg-surface-bright/30 transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">JD</div>
                            <div>
                                <p class="text-sm font-bold text-on-background">Julian Draxler</p>
                                <p class="text-xs text-on-surface-variant">julian@aeron-tech.io</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm font-medium text-on-background">Partnership: Quantum Cloud Integration</p>
                        <p class="text-xs text-on-surface-variant truncate max-w-xs">Looking to discuss how Indigo Precision can scale our...</p>
                    </td>
                    <td class="px-6 py-5 text-sm text-on-surface-variant">Oct 24, 2023</td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-primary/10 text-primary border border-primary/20 animate-pulse">New</span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 rounded-lg hover:bg-blue-500/10 text-blue-500 transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-error/10 text-error transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </td>
                </tr> -->
                <!-- Row 2 -->
                <!-- <tr class="hover:bg-surface-bright/30 transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-tertiary/10 flex items-center justify-center text-tertiary font-bold text-xs">SK</div>
                            <div>
                                <p class="text-sm font-bold text-on-background">Sarah Kurosawa</p>
                                <p class="text-xs text-on-surface-variant">s.kuro@design-matrix.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm font-medium text-on-background">UI/UX Audit for Precision 2.0</p>
                        <p class="text-xs text-on-surface-variant truncate max-w-xs">Feedback regarding the architectural minimalist approach...</p>
                    </td>
                    <td class="px-6 py-5 text-sm text-on-surface-variant">Oct 23, 2023</td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-slate-800 text-on-surface-variant">Read</span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 rounded-lg hover:bg-blue-500/10 text-blue-500 transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-error/10 text-error transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </td>
                </tr> -->
                <!-- Row 3 -->
                <!-- <tr class="hover:bg-surface-bright/30 transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-secondary/20 flex items-center justify-center text-on-surface font-bold text-xs">MT</div>
                            <div>
                                <p class="text-sm font-bold text-on-background">Marcus Thorne</p>
                                <p class="text-xs text-on-surface-variant">m.thorne@heavy-ops.net</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm font-medium text-on-background">Hardware Integration Specs</p>
                        <p class="text-xs text-on-surface-variant truncate max-w-xs">Requesting technical documentation for v4.2 sensors...</p>
                    </td>
                    <td class="px-6 py-5 text-sm text-on-surface-variant">Oct 22, 2023</td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-tertiary/10 text-tertiary">Replied</span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 rounded-lg hover:bg-blue-500/10 text-blue-500 transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-error/10 text-error transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </td>
                </tr> -->
                <!-- Row 4 -->
                <!-- <tr class="hover:bg-surface-bright/30 transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">EL</div>
                            <div>
                                <p class="text-sm font-bold text-on-background">Elena Lopez</p>
                                <p class="text-xs text-on-surface-variant">elena@urban-flow.pt</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm font-medium text-on-background">Urgent: API Authentication Error</p>
                        <p class="text-xs text-on-surface-variant truncate max-w-xs">Encountering 401 errors since the last deploy...</p>
                    </td>
                    <td class="px-6 py-5 text-sm text-on-surface-variant">Oct 22, 2023</td>
                    <td class="px-6 py-5 flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-error/10 text-error">Unread</span>
                        <span class="material-symbols-outlined text-error text-base" data-icon="flag" style="font-variation-settings: 'FILL' 1;">flag</span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 rounded-lg hover:bg-blue-500/10 text-blue-500 transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-error/10 text-error transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </td>
                </tr> -->
                <!-- Row 5 -->
                <!-- <tr class="hover:bg-surface-bright/30 transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-secondary/20 flex items-center justify-center text-on-surface font-bold text-xs">RH</div>
                            <div>
                                <p class="text-sm font-bold text-on-background">Rianne Haddon</p>
                                <p class="text-xs text-on-surface-variant">rianne@studio-h.co.uk</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm font-medium text-on-background">Project Update Request</p>
                        <p class="text-xs text-on-surface-variant truncate max-w-xs">Can we schedule a call for the Q4 review?</p>
                    </td>
                    <td class="px-6 py-5 text-sm text-on-surface-variant">Oct 21, 2023</td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-slate-800 text-on-surface-variant">Read</span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 rounded-lg hover:bg-blue-500/10 text-blue-500 transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-error/10 text-error transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </td>
                </tr> -->
            </tbody>
        </table>


        <!-- Pagination -->
        <div class="px-6 py-4 flex items-center justify-between bg-surface-container-high/20 border-t border-outline-variant/10">
            <button data-page-number="" id="previous-page" class="flex items-center gap-2 text-sm font-bold text-on-surface-variant hover:text-on-background transition-colors">
                <span class="material-symbols-outlined text-lg" data-icon="chevron_left">chevron_left</span>
                Previous
            </button>
            <div id="pages-container" class="flex items-center gap-1">
                <button class="w-8 h-8 rounded-lg bg-primary text-on-primary font-bold text-xs">1</button>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant font-bold text-xs transition-colors">2</button>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant font-bold text-xs transition-colors">3</button>
                <span class="text-on-surface-variant px-1">...</span>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant font-bold text-xs transition-colors">16</button>
            </div>
            <button data-page-number="" id="next-page" class="flex items-center gap-2 text-sm font-bold text-on-surface-variant hover:text-on-background transition-colors">
                Next
                <span class="material-symbols-outlined text-lg" data-icon="chevron_right">chevron_right</span>
            </button>
        </div>

        
    </div>
    <!-- System Stats / Bento Style -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-surface-container p-6 rounded-xl border border-outline-variant/10">
            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-black">Average Response</p>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-3xl font-black text-on-background tracking-tighter">1.4h</span>
                <span class="text-xs text-primary font-bold">↓ 12%</span>
            </div>
        </div>
        <div class="bg-surface-container p-6 rounded-xl border border-outline-variant/10">
            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-black">Total Unread</p>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-3xl font-black text-on-background tracking-tighter">12</span>
                <span class="text-xs text-error font-bold">Critical</span>
            </div>
        </div>
        <div class="bg-surface-container p-6 rounded-xl border border-outline-variant/10">
            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-black">Success Rate</p>
            <div class="mt-2 flex items-baseline gap-2">
                <span class="text-3xl font-black text-on-background tracking-tighter">98.2%</span>
                <span class="text-xs text-tertiary font-bold">Stable</span>
            </div>
        </div>
        <div class="bg-surface-container p-6 rounded-xl border border-outline-variant/10 flex items-center justify-between">
            <div>
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-black">System Status</p>
                <div class="mt-2 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                    <span class="text-sm font-bold text-on-background">Operational</span>
                </div>
            </div>
            <span class="material-symbols-outlined text-on-surface-variant/30 text-3xl" data-icon="memory">memory</span>
        </div>
    </div>
</main>


<?php
include_once "assets/php/footer.php";
?>
<script src="assets/js/inquiries.js"></script>
