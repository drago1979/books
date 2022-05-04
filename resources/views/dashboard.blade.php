<x-app-layout>
    <div class="py-12">
        <div class="flex flex-col justify-center items-center text-center max-w-7xl mx-auto">
            <div
                class="w-5/6 bg-white border-b border-gray-200 overflow-hidden text-center shadow-sm sm:rounded-lg p-6">
                You're logged in!
            </div>

            @can('file-upload')
                <h4 class="text-center mt-6 mb-4">
                    And you are very, very welcome</br>
                    our MIGHTY administrator.</h4>
            @endcan

            @if (session('status'))
                <div
                    class="w-3/6 bg-white border border-4 border-green-900 text-green-900 overflow-hidden text-center shadow-sm sm:rounded-lg p-6">
                    {{ session('status') }}
                </div>
            @endif

            @can('file-upload')
                <a href='{{ route('upload_file') }}'
                   class="text-red-600 hover:underline mt-6"
                >
                    Click to import file with books....
                </a>
            @else
                <h4 class="text-center my-5">And you are welcome.</h4>
                <p class="mt-6">(Not as much as you would be if you were
                    administrator.)</p>

                <p class="mt-6 mb-4">We are sorry but you can do nothing here <br>since you are just a member.</p>
                <p class="mt-6 mb-4"> The only option is to target API endpoints ;)</p>
            @endcan


        </div>
    </div>
</x-app-layout>
