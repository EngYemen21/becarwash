<!DOCTYPE html>
<html dir="rtl"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>OneWay</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="icon" href="" type="image/x-icon">
	<link rel='stylesheet' href='wp-content/themes/betheme/fonts/fontawesome/fontawesome.css' />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=IBM+Plex+Sans%3A1%2C300%2C400%2C400italic%2C500%2C600%2C700%2C700italic&#038;display=swap&#038;ver=6.7' />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=IBM+Plex+Sans%3A400%2C700&#038;display=swap&#038;ver=6.7' />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat%3A400%2C500&#038;display=swap&#038;ver=6.7' />
		<link rel="stylesheet" href="style.css">
        <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        <script src="https://js.stripe.com/v3/"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500..1000&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Varela+Round&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

</head>
<style>
.signup{
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #1abc9c;
    color: #1abc9c;
    text-decoration: none;
}
.signup:hover{
    background: #1abc9c;
    color:#FFFFFF !important;
}

.signin{
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #1abc9c;
    background: #1abc9c;
    color:#FFFFFF;
    text-decoration: none;
}
.signin:hover{
    background: #1abc9c;
    color:#FFFFFF !important;
}
@media(max-width: 768px){
    .signup  {
    padding: 5px 10px;
    border-radius: 5px;
    border: 0px solid #1abc9c;
    color: #1abc9c;
    background:transparent;

}
.signin:hover{
    background:transparent;
    color:#FFFFFF !important;
}
.signin{
    padding: 5px 10px;
    border-radius: 5px;
    border:0px;
    background:transparent;
    color:#FFFFFF;
    text-decoration: none;
}
.signup:hover{
    background:transparent;
    color:#FFFFFF !important;
}
}
</style>
<body>
	<header id="">
		<nav class="navbar " id="navbar">
			<div class="logo">
                Be CarWash
                {{-- <img src="{{ asset('assets/images/uploads/2022/05/logo-removebg-preview.png') }}" alt="onWay"> --}}
				{{-- <span>OnWay</span> --}}
			</div>
			<div class="menu-icon menue_1" style="color: #1abc9c;" onclick="toggleNav()">&#9776;</div>
			<ul class="nav-links" id="navLinks">
				<li><a class="link-title" href="{{ route('index') }}" onclick="setActive(this)">الرئيسية</a></li>
				<li><a class="link-title" href="{{ route('service.index') }}" onclick="setActive(this)">الخدمات والاسعار</a></li>
				<li><a class="link-title" href="{{ route('works.index') }}" onclick="setActive(this)">الاعمال</a></li>
				<li><a class="link-title" href="{{ route('contact.index') }}" onclick="setActive(this)">اتصل بنا</a></li>
                <li><a class="link-title" href="#" onclick="setActive(this)">حولنا</a></li>
                @auth
                <li>
                    <div class="relative inline-block">

                        <div onclick="toggleDropdown()" class="flex items-center justify-center w-10 h-10 bg-red-400 rounded-full cursor-pointer">
                            <i class="text-xl fa-solid fa-user"></i>
                        </div>

                        <!-- القائمة المنسدلة -->
                        <ul id="dropdownMenu" class="absolute top-[55px]  text-black hidden w-44 rounded-md mt-2 bg-[#ffffff] shadow-lg unded-lg tr md:left-0">

                            <li>
                                <a href="#" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="setActive(this)">
                                    الملف الشخصي
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.appointments') }}" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="setActive(this)">
                                    حجوزاتك
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.payments') }}" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="setActive(this)">
                                    مدفوعاتك
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.cars') }}" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="setActive(this)">
                                    سيارتك
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="setActive(this)">تسجيل الخروج</button>
                                </form>
                                {{-- <a href="{{ route('logout') }}" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="setActive(this)">
                                    تسجيل الخروج
                                </a> --}}
                            </li>
                        </ul>
                    </div>
                    {{-- <a href="{{ route('dashboard.index') }}" onclick="setActive(this)">لوحة التحكم</a> --}}
                </li>
                @else

                <li><a  class="signup"  href="{{ route('register') }}" onclick="setActive(this)">إنشاء حساب</a></li>
                <li ><a class="signin"  href="{{ route('login') }}" onclick="setActive(this)">تسجيل دخول</a></li>
                @endauth


			</ul>
		</nav>
	</header>
       <!-- End Header -->


   <!-- Start body -->
    <div>
        {{ $slot }}
    </div>
     <!-- End Body -->





   <!-- Start Footer -->
   <footer class="footer">

    <div class="footer-container">
        <div class="footer-grid">

            <div class="footer-contact">
                <h3>اتصل بنا</h3>
                <p>فريقنا متاح دائمًا لمساعدتك.</p>
                <p class="contact-number">
                    <a href="tel:+967779475324">+967 779 475 324</a>
                </p>
            </div>


            <div class="footer-logo">
                <a href="#">
                    <img src="{{ asset('assets/images/uploads/2022/05/carwash3-footer-logo.svg')}}" alt="شعار الموقع" />
                </a>
                <p>غسيل سيارات اونلاين</p>
            </div>

            <div class="footer-address">
                <h3>العنوان</h3>
                <p>
                    الطابق الثالث، شارع الزبيري،<br>صنعاء، اليمن<br>ص.ب: 12345
                </p>
            </div>
        </div>
        <div class="footer-booking">
            <a href="#">احجز الآن</a>
        </div>
    </div>

    <div class="footer-copyright">
        <p>© 2024 جميع الحقوق محفوظة | موقع غسيل سيارات اونلاين</p>
    </div>
</footer>
   <!-- End Footer -->
<script>
    function toggleDropdown() {
    const dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.classList.toggle("hidden");
}

// إغلاق القائمة المنسدلة عند النقر خارجها
// window.onclick = function(event) {
//     if (!event.target.matches('img')) {
//         const dropdownMenu = document.getElementById("dropdownMenu");
//         if (!dropdownMenu.classList.contains("hidden")) {
//             dropdownMenu.classList.add("hidden");
//         }
//     }
// }

function setActive(element) {

    const items = document.querySelectorAll('#dropdownMenu a');
    items.forEach(item => {
        item.classList.remove("bg-gray-200");
    });


    element.classList.add("bg-gray-200");
}
</script>
   <script>
    function toggleNav() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

    function setActive(link) {
        const links = document.querySelectorAll('.nav-links a');
        links.forEach(item => item.classList.remove('active'));
        link.classList.add('active');
    }

    window.onscroll = function () {
        const navbar = document.getElementById('navbar');
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            navbar.classList.add("transparent");
        } else {
            navbar.classList.remove("transparent");
        }
    };
</script>

</body>
</html>
