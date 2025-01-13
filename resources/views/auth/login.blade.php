<x-layout>
    <style>
       body {
            background-color: #f9f9f9;
        }
        .box-shadow {
            background-color: #fcfcfc;
            box-shadow: 0px 20px 27px rgba(35, 93, 99, 0.04),
                        0px -1px 3px rgba(35, 93, 99, 0.08);
        }
    </style>

    <div class="block w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 w-full h-full">
            <div class="bg-[#1c3aa4] sm:col-span-12 hidden lg:col-span-4 lg:flex items-center justify-end relative">
                <div class="w-full mr-10 mt-[25px] grid hidden lg:block px-5">
                    <h1 class="font-semibold lg:text-5xl xl:text-6xl text-right"><span class="title-color">تسجيل</span> <span class="text-white">الدخول</span></h1>
                    <p class="text-lg mt-5 text-white text-right">
                        مرحبًا بك في خدمة تسجيل الدخول.
                    </p>
                </div>
            </div>

            <div class="sm:col-span-12 lg:col-span-8 flex flex-wrap items-start lg:items-center justify-center sm:mt-16 lg:mt-0">
                <div class="border-1 w-full border-gray-200 box-shadow sm:w-full lg:max-w-lg h-auto rounded-2xl px-8 mx-10 mb-10 pt-7 pb-8">
                    <div class="text-2xl font-bold text-center text-primary">تسجيل الدخول</div>

                    <form class="mt-6" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="flex-column">
                            <label>البريد الإلكتروني</label>
                        </div>
                        <div class="inputForm">
                            <svg class="m-2" height="20px" width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="2" fill="none">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <input type="text" name="email" id="email" class=" input form-control" placeholder="أدخل بريدك الإلكتروني">
                        </div>
                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="flex-column">
                            <label>كلمة المرور</label>
                        </div>
                        <div class="inputForm">
                            <svg class="m-2" fill="#000000" height="20px" width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                            <input type="password" name="password" id='password' class="input form-control" placeholder="أدخل كلمة المرور">
                        </div>
                        @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="flex-row">
                            <div>
                                <input type="checkbox">
                                <label>تذكرني</label>
                            </div>
                            <span class="span">نسيت كلمة المرور؟</span>
                        </div>

                        <button type="submit" class="button-submit bg-[#1c3aa4]">تسجيل الدخول</button>
                        <p class="p">ليس لديك حساب؟ <span class="span">سجل الآن</span></p>
                        <p class="p line">أو باستخدام</p>

                        <div class="flex-row">
                            <button class="btn google">
                                Google
                            </button>
                            <button class="btn apple">
                                Apple
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
