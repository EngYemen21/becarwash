<x-layout>
    @section('title','الرئيسية')

    <div>
        <div class="section_Works">
            <!-- <h2 class="title-main-work">work</h2> -->
            <div class="main_work">
                <div class="hero_works">
                    <div class="">
                        <h3 class="title-question">شاهد ما يمكننا تقديمه لك</h3>
                    </div>
                    <div>
                        <p class="desc_work">نحرص على تقديم أفضل الخدمات باهتمام بالتفاصيل. فريقنا مدرب بشكل احترافي لضمان رضاك التام.</p>
                    </div>
                    <div class="arrow_services">
                        <div>
                            <a href="#" class="show_service">عرض الخدمات</a>
                        </div>
                        <div>
                            <img width="50px" height="50px" src="{{ asset('../assets/images/uploads/2022/05/carwash3-arrow1.svg')}}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="work_image_header">
                    <div class="work_image">
                        <img class="work_image_be"
                        src="{{ asset('../assets/images/uploads/2022/05/carwash3-beforeafter-pic2.webp')}}" alt="قبل الغسيل">
                    </div>
                    <div class="work_image">
                        <img class="work_image_aft"
                        src="{{ asset('../assets/images/uploads/2022/05/carwash3-beforeafter-pic1.webp')}}" alt="بعد الغسيل">
                    </div>
                </div>
            </div>
        </div>
        <div class="section-work-background">
            <div class="section_body_work">
                <div class="content_work">
                    <div class="step_image_work">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-num1.svg')}}"  alt="">
                    </div>
                    <div>
                        <h3 class="title_step">التنظيف الأولي</h3>
                    </div>
                    <div>
                        <p class="desc_step">نزيل الأتربة والأوساخ بعناية فائقة.</p>
                    </div>
                </div>
                <div class="content_work">
                    <div class="step_image_work">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-num2.svg')}}" alt="">
                    </div>
                    <div>
                        <h3 class="title_step">الغسيل الشامل</h3>
                    </div>
                    <div>
                        <p class="desc_step">نستخدم أفضل المواد لتنظيف سيارتك بعمق.</p>
                    </div>
                </div>
                <div class="content_work">
                    <div class="step_image_work">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-num3.svg')}}"   alt="">
                    </div>
                    <div>
                        <h3 class="title_step">التلميع </h3>
                    </div>
                    <div>
                        <p class="desc_step">نعيد لسيارتك بريقها ولمعانها.</p>
                    </div>
                </div>

            </div>
            <div class="section_works_images">
                <div class="group_image">
                    <div class="image_groub_one">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-works-pic1.webp')}}"   src="../wp-content/uploads/2022/05/carwash3-works-pic1.webp" alt="صورة 1">
                        <p>نقدم خدمات عالية الجودة باهتمام بالتفاصيل.</p>

                    </div>
                    <div class="image_groub_one">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-works-pic2.webp')}}" alt="صورة 2">
                        <p>فريقنا مدرب بشكل احترافي لضمان رضاك التام.</p>
                    </div>
                    <div class="image_groub_one">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-works-pic3.webp')}}"   alt="صورة 3">
                        <p>نستخدم أفضل المواد والأدوات الآمنة لسيارتك.</p>
                    </div>
                    <div class="image_groub_one">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-works-pic4.webp')}}" alt="صورة 4">
                        <p>نحرص على تقديم أفضل الخدمات بسرعة وكفاءة.</p>
                    </div>
                    <div class="image_groub_one">
                        <img   src="{{ asset('../assets/images/uploads/2022/05/carwash3-works-pic5.webp')}}" alt="صورة 5">
                        <p>نضمن لك تجربة غسيل سيارات مميزة.</p>
                    </div>
                    <div class="image_groub_one">
                        <img   src="{{ asset('../assets/images/uploads/2022/05/carwash3-offer-pic4.webp')}}"
                        alt="صورة 6">
                        <p>نقدم خدمات متكاملة لتنظيف وتلميع سيارتك.</p>
                    </div>

                </div>

            </div>
        </div>

    </div>

</x-layout>
