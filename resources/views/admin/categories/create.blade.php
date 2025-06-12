<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">{{ __('Category Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">{{ __('Parent Category') }}</label>
                        <select name="parent_id" class="form-control">
                            <option value="" >{{ __('No Parent') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($category->id == old('parent_id'))>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">{{ __('Change Photo') }}</label>
                <div>
                    <input type="file" name="image">
                </div>
            </div>
            
            <div class="form-group">
                <label for="">{{ __('Change Icon') }}</label>
                <div>
                    <input type="file" name="icon">
                </div>
            </div>

            <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
        </form>
    </div>

</x-dashboard.main-layout>
