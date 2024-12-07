@section('form-category')
    @if(($model->id ?? null) && $categories)
        <?php $arr= $model->categories->pluck('id')->toArray() ?>
        <div class="flex justify-center mb-2">
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Жанр</h3>
        </div>
        <form action="{{ route('add-category-film-backend') }}" method="POST" class="max-w-lg mx-auto mb-6">
            @csrf
            <input type="hidden" name="film_id" value="{{ $model->id ?? null }}">
        <div class="flex justify-center mb-2">
            <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach($categories as $category)
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input @if(in_array($category->id, $arr)) checked  @endif id="checkbox-{{ $category->id }}" name="category[]"  type="checkbox" value="{{ $category->id }}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-{{ $category->id }}"
                                   class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}
                                </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('Відправити') }}
            </button>
        </form>
    @endif
@endsection
