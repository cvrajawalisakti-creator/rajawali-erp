<aside class="w-64 bg-slate-900 text-slate-200 min-h-screen flex flex-col">

    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-slate-800">

        <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold">
            R
        </div>

        <div class="ml-3">
            <div class="font-bold text-white">
                RSIS
            </div>

            <div class="text-xs text-slate-400">
                ERP System
            </div>
        </div>

    </div>

    <!-- Menu -->
    <nav class="flex-1 px-4 py-6 space-y-6">

        <div>

            <div class="text-xs uppercase tracking-wider text-slate-500 mb-2">
                Main
            </div>

            <a href="{{ route('dashboard') }}"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>🏠</span>

                <span class="ml-3">
                    Dashboard
                </span>

            </a>

        </div>

        <div>

            <div class="text-xs uppercase tracking-wider text-slate-500 mb-2">
                Master Data
            </div>

            <a href="{{ route('company.edit') }}"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>🏢</span>

                <span class="ml-3">
                    Company
                </span>

            </a>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>👥</span>

                <span class="ml-3">
                    Customer
                </span>

            </a>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>🚚</span>

                <span class="ml-3">
                    Supplier
                </span>

            </a>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>📦</span>

                <span class="ml-3">
                    Item
                </span>

            </a>

        </div>

        <div>

            <div class="text-xs uppercase tracking-wider text-slate-500 mb-2">
                Transaction
            </div>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>🛒</span>

                <span class="ml-3">
                    Purchase
                </span>

            </a>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>📦</span>

                <span class="ml-3">
                    Inventory
                </span>

            </a>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>💰</span>

                <span class="ml-3">
                    Sales
                </span>

            </a>

        </div>

        <div>

            <div class="text-xs uppercase tracking-wider text-slate-500 mb-2">
                System
            </div>

            <a href="#"
               class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800 transition">

                <span>⚙️</span>

                <span class="ml-3">
                    Users
                </span>

            </a>

        </div>

    </nav>

</aside>