<!-- resources/views/payments/success.blade.php -->
<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-3xl font-bold text-green-600 mb-4">تم الدفع بنجاح</h1>
            <p class="text-gray-700">عملية الدفع تمت بنجاح شكرا لك </p>
            <a href="{{ route('index') }}" class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
               العودة للصفحة الرئيسية
            </a>
        </div>
    </div>
</x-layout>
