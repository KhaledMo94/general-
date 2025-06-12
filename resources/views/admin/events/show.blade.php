<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Event') }} {{ $event->name }} {{ __('Details') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admins.events.index') }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>{{ __('Event Name') }}</td>
                                <td>
                                    {{ $event->name }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Image') }}</td>
                                <td>
                                    @if ($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" class="w_100">
                                    @else
                                        <p>{{ __('No Image') }}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Images') }}</td>
                                <td>
                                    @if ($event->images)
                                        @foreach ($event->images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" class="w_100">
                                        @endforeach
                                    @else
                                        <p>{{ __('No Images') }}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Event Created by') }}</td>
                                <td>
                                    {{ $event->user->name }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Creator Phone') }}</td>
                                <td>{{ $event->user->phone }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Creator Email') }}</td>
                                <td>{{ $event->user->email }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Status') }}</td>
                                <td>{{ $event->status == 'active' ? __('Active') : __('Inactive') }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Category') }}</td>
                                <td>{{ $event->category->name }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Description') }}</td>
                                <td>{{ $event->description }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Regulations') }}</td>
                                <td>{{ $event->regulations }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Country') }}</td>
                                <td>{{ $event->country }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('City') }}</td>
                                <td>{{ $event->city }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Date') }}</td>
                                <td>{{ $event->date_formatted }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Time') }}</td>
                                <td>{{ $event->time_formatted }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Location') }}</td>
                                <td><a href="https://www.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}"
                                        target="_blank">{{ __('View on Google Maps') }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Address') }}</td>
                                <td>{{ $event->address }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Price') }}</td>
                                <td>{{ $event->price }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Total Tickets') }}</td>
                                <td>{{ $event->tickets }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Available Tickets') }}</td>
                                <td>{{ $event->available_tickets }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Discount Type') }}</td>
                                @if ($event->discount_fixed)
                                    <td>{{ __('Fixed') }}</td>
                                @elseif($event->discount_percent)
                                    <td>{{ __('Percentage') }}</td>
                                @else
                                    <td>{{ __('No Discount') }}</td>
                                @endif
                            </tr>

                            <tr>
                                <td>{{ __('Amount') }}</td>
                                @if ($event->discount_fixed)
                                    <td>{{ $event->discount_fixed }}</td>
                                @elseif($event->discount_percent)
                                    <td>{{ $event->discount_percent }}</td>
                                @else
                                    <td>{{ __('No Discount') }}</td>
                                @endif
                            </tr>

                            @if ($event->deduction)
                                <tr>
                                    <td>{{ __('Deduction Type') }}</td>
                                    <td>{{ $event->deduction->type == 'fixed' ? __('Fixed') : __('Percentage') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Deduction Amount') }}</td>
                                    <td>{{ $event->deduction->value }}</td>
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
                    <h1 class="mt-5 mb-3 text-gray-800 h3">{{ __('Sponsors') }}</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('Serial') }}</th>
                                    <th>{{ __('Sponsor Name') }}</th>
                                    <th>{{ __('Image') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($event->supporters as $supporter)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $supporter->name }}</td>
                                        @if (!is_null($supporter->image))
                                            <td>
                                                <img src="{{ asset('storage/' . $supporter->image) }}" alt=""
                                                    class="w_200">
                                            </td>
                                        @else
                                            <td>
                                                <p>No image</p>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h1 class="mt-5 mb-3 text-gray-800 h3">{{ __('Moderators') }}</h1>
                    @if($event->moderators->count()>0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Serial') }}</th>
                                        <th>{{ __('Moderator Name') }}</th>
                                        <th>{{ __('Moderator Email') }}</th>
                                        <th>{{ __('Moderator Phone') }}</th>
                                        <th>{{ __('Moderator Image') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($event->moderators as $moderator)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $moderator->name }}</td>
                                            <td>{{ $moderator->email }}</td>
                                            <td>{{ $moderator->phone }}</td>
                                            @if (!is_null($moderator->image))
                                                <td>
                                                    <img src="{{ asset('storage/' . $moderator->image) }}" alt=""
                                                        class="w_200">
                                                </td>
                                            @else
                                                <td>
                                                    <p>No image</p>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="m-2 textcenter font-weight-bold">{{ __('No Moderators Assigned') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
