<x-layout>
    @section('title', 'الخدمات')

    <div id="" role="main">
        <div class="">
            <div class="" style="">
                <div class="">
                    <div class="container-header">
                        <div class="text-content">
                            <h2>نحن نقدم خدمات عالية الجودة</h2>
                            <h5>
                                نحن هنا لنقدم لك أفضل خدمات غسيل السيارات. استمتع بتجربة لا مثيل لها مع فريقنا المدرب.
                            </h5>
                            <div>
                                <div>
                                    <a href="#" class="btn">أظهر لي الخدمات</a>
                                </div>
                                <div>
                                    <img width="50px" height="50px" src="{{ asset('../assets/images/uploads/2022/05/carwash3-arrow1.svg')}}" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-services-pic1.webp')}}" alt="صورة سيارة">
                        </div>
                    </div>

                    <div class="service-container">
                        <div class="service-card">
                            <div class="services-images-svg-card">
                                <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-icon1.svg')}}" alt="أيقونة التنظيف">
                            </div>
                            {{-- <div class="service-image">
                                <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-offer-pic3.webp')}}" alt="أيقونة التنظيف">
                            </div> --}}
                            <div class="service-content">
                                {{-- <p class="service-number">01</p> --}}
                                <h3>تنظيف</h3>
                                <p>
                                    نحن نقدم خدمات تنظيف شاملة تضمن لك الحصول على سيارة نظيفة تمامًا.
                                    يتمتع فريقنا بالخبرة اللازمة لتقديم أفضل النتائج.
                                </p>
                            </div>
                        </div>

                        <div class="service-card">
                            <div class="services-images-svg-card">
                                <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-icon3.svg')}}" alt="أيقونة الغسيل">
                            </div>
                            {{-- <div class="service-image">
                                <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-offer-pic4.webp')}}" alt="أيقونة الغسيل">
                            </div> --}}
                            <div class="service-content">
                                {{-- <p class="service-number">02</p> --}}
                                <h3>غسيل</h3>
                                <p>
                                    نقدم لك خدمة غسيل سيارات فاخرة باستخدام أفضل المنتجات.
                                    نضمن لك أن سيارتك ستبدو كالجديدة بعد الخدمة.
                                </p>
                            </div>
                        </div>

                        <div class="service-card">
                            <div class="services-images-svg-card">
                                <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-icon4.svg')}}" alt="أيقونة الغسيل">
                            </div>
                            {{-- <div class="service-image">
                                <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-offer-pic5.webp')}}" alt="أيقونة الغسيل">
                            </div> --}}
                            <div class="service-content">
                                {{-- <p class="service-number">03</p> --}}
                                <h3>غسيل شامل</h3>
                                <p>
                                    نقدم لك خدمة غسيل شامل تتضمن كل جوانب السيارة.
                                    نستخدم تقنيات حديثة لضمان أفضل النتائج.
                                </p>
                            </div>
                        </div>

                        <div class="service-card">
                            <div class="services-images-svg-card">
                                <img wire: src="{{ asset('../assets/images/uploads/2022/05/carwash3-icon2.svg')}}" alt="أيقونة الغسيل">
                            </div>
                            {{-- <div class="service-image">
                                <img wire: src="{{ asset('../assets/images/uploads/2022/05/carwash3-offer-pic6.webp')}}" alt="أيقونة الغسيل">
                            </div> --}}
                            <div class="service-content">
                                {{-- <p class="service-number">04</p> --}}
                                <h3>غسيل داخلي</h3>
                                <p>
                                    خدمات الغسيل الداخلي تشمل تنظيف المقصورة بشكل كامل.
                                    نستخدم معدات مهنية لضمان الجودة.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-price">
                <div class="continar-pricing">
                    <div class="">
                        <h6 class="title_price">غسيل سيارات</h6>
                    </div>
                    <div>
                        <h2 class="desc_price">استمتع بخدمات غسيل سيارات عالية الجودة.</h2>
                    </div>
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


                {{-- <div class="card-featuers pricing-container">
                    <div class="pricing-card basic">
                        <h4>أساسي</h4>
                        <p class="price">12$</p>
                        <ul>
                            <li><input type="checkbox" checked disabled> غسيل خارجي</li>
                            <li><input type="checkbox" disabled> تنظيف بالمكنسة</li>
                            <li><input type="checkbox" disabled> تنظيف داخلي رطب</li>
                            <li><input type="checkbox" disabled> مسح النوافذ</li>
                        </ul>
                        <div class="button_order"> <a>اطلب الآن</a></div>
                    </div>

                    <div class="card-featuers pricing-card basic-cleaning">
                        <h4>تنظيف أساسي</h4>
                        <p class="price">24$</p>
                        <ul>
                            <li><input type="checkbox" checked disabled> غسيل خارجي</li>
                            <li><input type="checkbox" checked disabled> تنظيف بالمكنسة</li>
                            <li><input type="checkbox" disabled> تنظيف داخلي رطب</li>
                            <li><input type="checkbox" disabled> مسح النوافذ</li>
                        </ul>
                        <div class="button_order"> <a>اطلب الآن</a></div>
                    </div>

                    <div class="card-featuers pricing-card premium-wash">
                        <h4>غسيل ممتاز</h4>
                        <p class="price">30$</p>
                        <ul>
                            <li><input type="checkbox" checked disabled> غسيل خارجي</li>
                            <li><input type="checkbox" checked disabled> تنظيف بالمكنسة</li>
                            <li><input type="checkbox" checked disabled> تنظيف داخلي رطب</li>
                            <li><input type="checkbox" disabled> مسح النوافذ</li>
                        </ul>
                        <div class="button_order"> <a>اطلب الآن</a></div>
                    </div>

                    <div class="card-featuers pricing-card premium-plus">
                        <h4>ممتاز+</h4>
                        <p class="price">59$</p>
                        <ul>
                            <li><input type="checkbox" checked disabled> غسيل خارجي</li>
                            <li><input type="checkbox" checked disabled> تنظيف بالمكنسة</li>
                            <li><input type="checkbox" checked disabled> تنظيف داخلي رطب</li>
                            <li><input type="checkbox" checked disabled> مسح النوافذ</li>
                        </ul>
                        <div class="button_order "> <a>اطلب الآن</a></div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</x-layout>
