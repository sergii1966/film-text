@section('edit-poster-film')
    @if(($model ?? null) && $model->poster)
        <div id="edit-poster" class="mt-6 p-1 items-center max-w-screen-xl mx-auto">
                <div class="mb-2 grid grid-cols-1 lg:grid-cols-12 gap-2">
                    <div class="col-span-2 border">
                        <img class="img-fluid" style="max-height: 200px;"
                             src="{!! $model->poster->url_sm !!}" alt="">
                    </div>
                    <div class="col-span-5 flex flex-col justify-center text-center border">
                        <p class="my-3 p-0">{{ $model->poster->url_sm }}</p>
                        <p class="my-3 p-0">{{ $model->poster->url_lg }}</p>
                    </div>
                    <div class="col-span-1 flex flex-col justify-center text-center border">
                        <p class="my-1 p-0">{{ $model->poster->width_sm }} x {{$model->poster->height_sm}}</p>
                        <p class="my-1 p-0">{{ $model->poster->width_lg }} x {{$model->poster->height_lg}}</p>
                    </div>
{{--                    <div class="col-span-2 flex flex-col justify-center text-center border">--}}
{{--                        <form id="edit-poster-film" method="POST"--}}
{{--                              action="{{ route('edit-poster-film-backend') }}">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="film_id" value="{{ $model->id ?? null }}"/>--}}
{{--                            <input type="hidden" name="id" value="{{ $model->poster->id ?? null }}"/>--}}

{{--                            <div class="flex justify-around mb-2">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <input @if(!$model->poster->status) checked @endif id="status-poster-1"--}}
{{--                                           type="radio" value="0" name="status"--}}
{{--                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">--}}
{{--                                    <label for="status-poster-1"--}}
{{--                                           class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ні</label>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <input @if($model->poster->status == 1) checked @endif id="status-poster-2"--}}
{{--                                           type="radio" value="1" name="status"--}}
{{--                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">--}}
{{--                                    <label for="status-poster-2"--}}
{{--                                           class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Активне</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button type="submit"--}}
{{--                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">--}}
{{--                                {{ __('Зберегти') }}--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <div class="col-span-2 flex flex-col justify-center text-center border">
                        <form id="del-poster-film" method="POST"
                              action="{{ route('del-poster-film-backend') }}">
                            @csrf
                            <input type="hidden" name="film_id" value="{{ $model->id ?? null }}"/>
                            <input type="hidden" name="id" value="{{ $model->poster->id ?? null }}"/>
                            <input type="hidden" name="path_lg" value="{{ $model->poster->path_lg ?? null }}"/>
                            <input type="hidden" name="path_sm" value="{{ $model->poster->path_sm ?? null }}"/>
                            <button type="submit"
                                    class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('Видапити') }}
                            </button>
                            @error('film_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>
        </div>>
    @else
{{--        <div class="my-6 p-1 items-center max-w-screen-xl mx-auto">--}}
{{--            <p class="text-red-700 text-2xl text-center">{{ __('Пусто') }}</p>--}}
{{--        </div>--}}
    @endif
@endsection
