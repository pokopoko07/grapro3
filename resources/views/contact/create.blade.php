{{-- <x-guest-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl text-white font-semibold hover:underline cursor-pointer">
            お問い合わせ
        </h1>
        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-message :message="session('message')" />
    </x-slot>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-screen">
            <div class="mx-4 sm:p-8">


                <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label for="title" class="font-semibold leading-none mt-4">件名</label>
                            <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" value="{{old('title')}}" placeholder="Enter Title">
                        </div>
                    </div>
    
                    <div class="w-full flex flex-col">
                        <label for="body" class="font-semibold leading-none mt-4">本文</label>
                        <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                    </div>

                    <div class="md:flex items-center">
                        <div class="w-full flex flex-col">
                            <label for="email" class="font-semibold leading-none mt-4">メールアドレス</label>
                            <input type="text" name="email" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="email" value="{{old('email')}}" placeholder="Enter Email">
                        </div>
                    </div>
                    <x-primary-button class="mt-4">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>
</x-app-layout>
{{-- </x-guest-layout> --}}