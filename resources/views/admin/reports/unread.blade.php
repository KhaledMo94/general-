<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Unread Reports') }}</h1>
    <div class="mb-4 shadow card">
        {{-- <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.reports.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                    New</a>
            </div>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Regulations') }}</th>
                            <th>{{ __('Reported At') }}</th>
                            <th>{{ __('Reporter By') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ ++$i }}</td>
                                @php
                                    $val = $report->reportable;
                                    $type = $val instanceof App\Models\Competition ? 'Challange' : 'Event';
                                @endphp
                                <td>{{ $type }}</td>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->reportable->regulations }}</td>
                                <td>{{ $report->created_at }}</td>`
                                <td>{{ $report->user->name }}</td>

                                <td class="d-flex justify-content-center">
                                    <a title="show in details" href="{{ route('admins.reports.show', $report->id) }}"
                                        class="mx-1 btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admins.reports.mark', $report->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="mx-1 btn btn-warning btn-sm">
                                            <i class="fa fa-check" aria-hidden="true"></i>
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
            {{ $reports->links() }}
        </div>
    </div>

</x-dashboard.main-layout>
