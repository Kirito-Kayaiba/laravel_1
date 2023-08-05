<pre><code><x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, có thể bạn xác minh địa chỉ email của mình bằng cách nhấp vào liên kết mà chúng tôi vừa gửi đến bạn? Nếu bạn không nhận được email, chúng tôi sẽ gửi cho bạn một liên kết khác.') }}
    </div>

    @if (session('status') == 'erification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email mà bạn cung cấp trong quá trình đăng ký.') }}
        </div>
            @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Gửi lại email xác minh') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Đăng xuất') }}
            </button>
        </form>
    </div>
</x-guest-layout></code></pre>
