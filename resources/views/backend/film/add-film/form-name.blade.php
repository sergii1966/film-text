@section('form-name')
    <form id="edit-name-film-admin" action="{{ route('add-name-film-backend') }}" method="POST" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="id" value="{{ $model->id ?? null }}">
        <div class="mb-1">
            <label for="name" class="block text-lg font-medium text-gray-900 dark:text-white">{{ __('Назва') }}</label>
            <input type="text" id="name" name="name" value="{{ $model->name ?? null }}"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder=""/>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

         <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
@endsection
