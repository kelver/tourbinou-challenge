<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-[360px] bg-white p-10 rounded-lg shadow-lg">
        <div class="w-full flex justify-center mb-6">
            <a href="/">
                <x-application-logo class="fill-current text-gray-500" width="200" />
            </a>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="max-w-sm space-y-3">
                <div class="relative">
                    <label for="email">Usuário</label>
                    <input type="email" name="email" id="email"
                        class="peer py-3 px-4 ps-2 block w-full bg-gray-100 border-transparent
                        rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
                        disabled:pointer-events-none" placeholder="usuario@email.com">
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>

                <div class="relative">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password"
                        class="peer py-3 px-4 ps-2 block w-full bg-gray-100 border-transparent
                        rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
                        disabled:pointer-events-none" placeholder="********">
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                            <circle cx="16.5" cy="7.5" r=".5"></circle>
                        </svg>
                    </div>
                </div>

                <div class="w-full flex relative justify-center">
                    <button type="submit" class="w-1/3 mt-3 py-3 bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
