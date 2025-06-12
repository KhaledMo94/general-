<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Challenge') }} {{ $competition->name }} {{ __('Bookings') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admins.bookings.competitions') }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body" data-aos="fade-up">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>{{ __('Challenge Name') }}</td>
                                <td>
                                    {{ $competition->name }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Image') }}</td>
                                <td>
                                    @if ($competition->image)
                                        <img src="{{ asset('storage/' . $competition->image) }}" class="w_100">
                                    @else
                                        <p>{{ __('No Image') }}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Images') }}</td>
                                <td>
                                    @if ($competition->images)
                                        @foreach ($competition->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" class="w_100">
                                        @endforeach
                                    @else
                                        <p>{{ __('No Images') }}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Challenge Created by') }}</td>
                                <td>
                                    {{ $competition->user->name }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Creator Phone') }}</td>
                                <td>{{ $competition->user->phone }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Creator Email') }}</td>
                                <td>{{ $competition->user->email }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Status') }}</td>
                                <td>{{ $competition->status== 'active' ? __('Active') : __('Inactive') }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Category') }}</td>
                                <td>{{ $competition->category->name ?? __('Uncategorized') }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Description') }}</td>
                                <td>{{ $competition->description }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Regulations') }}</td>
                                <td>{{ $competition->regulations }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Country') }}</td>
                                <td>{{ $competition->country_string }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('City') }}</td>
                                <td>{{ $competition->city }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Date') }}</td>
                                <td>{{ $competition->date->format('Y-m-d') }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Time') }}</td>
                                <td>{{ $competition->date->format('h:i A') }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Location') }}</td>
                                <td><a href="https://www.google.com/maps?q={{ $competition->latitude }},{{ $competition->longitude }}"
                                        target="_blank">{{ __('View on Google Maps') }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Address') }}</td>
                                <td>{{ $competition->address }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Price') }}</td>
                                <td>{{ $competition->price }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Total Tickets') }}</td>
                                <td>{{ $competition->tickets }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Available Tickets') }}</td>
                                <td>{{ $competition->available_tickets }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Discount Type') }}</td>
                                @if ($competition->discount_fixed)
                                    <td>{{ __('Fixed') }}</td>
                                @elseif($competition->discount_percent)
                                    <td>{{ __('Percentage') }}</td>
                                @else
                                    <td>{{ __('No Discount') }}</td>
                                @endif
                            </tr>

                            <tr>
                                <td>{{ __('Value') }}</td>
                                @if ($competition->discount_fixed)
                                    <td>{{ $competition->discount_fixed }} EGP</td>
                                @elseif($competition->discount_percent)
                                    <td>{{ $competition->discount_percent }} %</td>
                                @else
                                    <td>{{ __('No Discount') }}</td>
                                @endif
                            </tr>

                            @if ($competition->deduction)
                                <tr>
                                    <td>{{ __('Deduction Type') }}</td>
                                    <td>{{ $competition->deduction->type == 'fixed' ? __('Fixed') : __('Percentage') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Deduction Amount') }}</td>
                                    <td>{{ $competition->deduction->value  }}
                                        {{ $competition->deduction->type == 'fixed' ? 'EGP' : '%' }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ __('Deduction Type') }}</td>
                                    <td>{{ __('Not Assigned') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Deduction Amount') }}</td>
                                    <td>{{ __('Not Assigned') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <h1 class="mt-5 mb-3 text-gray-800 h3">{{ __('Bookings') }}</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('Serial') }}</th>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('User Image') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Tickets Number') }}</th>
                                    <th>{{ __('Qr Codes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($competition->bookings as $booking)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        @if (!is_null($booking->user->image))
                                            <td>
                                                <img src="{{ asset('storage/' . $booking->user->image) }}"
                                                    alt="" class="w_200">
                                            </td>
                                        @else
                                            <td>
                                                <p>{{ __('No image') }}</p>
                                            </td>
                                        @endif
                                        <td>{{ $booking->user->phone }}</td>
                                        <td>{{ $booking->user->email ?? __('No Email') }}</td>
                                        <td>{{ $booking->number_of_tickets }}</td>
                                        @if ($booking->qrcodes->count() > 0)
                                            <td>
                                                <div class="my-slider">
                                                    @foreach ($booking->qrcodes as $qrcode)
                                                        <div>
                                                        {!! QrCode::size(150)->generate($qrcode) !!}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        @else
                                        <td>
                                            {{ __('No Qr Codes') }}
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
