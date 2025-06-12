<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Category') }} {{ $category->name }} {{ __('Details') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admins.categories.index') }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>{{ __('Category Name') }}</td>
                                <td>
                                    {{$category->name}}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Category Parent') }}</td>
                                <td>
                                    {{$category->parent->name ?? __('No Parent')}}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Description') }}</td>
                                <td>{{ $category->description }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Image') }}</td>
                                <td>
                                    @if($category->image)
                                       <img src="{{ asset('storage/'.$category->image) }}" class="w_100">
                                   @else
                                    <p>{{ __('No Image') }}</p>
                                    @endif
                               </td>
                            </tr>

                            <tr>
                                <td>{{ __('Icon') }}</td>
                                <td>
                                    @if($category->icon)
                                       <img src="{{ asset('storage/'.$category->icon) }}" class="w_100">
                                   @else
                                    <p>{{ __('No Icon') }}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Status') }}</td>
                                <td>{{ $category->status == 'active' ? __('Active') : __('Inactive') }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Sub Categories Count') }}</td>
                                <td>{{ $category->children_count }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Users Interested Count') }}</td>
                                <td>{{ $category->interests_count }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
