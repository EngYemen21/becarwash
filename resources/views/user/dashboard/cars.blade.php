
<x-layout>
    @section('title', 'مركباتك')
    <div class="container mx-auto my-4">
        <div class="flex flex-col">
        <h1 class="p-4 mb-6 text-3xl font-bold text-white">مركباتك</h1>



            <div class="">
                {{-- <h2 class="mb-6 text-2xl font-semibold">المواعيد</h2> --}}
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">اسم العميل</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">نوع السيارة</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">إصدار السيارة  </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">لون السيارة </th>
                                    <th class="px-6 py-3 text-sm font-semibold text-right text-gray-700">رقم السيارة  </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($cars as $car)
                                    <tr class="transition-colors hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $car->user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $car->car_type }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $car->car_model }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $car->car_color }} </td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $car->car_plate }}</td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>

    </div>


</x-layout>


