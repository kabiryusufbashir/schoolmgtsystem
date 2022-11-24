<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">Check Semester Payment</h1>
    @if(count($check_payments) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    STUDENT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    DEPARTMENT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    SESSION
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    SEMESTER
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    TIME SUBMITTED
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($check_payments as $check_payment)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $check_payment->studentName($check_payment->student_id) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $check_payment->studentDepartment($check_payment->student_id) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $check_payment->session($check_payment->session) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $check_payment->semester }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $check_payment->dateFormat($check_payment->created_at) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            <form action="{{ route('check-payment-semester-edit', $check_payment->id) }}" method="GET">
                                                @csrf 
                                                <input type="submit" value="VIEW PAYMENT" class="edit-btn">
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-4">
                        {{ $check_payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Payment Found</h1>
    @endif
</div>