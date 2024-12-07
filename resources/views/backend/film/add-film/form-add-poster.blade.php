@section('form-add-poster')
    @if(($model->id ?? null) && !($model->poster ?? null))
    <form id="edit-poster" enctype='multipart/form-data' method="POST" action="{{ route('add-poster-film-backend') }}" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="film_id" value="{{ $model->id ?? null }}">
        <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" for="poster-film">{{ __('Додати зображення') }}</label>
        <input
            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="poster_help" id="poster-film" name="poster" type="file">
        <div class="mt-1 mb-3 text-sm text-gray-500 dark:text-gray-300" id="poster_help">A profile picture is useful to
            confirm your are logged into your account
        </div>
        @error('poster')
        <p class="text-center text-red-700">{{ $message }}</p>
        @enderror
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
    @endif
@endsection
