<x-layout>
    <style>
        /* تنسيقات عامة */
        .strength-container-dark {
            /* background-color: #1a1a1a; خلفية داكنة */
            padding: 3rem 1rem;
            text-align: center;
            font-family: Arial, sans-serif;
            color: #ffffff;
            /* لون النص الأبيض */
        }

        .strength-title-dark {
            font-size: 1.75rem;
            color: #ffffff;
            /* لون العنوان الأبيض */
            margin-bottom: 1rem;
        }

        .strength-description-dark {
            font-size: 1rem;
            color: #dde0e4;
            /* لون النص الثانوي */
            margin-bottom: 2rem;
        }

        .strength-grid-dark {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .strength-left-dark,
        .strength-right-dark {
            flex: 1;
            max-width: 300px;
        }

        .strength-center-dark {
            flex: 1;
            max-width: 275px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .center-image-dark {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            /* ظل داكن للصورة */
        }

        .strength-card-dark {
            /* background-color: #2d3748; خلفية داكنة للبطاقة */
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            /* ظل داكن للبطاقة */
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .card-header-dark {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .card-number-dark {
            font-size: 1.5rem;
            font-weight: bold;
            color: #63b3ed;
            /* لون الرقم الأزرق */
        }

        .card-icon-dark img {
            width: 40px;
            height: 40px;
            filter: brightness(0) invert(1);
            /* تغيير لون الأيقونة إلى الأبيض */
        }

        .card-title-dark {
            font-size: 1.25rem;
            color: #ffffff;
            /* لون العنوان الأبيض */
            margin-bottom: 0.5rem;
        }

        .card-description-dark {
            font-size: 0.875rem;
            color: #a0aec0;
            /* لون النص الثانوي */
        }

        /* التصميم المتجاوب */
        @media (max-width: 768px) {
            .strength-grid-dark {
                flex-direction: row;

                align-items: center;
            }


            .strength-left-dark,
            .strength-right-dark,
            .strength-center-dark {
                max-width: 100%;
            }



            .center-image-dark {
                width: 60%;

            }

            .strength-card-dark {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 580px) {
            .strength-grid-dark {
                flex-direction: column;

                align-items: center;
            }

        }
    </style>
    @section('title','Home')
    <div class="Wrapper">
        <div class="background-hero">
            <div class="hero">
                <div class="hero-left-side">
                    <h2 class="">
                        نحن هنا لنجعل سيارتك تلمع!
                        <span>غسيل سيارات احترافي</span>
                    </h2>
                    <!-- <h2>
						Carwash
					</h2> -->
                    <div>
                        <a href="">تعرف على التفاصيل</a>
                    </div>
                </div>
                <div class="hero-right-side">

                    <div class="hero-info-contact">
                        <p class="book-appointment">لا تتردد في الاتصال لحجز موعد</p>
                        <p class="number-appointment">+967 779 475 324</p>
                        <p class="date-appointment">مواعيد العمل: من الإثنين إلى الجمعة، 8 صباحًا حتى 5 مساءً</p>
                    </div>
                    <div class="hero-photo-contact">
                        <img src="{{ asset('assets/images/uploads/2022/05/carwash3-about-pic2.webp')}}" alt=""
                            class="tp-rs-img rs-lazyload" width="223" height="223" />
                    </div>
                </div>
            </div>
        </div>


        <div class="step-contianer">
            <div class="step-operation">
                <div class="line">
                    <p><span>01</span>&nbsp;التنظيف</p>
                </div>
                <div class="line">
                    <p><span>02</span>&nbsp; الغسيل</p>
                </div>
                <div class="line">
                    <p><span>03</span>&nbsp;التلميع</p>
                </div>
                <div class="line">
                    <p><span>04</span>&nbsp;الطلاء الواقي</p>
                </div>

            </div>

        </div>
        <div class="contianer">
            <div class="main-over">
                <div class="talking-yesrs">
                    <div>
                        <h3 class="text-center lg:text-start text-[#ffffff] text-2xl lg:text-[32px] leading-normal font-extrabold">
                            لأكثر من 20 عامًا، كنا نعتني بسياراتكم
                        </h3>
                    </div>
                    <div>
                        <h5 class="text-center lg:text-right text-[#fcfcfc] text-base lg:text-lg leading-normal lg:leading-normal py-2">نحن نقدم أفضل الخدمات بجودة عالية.
                        </h5>
                        <p class="text-center lg:text-start text-[#fcfcfc] text-base lg:text-lg leading-[180%]">نحرص على تقديم خدمات غسيل وتلميع السيارات بأعلى معايير
                            الجودة.
                            نستخدم أحدث التقنيات والمواد الآمنة لضمان حصولك على أفضل النتائج. فريقنا مدرب بشكل احترافي
                            لضمان رضاك التام.
                        </p>
                    </div>
                    <div class="aboutUS-talking-yesrs">
                        <div class="link-talking-yesrs">
                            <a href="">تعرف علينا</a>
                        </div>
                        <div class="check-feedback">
                            <div>
                                <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon7.svg')}}" alt="">
                            </div>
                            <div>
                                <label>
                                    اطلع على آراء <br>
                                    العملاء الراضين
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="protection">
                    <div class="protection-auth-image">
                        <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon6.svg')}}" alt="">
                    </div>
                    <div class="protection-anmation-image">
                        <img src="{{ asset('assets/images/uploads/2022/05/carwash3-home-pic1.svg')}}" alt="">
                    </div>
                    <div class="number-protection">
                        <p>100% <br>
                            حماية للسيارة</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="strength-container-dark">
            <h4 class="strength-title-dark">قوتنا تكمن في اهتمامنا بالتفاصيل</h4>
            <p class="strength-description-dark">
                نحرص على كل تفصيل صغير لضمان حصولك على أفضل خدمة ممكنة. جودة عملنا هي ما يميزنا.
            </p>
            <div class="strength-grid-dark">
                <!-- الجزء الأيسر -->
                <div class="strength-left-dark">
                    <div class="strength-card-dark">
                        <div class="card-header-dark">
                            <p class="card-number-dark">01</p>
                            <div class="card-icon-dark">
                                <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon3.svg')}}" alt="تنظيف" />
                            </div>
                        </div>
                        <h3 class="card-title-dark">التنظيف</h3>
                        <p class="card-description-dark">نزيل الأتربة والأوساخ بعناية فائقة.</p>
                    </div>

                    <div class="strength-card-dark">
                        <div class="card-header-dark">
                            <p class="card-number-dark">02</p>
                            <div class="card-icon-dark">
                                <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon3.svg')}}" alt="غسيل" />
                            </div>
                        </div>
                        <h3 class="card-title-dark">الغسيل</h3>
                        <p class="card-description-dark">نستخدم أفضل المواد لتنظيف سيارتك بعمق.</p>
                    </div>
                </div>

                <!-- الجزء الأوسط (الصورة) -->
                <div class="strength-center-dark">
                    <img src="{{ asset('assets/images/uploads/2022/05/carwash3-services-pic1.webp')}}" alt="سيارة"
                        class="center-image-dark" />
                </div>

                <!-- الجزء الأيمن -->
                <div class="strength-right-dark">
                    <div class="strength-card-dark">
                        <div class="card-header-dark">
                            <p class="card-number-dark">03</p>
                            <div class="card-icon-dark">
                                <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon3.svg')}}" alt="تلميع" />
                            </div>
                        </div>
                        <h3 class="card-title-dark">التلميع</h3>
                        <p class="card-description-dark">نعيد لسيارتك بريقها ولمعانها.</p>
                    </div>

                    <div class="strength-card-dark">
                        <div class="card-header-dark">
                            <p class="card-number-dark">04</p>
                            <div class="card-icon-dark">
                                <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon3.svg')}}"
                                    alt="طلاء واقي" />
                            </div>
                        </div>
                        <h3 class="card-title-dark">الطلاء الواقي</h3>
                        <p class="card-description-dark">نحمي سيارتك بطبقة واقية عالية الجودة.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="contianer"> -->
    </div>

    {{-- <div class="main_Works">
        <div class="main_see_works">
            <div class="">
                <h2 class="title-main-work">BECARWASH</h2>
            </div>
            <div>
                <h3 class="title-main-question">شاهد ما يمكننا تقديمه لك</h3>
            </div>
            <div class="button-main-work">
                <a href="/">أعمالنا</a>

            </div>

        </div>
        <div class="main_image_beforeAfter_clean">
            <img class="main_image_before_clean"
                src="{{ asset('assets/images/uploads/2022/05/carwash3-beforeafter-pic2.webp')}}" alt="" />
            <img class="main_image_after_clean"
                src="{{ asset('assets/images/uploads/2022/05/carwash3-beforeafter-pic1.webp')}}" alt="" />
        </div>

    </div> --}}
    <!-- </div> -->

    <div class="section section-main">
        <div class="Wrapper">
            <div class="container-customer-info">
                <div class="customer-info">
                    <div>
                        <div class="customer-count">
                            <div class="customer-image-count">
                                <img src="{{ asset('assets/images/uploads/2022/05/carwash3-home-pic3.svg')}}"
                                    alt="carwash3-home-pic3" />
                            </div>
                            <div>
                                <p class="count">1300</p>
                            </div>
                        </div>
                        <div>

                            <span class="label">عملاء راضين</span>

                        </div>

                    </div>

                    <div class="customer-image">
                        <img src="{{ asset('assets/images/uploads/2022/05/carwash3-home-pic2.webp')}}" width="300px"
                            height="300px" alt="صورة العميل" />
                    </div>
                    <div class="quote">
                        <div class="quote-image">
                            <img src="{{ asset('assets/images/uploads/2022/05/carwash3-icon5.svg')}}"
                                alt="صورة العميل" />
                        </div>
                        <div class="quote-desc">
                            <p>
                                "نحن نقدم خدمات عالية الجودة باهتمام بالتفاصيل. رضا العملاء هو أولويتنا دائمًا."
                            </p>
                            <div class="writer">
                                <span class="author">إحمد حسن، 33 عامًا</span>
                            </div>
                        </div>



                    </div>
                </div>

            </div>

            <div class="main-featuers">
                <div class="flex flex-col items-center p-2 text-center">
                    <h2 class="text-[#333745] text-center text-2xl lg:text-[32px] leading-normal font-extrabold mb-2">
                        قوتنا تكمن في اهتمامنا بالتفاصيل</h2>

                    <p class="text-[#5B5F6D] text-base text-center lg:text-lg leading-[180%]">
                        نحرص على كل تفصيل صغير لضمان حصولك على أفضل خدمة ممكنة. جودة عملنا هي ما يميزنا.
                    </p>

                </div>

                <div class="card-featuers pricing-container">
                    @foreach ($packages as $package)
                    <div class="pricing-card {{ Str::slug($package->name) }}">
                        <h4>{{ $package->name }}</h4>
                        <p class="price">${{ $package->price }}</p>
                        <ul>
                            @foreach ($package->services as $service)
                            <li>
                                <input type="checkbox" {{ $service->pivot->is_included ? 'checked disabled' : 'disabled'
                                }}>
                                {{ $service->name }}
                            </li>
                            @endforeach
                        </ul>
                        <div class="button_order">
                            @auth
                            <a href="{{ route('services.show', $package->id) }}">اطلب الآن</a>
                            @else
                            <a href="{{ route('login',['package_id' => $package->id]) }}">اطلب الآن</a>
                            @endauth
                        </div>
                        {{-- <div class="button_order">
                            <a href="{{ route('services.show', $package->id) }}">اطلب الآن</a>
                        </div> --}}
                    </div>
                    @endforeach
                </div>
            </div>


        </div>


    </div>
</x-layout>
