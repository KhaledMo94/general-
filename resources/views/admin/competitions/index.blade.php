<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Challenges') }}</h1>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.competitions.create') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>{{ __('Add New') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Created User') }}</th>
                            <th>{{ __('Created User Phone') }}</th>
                            <th>{{ __('Challange Category') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Regulations') }}</th>
                            <th>{{ __('Country') }}</th>
                            <th>{{ __('City') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Time') }}</th>
                            <th>{{ __('Latitude') }}</th>
                            <th>{{ __('Longitude') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Images') }}</th>
                            <th>{{ __('Tickets') }}</th>
                            <th>{{ __('Available Tickets') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Discount Type') }}</th>
                            <th>{{ __('Discount Value') }}</th>
                            <th>{{ __('Deduction Type') }}</th>
                            <th>{{ __('Value') }}</th>
                            <th>{{ __('Sponsers Count') }}</th>
                            <th>{{ __('Moderators Count') }}</th>
                            <th>{{ __('Prizes Count') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($competitions as $competition)
                            <tr data-aos="fade-up">
                                <td>{{ ++$i }}</td>
                                <td>{{ $competition->name }}</td>
                                <td>{{ $competition->user->name }}</td>
                                <td>{{ $competition->user->phone }}</td>
                                <td>{{ $competition->category->name ?? __('Uncategorized') }}</td>
                                <td>{{ $competition->description }}</td>
                                <td>{{ $competition->regulations }}</td>
                                <td>{{ $competition->country }}</td>
                                <td>{{ $competition->city }}</td>
                                <td>{{ $competition->date_formatted }}</td>
                                <td>{{ $competition->time_formatted }}</td>
                                <td>{{ number_format($competition->latitude, 4) }}</td>
                                <td>{{ number_format($competition->longitude, 4) }}</td>
                                @if (!is_null($competition->image))
                                    <td>
                                        <img src="{{ asset('storage/' . $competition->image) }}" alt=""
                                            class="w_200">
                                    </td>
                                @else
                                    <td>
                                        <p>{{ __('No Image') }}</p>
                                    </td>
                                @endif

                                @if (!is_null($competition->images))
                                    <td>
                                        <div class="my-slider">
                                            @foreach ($competition->images as $image)
                                                <div>
                                                    <img src="{{ asset('storage/' . $image) }}" alt=""
                                                        class="w_200">
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <p>{{ __('No images') }}</p>
                                    </td>
                                @endif

                                <td>{{ $competition->tickets }}</td>
                                <td>{{ $competition->available_tickets }}</td>
                                <td>{{ $competition->address }}</td>
                                <td>{{ $competition->price }}</td>
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
                                @if ($competition->deduction)
                                    <td>{{ $competition->deduction->type == 'fixed' ? __('Fixed') : __('Percentage') }}
                                    </td>
                                    <td>{{ $competition->deduction->value }}
                                        {{ $competition->deduction->type == 'fixed' ? 'EGP' : '%' }}</td>
                                @else
                                    <td>{{ __('Not Assigned') }}</td>
                                    <td>{{ __('Not Assigned') }}</td>
                                @endif
                                <td>{{ $competition->supporters_count }}</td>
                                <td>{{ $competition->moderators_count }}</td>
                                <td>{{ $competition->prizes_count }}</td>
                                <td>
                                    <input type="checkbox" {{ $competition->status == 'active' ? 'checked' : '' }}
                                        data-id="{{ $competition->id }}"
                                        data-has-deduction="{{ $competition->deduction ? '1' : '0' }}"
                                        data-toggle="toggle" data-on="{{ __('Active') }}"
                                        data-off="{{ __('Pending') }}" data-onstyle="success" data-offstyle="danger">
                                </td>

                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admins.competitions.show', $competition->id) }}"
                                        class="mx-1 btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    @if (request()->get('par') != 'p')
                                        <a href="{{ route('admins.competitions.edit', $competition->id) }}"
                                            class="mx-1 btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('admins.competitions.destroy', $competition->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-1 btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure? This competition has {{ $competition->bookings_count }} bookings.');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-2 d-flex justify-content-center">
            {{ $competitions->links() }}
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let suppressToggleChange = false;

            $('input[type="checkbox"]').on('change', function() {
                if (suppressToggleChange) return;

                const checkbox = $(this);
                const id = checkbox.data('id');
                const url = @json(route('admins.competitions.toggle', ['id' => ':id'])).replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Error');
                        suppressToggleChange = true;
                        checkbox.bootstrapToggle('off'); // change it safely
                        suppressToggleChange = false;
                    },
                });
            });
        });
    </script>


</x-dashboard.main-layout>
