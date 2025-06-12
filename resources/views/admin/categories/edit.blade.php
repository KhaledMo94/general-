<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.categories.update', $category->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('Category Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}">
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">{{ __('Parent Category') }}</label>
                        <select name="parent_id" class="form-control">
                            <option value="">{{ __('No Parent') }}</option>
                            @foreach ($categories as $categoryi)
                                <option value="{{ $categoryi->id }}" @selected($categoryi->id == (old('parent_id') ?? $category->parent_id))>{{ $categoryi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') ?? $category->description }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">{{ __('Existing Image') }}</label>
                <div>
                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="w_200" alt="">
                    @else
                        <p>{{ __('No Image') }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="">{{ __('Change Photo') }}</label>
                <div>
                    <input type="file" name="image">
                </div>
            </div>

            <div class="form-group">
                <label for="">{{ __('Existing Icon') }}</label>
                <div>
                    @if ($category->icon)
                        <img src="{{ asset('storage/' . $category->icon) }}" class="w_200" alt="">
                    @else
                        <p>{{ __('No icon') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="">{{ __('Change Icon') }}</label>
                <div>
                    <input type="file" name="icon">
                </div>
            </div>

            <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
        </form>
    </div>

</x-dashboard.main-layout>
