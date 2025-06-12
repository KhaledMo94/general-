<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Challenge') }} {{ $competition->name }} {{ __('Details') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admins.competitions.index') }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
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
                                <td>{{ $competition->status }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Category') }}</td>
                                <td>{{ $competition->category->name }}</td>
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
                                <td>{{ $competition->country }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('City') }}</td>
                                <td>{{ $competition->city }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Date') }}</td>
                                <td>{{ $competition->date_formatted }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Time') }}</td>
                                <td>{{ $competition->time_formatted }}</td>
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
                                    <td>{{ $competition->deduction->value }} {{$competition->deduction->type == 'fixed' ? 'EGP' : '%'}}</td>
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
                                @foreach ($competition->supporters as $supporter)
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
                                                <p>{{ __('No image') }}</p>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h1 class="mt-5 mb-3 text-gray-800 h3">{{ __('Moderators') }}</h1>
                    @if($competition->moderators->count()>0)
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
                                    @foreach ($competition->moderators as $moderator)
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
                                                    <p>{{ __('No image') }}</p>
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

                    <h1 class="mt-5 mb-3 text-gray-800 h3">{{ __('Prizes') }}</h1>
                    @if($competition->prizes->count()>0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Serial') }}</th>
                                        <th>{{ __('Prize Position') }}</th>
                                        <th>{{ __('Prize Name') }}</th>
                                        <th>{{ __('Prize Image') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($competition->prizes as $prize)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $prize->position }}</td>
                                            <td>{{ $prize->name }}</td>
                                            @if (!is_null($prize->image))
                                                <td>
                                                    <img src="{{ asset('storage/' . $prize->image) }}" alt=""
                                                        class="w_200">
                                                </td>
                                            @else
                                                <td>
                                                    <p>{{ __('No image') }}</p>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="m-2 textcenter font-weight-bold">{{ __('No Prizes Assigned') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
