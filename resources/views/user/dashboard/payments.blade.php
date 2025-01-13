<x-layout>
    @section('title', 'مدفوعاتك')
    <div class="container mx-auto my-4">
        <div class="flex flex-col">
            <h1 class="p-4 mb-6 text-3xl font-bold text-white">المدفوعات</h1>


                {{-- <h2 class="mb-6 text-2xl font-semibold">المواعيد</h2> --}}
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    {{-- <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">اسم العميل
                                    </th> --}}
                                    <th class="  px-6 py-3 text-sm font-semibold text-right text-gray-700">الخدمة</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">طريقة الدفع </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">المبلغ </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">رابط الفاتورة </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">الحالة</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($payments as $payment)
                                <tr class="transition-colors hover:bg-gray-50">
                                    {{-- <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->user->name }}</td> --}}
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->package->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->payment->method }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->payment->amount }} {{
                                        $payment->payment->currency }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->payment->invoice_pdf_url }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $payment->payment->status }}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>

    </div>


</x-layout>
