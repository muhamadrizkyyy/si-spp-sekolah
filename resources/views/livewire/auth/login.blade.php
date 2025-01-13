<div>
    <section
        class="flex flex-col items-center justify-center h-screen px-7 {{ isset($pages) ? 'bg-gradient-to-r from-myBlueOcean to-mySkyBlue' : '' }}">

        @if (session('status') == 'error')
            <div class="flex items-center p-4 mb-4 bg-red-100 text-sm text-red-800 border border-red-300 rounded-2xl dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Alert!</span> {{ session('message') }}
                </div>
            </div>
        @endif

        <div
            class="loginField block shadow-lg p-6 w-full md:w-[35vw] bg-gradient-to-r from-myBlueOcean to-mySkyBlue rounded-3xl shado">
            <form wire:submit.prevent='login'>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-white">
                        Email
                    </label>
                    <input type="email" id="email" wire:model='email'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" />
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                    <input type="password" id="password" wire:model='password'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" />
                </div>
                {{-- <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                        required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-300">I agree with the
                    <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                        conditions</a>.</label>
            </div> --}}
                <button type="submit"
                    class="text-white bg-myBlue hover:bg-myNavy focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>
    </section>
</div>
