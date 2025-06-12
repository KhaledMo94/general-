<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Report') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ redirect()->back() }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @php
                                $val = $report->reportable;
                                $type = $val instanceof App\Models\Competition ? __('The Challenge') : __('The Event');
                            @endphp
                            <tr>
                                <td>{{ __('Report Title') }}</td>
                                <td>
                                    {{ $report->title }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Report Description') }}</td>
                                <td>
                                    {{ $report->description }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Report Created by') }}</td>
                                <td>
                                    {{ $report->user->name }}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Reporter Phone') }}</td>
                                <td>{{ $report->user->phone }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Reporter Email') }}</td>
                                <td>{{ $report->user->email }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Report Date') }}</td>
                                <td>{{ $report->created_at}}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Regulations') }} {{ $type }} </td>
                                <td>{{ $report->reportable->regulations }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('City') }} {{ $type }} </td>
                                <td>{{ $report->reportable->city }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('Date') }} {{ $type }} </td>
                                <td>{{ $report->reportable->date}}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Address') }} {{ $type }} </td>
                                <td>{{ $report->reportable->address }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('Owner Name') }} </td>
                                <td>{{ $report->reportable->user->name}}</td>
                            </tr>

                            <tr>
                                <td> {{ __('Owner Email') }}</td>
                                <td>{{ $report->reportable->user->email}}</td>
                            </tr>

                            <tr>
                                <td> {{ __('Owner Phone') }}</td>
                                <td>{{ $report->reportable->user->country_code . $report->reportable->user->phone_number}}</td>
                            </tr>
                        </table>

                        <div class="mb-5 row">
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <a type="button" 
                                @if ($type == 'Competition')
                                href="{{route('admins.competitions.show',$report->reportable->id)}}" 
                                @else
                                href="{{route('admins.events.show',$report->reportable->id)}}" 
                                @endif
                                class="btn btn-outline-primary">{{ __('See') }} {{ $type }}</a>
                            </div>
                            <div class="col-md-6">
                                @if ($report->read_at)
                                <form action="{{ route('admins.reports.destroy', $report->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure? It Will Removed Form All Statictics');">
                                        {{ __('Delete Report') }}
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('admins.reports.mark', $report->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning">
                                        {{ __('Mark As Read') }}
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
