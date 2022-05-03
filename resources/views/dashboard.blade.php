<x-app-layout>
    <div class="py-12">
        <div class="text-center max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>

            @can('file-upload')
                <h4 class="text-center mt-6 mb-4">
                    And you are very, very welcome</br>
                    our MIGHTY administrator.</h4>

                <a href='{{ route('upload_file') }}'
                   class="text-red-600 mt-6"
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
