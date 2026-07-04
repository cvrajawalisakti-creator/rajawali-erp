<header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-8">

    <div>

        <h1 class="text-xl font-bold text-slate-800">
            Rajawali Sakti Information System
        </h1>

    </div>

    <div class="flex items-center gap-4">

        <div class="text-right">

            <div class="font-semibold text-slate-700">
                {{ Auth::user()->name }}
            </div>

            <div class="text-xs text-slate-400">
                Administrator
            </div>

        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600">
                Logout
            </button>

        </form>

    </div>

</header>