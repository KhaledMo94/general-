<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Challenges') }}</h1>
    <div class="mb-4 shadow card">
        {{-- <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.competitions.create') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>Add New</a>
            </div>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" data-aos="fade-up" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Created User') }}</th>
                            <th>{{ __('Created User Phone') }}</th>
                            <th>{{ __('Challenge Category') }}</th>
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
                            <th>{{ __('Debit') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($competitions as $competition)
                            <tr data-aos="fade-up">
                                <td>{{ ++$i }}</td>
                                <td>{{ $competition->name }}</td>
                                @if (!is_null($competition->image))
                                    <td>
                                        <img src="{{ asset('storage/' . $competition->image) }}" alt=""
                                            class="w_200">
                                    </td>
                                @else
                                    <td>
                                        <p>No image</p>
                                    </td>
                                @endif
                                <td>{{ $competition->user->name }}</td>
                                <td>{{ $competition->user->phone }}</td>
                                <td>{{ $competition->category->name  ?? __('Uncategorized') }}</td>
                                <td>
                                    @if ($competition->date < now())
                                        <span class="badge badge-success">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                    @endif
                                </td>
                                <td>{{ $competition->tickets }}</td>
                                <td>{{ $competition->available_tickets }}</td>
                                <td>{{ $competition->tickets - $competition->available_tickets }}</td>
                                <td>{{ $competition->price }} EGP</td>
                                @if ($competition->discount_fixed)
                                    <td>{{ __('Fixed') }}</td>
                                    <td>{{ $competition->discount_fixed }} EGP</td>
                                @elseif($competition->discount_percent)
                                    <td>{{ __('Percentage') }}</td>
                                    <td>{{ $competition->discount_percent }} %</td>
                                @else
                                    <td>{{ __('No Discount') }}</td>
                                    <td>{{ __('No Discount') }}</td>
                                @endif
                                <td>{{ $competition->pay_amount_per_person }} EGP</td>
                                @if ($competition->deduction)
                                    <td>{{ $competition->deduction->type == 'fixed' ? __('Fixed') : __('Percentage') }}</td>
                                    <td>{{ $competition->deduction->value }}
                                        {{ $competition->deduction->type == 'fixed' ? 'EGP' : '%' }}</td>
                                @else
                                    <td>{{ __('Not Assigned') }}</td>
                                    <td>{{ __('Not Assigned') }}</td>
                                @endif
                                <td>{{ (\App\Helpers\DeductionHelper::calculateDeduction($competition->deduction->type ,$competition->deduction->value,$competition->price ))}}</td>
                                <td>{{ (\App\Helpers\DeductionHelper::calculateDeduction($competition->deduction->type ,$competition->deduction->value,$competition->price )* ($competition->tickets - $competition->available_tickets)  )}}</td>
  
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admins.bookings.competitions.participants',$competition->id) }}"
                                        class="mx-1 btn btn-success btn-sm" title="Show Bookings">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-2 d-flex justify-content-center" data-aos="fade-up" >
            {{ $competitions->links() }}
        </div>
    </div>

</x-dashboard.main-layout>
