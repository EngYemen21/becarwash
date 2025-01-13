<x-layout>
    @section('title','اتصل بنا')


    <div class="contact-section">


        <div class="contact-container">
            <!-- القسم الأيسر -->

            <div class="contact-info">
                <div class="contact-info-card">
                    <h3>اتصل بنا واجعل سيارتك نظيفة</h3>
                    {{-- <div class="card">
                        <img src="{{ asset('../assets/images/uploads/2022/05/carwash3-contact-pic2.webp')}}"  alt="جون سميث">
                        <h4>جون سميث</h4>
                        <p>مركز الدعم</p>
                        <hr>
                        <p class="phone">+61 (0) 383 766 284</p>
                        <p class="email">noreply@envato.com</p>
                    </div> --}}
                </div>


                <div class="address">
                    <div>
                        <h4>العنوان</h4>
                        <p class="address-info">الطابق 13، 2 شارع إليزابيث، ملبورن، فيكتوريا 3000، أستراليا</p>
                    </div>
                    <div>
                        <h4>ساعات العمل</h4>
                        <p>الإثنين – الجمعة: 06:00 صباحًا – 10:00 مساءً</p>
                        <p>السبت – الأحد: 08:00 صباحًا – 08:00 مساءً</p>
                    </div>


                </div>
            </div>
            <!-- القسم الأيمن -->
            <div class="contact-form">
                <h3>هل لديك أي أسئلة؟</h3>
                <form>
                    <input type="text" placeholder="اسمك" required>
                    <input type="email" placeholder="بريدك الإلكتروني" required>
                    <input type="text" placeholder="الموضوع" required>
                    <textarea placeholder="الرسالة" rows="4" required></textarea>
                    <button type="submit">إرسال الرسالة</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>
