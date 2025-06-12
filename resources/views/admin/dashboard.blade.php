<x-dashboard.main-layout >

    <div class="row">
        <div class="mb-2 col-xl-12 col-md-12">
            <h1 class="mb-3 text-gray-800 h3">{{ __('Dashboard') }}</h1>
        </div>
    </div>

    <!-- Box Start -->
    <div class="row dashboard-page" data-aos="fade-up" > 

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Events Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $all_events_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        
        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Active Events Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $active_events_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Pending Events') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $pending_events }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Challanges Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $all_competitions_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Active Challanges Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $active_competitions_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Pending Challanges') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $pending_competitions }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Verified Users') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $verified_users_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Booked Events Tickets') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_booked_event_tickets }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Booked Challanges Tickets') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_booked_competition_tickets }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Reserved Tickets') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_booked_tickets }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Payments') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_payments }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Categories Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $categories_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

    {{-- <h1 class="mb-3 text-gray-800 h3">{{ __('Latest Events Booking') }}</h1>
    <div class="mb-5 shadow card" >
        <div class="my-2 card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Event Name') }}</th>
                            <th>{{ __('Event Description') }}</th>
                            <th>{{ __('Event Category') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('After Discount') }}</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('User Email') }}</th>
                            <th>{{ __('User Phone') }}</th>
                            <th>{{ __('Payment Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($latest_events_bookings as $booking)
                            <tr>
                                <td>{{ $booking->event->name}}</td>
                                <td>{{ $booking->event->description}}</td>
                                <td>{{ $booking->event->category->name }}</td>
                                <td>{{ $booking->event->price }}</td>
                                <td>{{ $booking->event->pay_amount_per_person }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->email ?? __('No Email')}}</td>
                                <td dir="rtl">{{ $booking->user->phone}}</td>
                                <td>
                                    @if (optional($booking->payment)->payment_status == 'completed')
                                        <span class="badge badge-success">{{ __('Completed') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <h1 class="mb-3 text-gray-800 h3">{{ __('Latest Challenges Booking') }}</h1>
    <div class="mb-5 shadow card" >
        <div class="my-2 card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Challenge Name') }}</th>
                            <th>{{ __('Challenge Description') }}</th>
                            <th>{{ __('Challenge Category') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('After Discount') }}</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('User Email') }}</th>
                            <th>{{ __('User Phone') }}</th>
                            <th>{{ __('Payment Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($latest_competitions_bookings as $booking)
                            <tr>
                                <td>{{ $booking->competition->name}}</td>
                                <td>{{ $booking->competition->description}}</td>
                                <td>{{ $booking->competition->category->name }}</td>
                                <td>{{ $booking->competition->price }}</td>
                                <td>{{ $booking->competition->pay_amount_per_person }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->email ?? __('No Email') }}</td>
                                <td dir="rtl">{{ $booking->user->phone}}</td>
                                <td>
                                    @if (optional($booking->payment)->payment_status == 'completed')
                                        <span class="badge badge-success">{{ __('Completed') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    {{-- <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').on('change', function() {
                var id = $(this).data('id');

                let url = "{{ route('admins.categories.toggle', ':id') }}".replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        console.log('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script> --}}



</x-dashboard.main-layout>