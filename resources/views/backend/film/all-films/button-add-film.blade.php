@section('button-add-film')
    <div class="text-center">
        <a href="{{ route('add-film-backend') }}"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-md mt-4 px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Додати новий фільм') }}</a>
    </div>
@endsection
