<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            詳細ページ
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">

                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        {{-- 施設名表示 --}}
                        <h1 class="text-3xl text-gray-700 font-semibold hover:underline cursor-pointer">
                            {{-- <a href="{{route('post.show', $post)}}">施設名：{{ $post->title }}</a> --}}
                            {{ $post->title }}
                        </h1>

                        <div class="flex justify-end mt-4">
                            @can('admin')
                            <a href="{{route('post.edit', $post)}}"><x-primary-button class="bg-teal-700 float-right">編集</x-primary-button></a>
                            @endcan
                            @can('admin')
                            <form method="post" action="{{route('post.destroy', $post)}}">
                                @csrf
                                @method('delete')
                                <x-primary-button class="bg-red-700 float-right ml-4" onClick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                            </form>
                            @endcan
                        </div>
                        <hr class="w-full">
                    </div>

                    <div class="container_show m-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{--左側--}}
                        <div class="show_itemL">
                            <div class="container_image m-2 grid grid-cols-2 grid-rows-4 gap-4">
                                <div class="col-span-2 row-span-2">
                                    {{-- main画像表示 --}}
                                    <div class="item1">
                                        @if($post->image_main)
                                            <a href="{{ asset('storage/images/'.$post->image_main)}}"  data-lightbox="group">
                                                <img src="{{ asset('storage/images/'.$post->image_main)}}" class="mx-auto fit_grid rounded-lg">
                                            </a>
                                        @else
                                            <img src="{{ asset('logo/rainbow.jpg')}}" class="mx-auto fit_grid">
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="item3">
                                        @if($post->image_sub1)
                                            <a href="{{ asset('storage/images/'.$post->image_sub1)}}"  data-lightbox="group">
                                                <img src="{{ asset('storage/images/'.$post->image_sub1)}}" class="mx-auto fit_grid rounded-lg">
                                            </a>
                                        @else
                                            <img src="{{ asset('logo/noimage.jpg')}}" class="mx-auto fit_grid">
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="item4">
                                        @if($post->image_sub2)
                                            <a href="{{ asset('storage/images/'.$post->image_sub2)}}"  data-lightbox="group">
                                                <img src="{{ asset('storage/images/'.$post->image_sub2)}}" class="mx-auto fit_grid rounded-lg">
                                            </a>
                                        @else
                                            <img src="{{ asset('logo/sanpo.jpg')}}" class="mx-auto fit_grid">
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="item5">
                                        @if($post->image_sub3)
                                            <a href="{{ asset('storage/images/'.$post->image_sub3)}}"  data-lightbox="group">
                                                <img src="{{ asset('storage/images/'.$post->image_sub3)}}" class="mx-auto fit_grid rounded-lg">
                                            </a>
                                        @else
                                            <img src="{{ asset('logo/tree.jpg')}}" class="mx-auto fit_grid">
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="item6">
                                        @if($post->image_sub4)
                                            <a href="{{ asset('storage/images/'.$post->image_sub4)}}"  data-lightbox="group">
                                                <img src="{{ asset('storage/images/'.$post->image_sub4)}}" class="mx-auto fit_grid rounded-lg">
                                            </a>
                                        @else
                                            <img src="{{ asset('logo/noimageBK.jpg')}}" class="mx-auto fit_grid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--右側--}}
                        <div class="show_itemR md:col-span-2 bg-teal-50 rounded-lg">
                            <div class="container_body m-2 grid grid-cols-3 grid-rows-4 gap-4">
                                    <div class="col-span-3 row-span-3">
                                        <div class="item2">
                                            <p class="mt-4 text-gray-600 py-4">{!! nl2br(e($post->body)) !!}<p> {{--{{$post->body}}</p> --}}
                                            @if($post->hp_adress)
                                            <div class="flex justify-end">
                                                <div class="bg-blue-500 text-white rounded-md w-1/5 text-center drop-shadow-lg hover:bg-sky-700"> {{--text-sm font-semibold flex flex-row-reverse --}}
                                                    <a href="{{ $post->hp_adress }}" target="_blank" rel="noopener noreferrer">To HP</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="item7">
                                            <span class="font-semibold leading-none mt-4">地域：</span>　{{$post->area->area}}<br>
                                
                                            <span class="font-semibold leading-none mt-4">犬：</span>　{{$post->getDogsStr()}}
                                            <div class="text-sm font-semibold flex flex-row-reverse mt-4">
                                                <p> {{ $post->user->name }} </p>
                                                <p>{{$post->created_at->format('Y/m/d H:i:s')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="item8">
                                            <span class="font-semibold leading-none mt-4">施設区分:</span>　{{$post->getFacilityKubun()}}<br>
                                            <span class="font-semibold leading-none mt-4">年代別お勧め度：</span>
                                            <ul class="ml-8">
                                                <li>　幼　　児　：{{$post->getAgeStr($post->infant)}}</li>
                                                <li>小学生低学年：{{$post->getAgeStr($post->lower_grade)}}</li>
                                                <li>小学生高学年：{{$post->getAgeStr($post->higher_grade)}}</li>
                                                <li>中学生以上　：{{$post->getAgeStr($post->over13)}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 前画面に戻る --}}
                <div class="flex justify-end mt-4">
                    <form method="post" action="{{route('post.result_back', $post)}}">
                        @csrf
                        <x-primary-button type="submit" class="bg-teal-700 float-right">前の画面に戻る</x-primary-button>
                        {{-- <x-primary-button class="bg-teal-700 float-right">前の画面に戻る</x-primary-button> --}}
                    </form>
                </div>

                {{-- コメント部分 --}}
                <div class="mt-4 mb-12">
                    <form method="post" action="{{route('comment.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name='post_id' value="{{$post->id}}">
                        <textarea name="body" class="bg-white w-full  rounded-2xl px-4 mt-4 py-4 shadow-lg hover:shadow-2xl transition duration-500" id="body" cols="30" rows="3" placeholder="コメントを入力してください">{{old('body')}}</textarea>
                        <label for="image_comme" class="font-semibold leading-none mt-4">画像 </label>
                        <div>
                            <input id="image_c" type="file" name="image_comme">
                        </div>
                        <x-primary-button class="float-right mr-4 mb-12">コメントする</x-primary-button>
                    </form>
                </div>
                {{-- コメント部分終わり --}}

                {{-- コメント表示 --}}
                {{--コメントを新しい順に表示させるため、連想配列を逆順にする--}}
                @php
                    $po_comme = $post->comments->reverse()->values();
                @endphp
                @foreach ($po_comme as $comment)
                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500 mt-8">
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            @if($comment->image_comme)
                                <a href="{{ asset('storage/images/'.$comment->image_comme)}}"  data-lightbox="group">
                                    <img src="{{ asset('storage/images/'.$comment->image_comme)}}" class="w-full rounded-lg">{{--mx-auto--}}
                                </a>
                            @else
                                <img src="{{ asset('logo/noimage.jpg')}}" class="w-full">
                            @endif
                        </div>
                        <div class="text-left col-span-3">
                            {{$comment->body}}
                        </div>
                    </div>
                    <div class="text-sm font-semibold flex flex-row-reverse">
                        <p> {{ $comment->user->name }} • {{$comment->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>