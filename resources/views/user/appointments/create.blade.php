<x-layout>
    @section('title', 'appointment')

    <div class="p-4 mx-auto bg-white ">
        <div class="flex flex-col gap-6 lg:flex-row">
            <!-- قسم اختيار التاريخ والوقت -->
            <div class="flex-1 p-6 border border-gray-200 rounded-lg shadow-sm">
                <div class="flex-col p-3">
                    <h1 class="mb-3 text-2xl font-bold text-gray-800">أحجز موعد لغسيل سيارتك اونلاين</h1>
                    <p class="text-sm text-gray-600 md:text-md ">أحجز موعدا لغسيل سيارتك أونلاين ! أختر الوقت والموقع المناسب وأدخل معلومات سيارتك لتأكيد الحجز</p>
                </div>
                <h3 class="mt-6 mb-1 font-bold text-blue-600 text-md md:text-xl">اختر التاريخ والوقت</h3>

                <!-- تقويم Flatpickr -->
                <input type="text" id="date-picker" placeholder="اختر التاريخ" class="w-full p-3 transition-colors border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- عرض الأوقات المتاحة -->
                <div id="times-container" class="grid grid-cols-2 gap-4 mt-6 md:grid-cols-3 lg:grid-cols-2">
                    <!-- سيتم عرض التوقيتات المتاحة هنا -->
                </div>
            </div>

            <!-- قسم البحث عن العنوان والخريطة -->
            <div class="flex-1 p-6 border border-gray-200 rounded-lg shadow-sm">
                <h3 class="mt-3 mb-1 font-bold text-blue-600 text-md md:text-xl">حدد موقعك</h3>
                <div class="flex flex-col gap-4">
                    <input type="text" id="address-input" placeholder="أدخل عنوانك" class="w-full p-3 transition-colors border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button id="search-button" class="w-full p-3 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">بحث</button>
                </div>

                <div class="mt-6">
                    <div id="map" class="w-full h-64 rounded-lg"></div>
                </div>
            </div>
        </div>

        <!-- الفورم -->
        <form method="post" action="{{ url('/appointments') }}" class="mt-6" id="booking-form">
            @csrf
            <input type="hidden" name="package_id" id="service_id" value="{{ $package->id }}">
            <input type="hidden" name="user" id="user" value="{{ auth()->user()->id }}">
            <input type="hidden" name="appointment_date" id="appointment_date">
            <input type="hidden" name="appointment_time" id="appointment_time">
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <input type="hidden" name="address" id="address"> <!-- حقل مخفي للعنوان المدمج -->

            <!-- حقول معلومات السيارة -->
            <div class="p-6 mt-6 border border-gray-200 rounded-lg shadow-sm">
                <h3 class="mt-3 mb-3 font-bold text-blue-600 text-md md:text-xl">معلومات السيارة</h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- رقم السيارة -->
                    <div>
                        <label for="car_plate" class="block text-sm font-medium text-gray-700">رقم السيارة</label>
                        <input type="text" name="car_plate" id="car_plate" placeholder="أدخل رقم السيارة" class="w-full p-3 transition-colors border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- لون السيارة -->
                    <div>
                        <label for="car_color" class="block text-sm font-medium text-gray-700">لون السيارة</label>
                        <input type="text" name="car_color" id="car_color" placeholder="أدخل لون السيارة" class="w-full p-3 transition-colors border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- موديل السيارة -->
                    <div>
                        <label for="car_model" class="block text-sm font-medium text-gray-700">موديل السيارة</label>
                        <input type="text" name="car_model" id="car_model" placeholder="أدخل موديل السيارة" class="w-full p-3 transition-colors border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- نوع السيارة -->
                    <div>
                        <label for="car_type" class="block text-sm font-medium text-gray-700">نوع السيارة</label>
                        <select name="car_type" id="car_type" class="w-full p-3 transition-colors border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>اختر نوع السيارة</option>
                            <option value="سيدان">سيدان</option>
                            <option value="SUV">SUV</option>
                            <option value="هايبرد">هايبرد</option>
                            <option value="كهربائية">كهربائية</option>
                            <option value="فان">فان</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- زر الحجز -->
            <button type="submit" class="w-full p-3 text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700 disabled:bg-gray-400" disabled>احجز الموعد</button>
        </form>
    </div>

    <!-- إضافة مكتبة Leaflet CSS و JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- إضافة Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        $(document).ready(function() {
            // تهيئة الخريطة
            var map = L.map('map').setView([24.7136, 46.6753], 13); // إحداثيات الرياض كبداية

            // إضافة طبقة الخريطة
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker;

            // البحث عن العنوان
            $('#search-button').click(function() {
                var address = $('#address-input').val();
                if (address) {
                    searchAddress(address);
                }
            });

            // دالة للبحث عن العنوان باستخدام Nominatim
            function searchAddress(address) {
                $.ajax({
                    url: "https://nominatim.openstreetmap.org/search",
                    method: 'GET',
                    data: {
                        q: address,
                        format: 'json',
                        limit: 1
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            var lat = parseFloat(response[0].lat);
                            var lon = parseFloat(response[0].lon);

                            // نقل الخريطة إلى الموقع الجديد
                            map.setView([lat, lon], 13);

                            // إزالة العلامة السابقة إذا كانت موجودة
                            if (marker) {
                                map.removeLayer(marker);
                            }

                            // إضافة علامة جديدة قابلة للسحب
                            marker = L.marker([lat, lon], { draggable: true }).addTo(map);

                            // حفظ الإحداثيات في الفورم
                            $('#latitude').val(lat);
                            $('#longitude').val(lon);

                            // الحصول على اسم الحي من الإحداثيات
                            getAreaNameFromCoordinates(lat, lon, address);

                            // تفعيل زر الحجز إذا تم اختيار الوقت
                            if ($('#appointment_time').val()) {
                                $('#booking-form button').prop('disabled', false);
                            }

                            // تحديث الإحداثيات عند سحب العلامة
                            marker.on('dragend', function(e) {
                                var newLatLng = e.target.getLatLng();
                                $('#latitude').val(newLatLng.lat);
                                $('#longitude').val(newLatLng.lng);
                                getAreaNameFromCoordinates(newLatLng.lat, newLatLng.lng, $('#address-input').val()); // تحديث العنوان المدمج عند سحب العلامة
                            });
                        } else {
                            alert('لم يتم العثور على العنوان.');
                        }
                    }
                });
            }

            // دالة للحصول على اسم الحي من الإحداثيات باستخدام Nominatim العكسي
            function getAreaNameFromCoordinates(lat, lon, fullAddress) {
                $.ajax({
                    url: "https://nominatim.openstreetmap.org/reverse",
                    method: 'GET',
                    data: {
                        lat: lat,
                        lon: lon,
                        format: 'json'
                    },
                    success: function(response) {
                        if (response.address) {
                            // استخراج اسم الحي (suburb أو village أو neighbourhood)
                            var areaName = response.address.suburb || response.address.village || response.address.neighbourhood || "غير معروف";

                            // دمج العنوان الكامل مع اسم الحي
                            var combinedAddress = `${fullAddress}, ${areaName}`;
                            $('#address').val(combinedAddress); // حفظ العنوان المدمج في الحقل المخفي
                        } else {
                            console.error('لم يتم العثور على اسم الحي لهذه الإحداثيات.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("حدث خطأ أثناء جلب اسم الحي:", error);
                    }
                });
            }

            // تهيئة Flatpickr
            const datePicker = flatpickr("#date-picker", {
                dateFormat: "Y-m-d", // تنسيق التاريخ
                minDate: "today", // يسمح فقط بالتواريخ الحالية والمستقبلية
                onChange: function(selectedDates, dateStr) {
                    // عند اختيار تاريخ
                    $('#appointment_date').val(dateStr);

                    // جلب الأوقات المتاحة لهذا التاريخ
                    $.ajax({
                        url: "{{ route('appointments.times') }}",
                        method: 'GET',
                        data: { date: dateStr },
                        success: function(response) {
                            console.log(response); // فحص البيانات المستلمة
                            let timesHtml = '';
                            if (response.length > 0) {
                                response.forEach(function(time) {
                                    timesHtml += `<div class="p-4 text-center transition-colors border border-gray-200 rounded-lg cursor-pointer time-box hover:bg-gray-50" data-time="${time}">${time}</div>`;
                                });
                            } else {
                                timesHtml = '<p class="text-red-500">لا توجد أوقات متاحة لهذا التاريخ.</p>';
                            }
                            $('#times-container').html(timesHtml);
                        },
                        error: function(xhr, status, error) {
                            console.error("حدث خطأ أثناء جلب الأوقات:", error);
                            $('#times-container').html('<p class="text-red-500">حدث خطأ أثناء جلب الأوقات.</p>');
                        }
                    });
                }
            });

            // اختيار الوقت
            $(document).on('click', '.time-box', function() {
                $('.time-box').removeClass('selected');
                $(this).addClass('selected');

                const selectedTime = $(this).data('time');
                $('#appointment_time').val(selectedTime);

                // تفعيل زر الحجز إذا تم اختيار الإحداثيات
                if ($('#latitude').val() && $('#longitude').val()) {
                    $('#booking-form button').prop('disabled', false);
                }
            });

            // إضافة علامة عند النقر على الخريطة
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                // إزالة العلامة السابقة إذا كانت موجودة
                if (marker) {
                    map.removeLayer(marker);
                }

                // إضافة علامة جديدة قابلة للسحب
                marker = L.marker([lat, lng], { draggable: true }).addTo(map);

                // حفظ الإحداثيات في الفورم
                $('#latitude').val(lat);
                $('#longitude').val(lng);

                // الحصول على اسم الحي من الإحداثيات
                getAreaNameFromCoordinates(lat, lng, $('#address-input').val());

                // تحديث الإحداثيات عند سحب العلامة
                marker.on('dragend', function(e) {
                    var newLatLng = e.target.getLatLng();
                    $('#latitude').val(newLatLng.lat);
                    $('#longitude').val(newLatLng.lng);
                    getAreaNameFromCoordinates(newLatLng.lat, newLatLng.lng, $('#address-input').val()); // تحديث العنوان المدمج عند سحب العلامة
                });

                // تفعيل زر الحجز إذا تم اختيار الوقت
                if ($('#appointment_time').val()) {
                    $('#booking-form button').prop('disabled', false);
                }
            });
        });
    </script>
</x-layout>
