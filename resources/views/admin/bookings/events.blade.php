<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Challenges') }}</h1>
    <div class="mb-4 shadow card">
        {{-- <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.events.create') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>Add New</a>
            </div>
        </div> --}}
        <div class="card-body" data-aos="fade-up">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Created User') }}</th>
                            <th>{{ __('Created User Phone') }}</th>
                            <th>{{ __('Event Category') }}</th>
                            <th>{{ __('Ended ?') }}</th>
                            <th>{{ __('Tickets') }}</th>
                            <th>{{ __('Available Tickets') }}</th>
                            <th>{{ __('Reserved Tickets') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Discount Type') }}</th>
                            <th>{{ __('Discount Value') }}</th>
                            <th>{{ __('Ticket Price') }}</th>
                            <th>{{ __('Deduction Type') }}</th>
                            <th>{{ __('Deduction Value') }}</th>
                            <th>{{ __('After Deduction') }}</th>
                            <th>{{ __('Debit Amount') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($events as $event)
                            <tr data-aos="fade-up">
                                <td>{{ ++$i }}</td>
                                <td>{{ $event->name }}</td>
                                @if (!is_null($event->image))
                                    <td>
                                        <img src="{{ asset('storage/' . $event->image) }}" alt=""
                                            class="w_200">
                                    </td>
                                @else
                                    <td>
                                        <p>{{ __('No image') }}</p>
                                    </td>
                                @endif
                                <td>{{ $event->user->name }}</td>
                                <td>{{ $event->user->phone }}</td>
                                <td>{{ $event->category->name ?? __('Uncategorized') }}</td>
                                <td>
                                    @if ($event->date < now())
                                        <span class="badge badge-success">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                    @endif
                                </td>
                                <td>{{ $event->tickets }}</td>
                                <td>{{ $event->available_tickets }}</td>
                                <td>{{ $event->tickets - $event->available_tickets }}</td>
                                <td>{{ $event->price }} EGP</td>
                                @if ($event->discount_fixed)
                                    <td>{{ __('Fixed') }}</td>
                                    <td>{{ $event->discount_fixed }} EGP</td>
                                @elseif($event->discount_percent)
                                    <td>{{ __('Percentage') }}</td>
                                    <td>{{ $event->discount_percent }} %</td>
                                @else
                                    <td>{{ __('No Discount') }}</td>
                                    <td>{{ __('No Discount') }}</td>
                                @endif
                                <td>{{ $event->pay_amount_per_person }} EGP</td>
                                @if ($event->deduction)
                                    <td>{{ $event->deduction->type == 'fixed' ? __('Fixed') : __('Percentage') }}</td>
                                    <td>{{ $event->deduction->value }}
                                        {{ $event->deduction->type == 'fixed' ? 'EGP' : '%' }}</td>
                                @else
                                    <td>{{ __('Not Assigned') }}</td>
                                    <td>{{ __('Not Assigned') }}</td>
                                @endif

                                <td>{{ (\App\Helpers\DeductionHelper::calculateDeduction($event->deduction->type ,$event->deduction->value,$event->price ))}}</td>
                                <td>{{ (\App\Helpers\DeductionHelper::calculateDeduction($event->deduction->type ,$event->deduction->value,$event->price )* ($event->tickets - $event->available_tickets)  )}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admins.bookings.events.participants',$event->id) }}"
                                        class="mx-1 btn btn-success btn-sm" title="{{ __('Show Bookings') }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-2 d-flex justify-content-center">
            {{ $events->links() }}
        </div>
    </div>

</x-dashboard.main-layout>
