<x-app-layout>

    <div class="flex flex-col justify-center items-center max-w-7xl mx-auto py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center p-6 bg-white border-b border-gray-200">
                File successfully uploaded.<br>
                What do you want to do now?
            </div>
        </div>

        <div class="bg-gray-100 shadow-md rounded pt-6 pb-8 mt-3 mb-3 px-4">
            <div class="text-center p-6 bg-white border-b border-gray-200">
                File successfully uploaded.<br>
                What do you want to do now?
            </div>

            <a class="bg-gray-100 border border-solid border-gray-600 hover:text-gray-400 focus:outline-none px-4"
               href="">
                Upload new file.
            </a>

            <a href="">Go to dashboard.</a>

        </div>

        <form class="bg-gray-100 shadow-md rounded pt-6 pb-8 mt-3 mb-3 px-4"
              action="{{ route('store_file') }}"
              method="post"
              enctype="multipart/form-data">
            @csrf

            <input type="file"
                   name="fileToUpload"
                   class="rounded-md focus:shadow-outline hover:text-gray-400"
            >

            <button
                class="bg-gray-100 border border-solid border-gray-600 hover:text-gray-400 focus:outline-none px-4"
                type="submit">
                Submit
            </button>
        </form>

        @if ($errors->any())
            <div
                class="bg-white overflow-hidden shadow-sm rounded-lg text-center text-red-900 p-6 bg-white border border-red-900 rounded-lg">
                <ul>
                    <li>ERROR !!!</li>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center p-6 bg-white border-b border-gray-200">
                <a href="{{ route('dashboard') }}">Or...You can GO BACK<br>where you were</a>
            </div>
        </div>

    </div>
</x-app-layout>
