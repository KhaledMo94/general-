<x-dashboard.main-layout>

    <div class="card-body">
        <form class="my-3" action="{{ route('admins.competitions.update', $competition->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4 shadow card t-left">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1"
                                    role="tab" aria-controls="p1" aria-selected="true">{{ __('Main Section') }}</a>
                                <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab"
                                    aria-controls="p2" aria-selected="false">{{ __('Location') }}</a>
                                <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab"
                                    aria-controls="p3" aria-selected="false">{{ __('Moderators') }}</a>
                                <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab"
                                    aria-controls="p4" aria-selected="false">{{ __('Sponsers') }}</a>
                                <a class="nav-link" id="p5_tab" data-toggle="pill" href="#p5" role="tab"
                                    aria-controls="p5" aria-selected="false">{{ __('Gallery') }}</a>
                                <a class="nav-link" id="p6_tab" data-toggle="pill" href="#p6" role="tab"
                                    aria-controls="p6" aria-selected="false">{{ __('Prizes') }}</a>
                                <a class="nav-link" id="p7_tab" data-toggle="pill" href="#p7" role="tab"
                                    aria-controls="p7" aria-selected="false">{{ __('Deductions') }}</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">

                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active" id="p1" role="tabpanel"
                                    aria-labelledby="p1_tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') ?? $competition->name }}" autofocus>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Description') }}</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') ?? $competition->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Regulations') }}</label>
                                        <textarea name="regulations" class="form-control editor" cols="30" rows="10">{{ old('regulations') ?? $competition->regulations }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Category') }}</label>
                                                <select name="category_id" class="form-control select2">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @selected(old($competition->category_id == $category->id))>{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Tickets Number') }}</label>
                                                <input type="number" name="tickets_number" class="form-control"
                                                    value="{{ old('tickets_number') ?? $competition->tickets }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Price') }}</label>
                                                <input type="number" name="price" class="form-control"
                                                    value="{{ old('price') ?? $competition->price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">{{ __('Discount Type') }}</label>
                                            <select name="discount_type" class="form-control select2"
                                                id="discount_type">
                                                <option value="fixed" @selected((int) $competition->discount_fixed > 0)>
                                                    {{ __('Fixed') }}</option>
                                                <option value="percent" @selected((int) $competition->discount_percent > 0)>
                                                    {{ __('Percentage') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Discount') }}</label>
                                                <div class="input-group">
                                                    <input type="number" name="discount" class="form-control"
                                                        value="{{ old('discount') ?? ($competition->discount_fixed > 0 ? $competition->discount_fixed : $competition->discount_percent) }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="discount_unit">EGP</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#discount_type').change(function() {
                                                    const selected = $(this).val();
                                                    if (selected === 'fixed') {
                                                        $('#discount_unit').text('EGP');
                                                    } else if (selected === 'percent') {
                                                        $('#discount_unit').text('%');
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Existing Featured Photo') }}</label>
                                        <div>
                                            <img src="{{ asset('storage/' . $competition->image) }}" class="w_200"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('Featured Photo') }}</label>
                                        <div>
                                            <input type="file" name="featured_photo">
                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab 1 -->

                                <!-- Tab 2 -->
                                <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2_tab">

                                    <h4 class="heading-in-tab">{{ __('Location') }}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="d-block">{{ __('Country') }}</label>
                                                <select name="code" class="form-control w-100 d-block select2">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country['code'] }}"
                                                            @selected($country['code'] == (old('code') ?? $competition->country_code))>{{ $country['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('City') }}</label>
                                                <input type="text" name="city" class="form-control"
                                                    value="{{ old('city') ?? $competition->city }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Latitude') }}</label>
                                                <input type="text" name="latitude" class="form-control"
                                                    value="{{ old('latitude') ?? $competition->latitude }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Longitude') }}</label>
                                                <input type="text" name="longitude" class="form-control"
                                                    value="{{ old('longitude') ?? $competition->longitude }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Address') }}</label>
                                                <input type="text" name="address" class="form-control"
                                                    value="{{ old('address') ?? $competition->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">{{ __('Date & Time') }}</label>
                                                <input type="datetime-local" name="datetime" class="form-control"
                                                    value="{{ old('datetime') ?? $competition->date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab 2 -->

                                <!-- Tab 3 -->
                                <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="p3_tab">

                                    <h4 class="heading-in-tab">{{ __('Moderators') }}</h4>
                                    <p class="text-danger">{{ __('There are') }}
                                        {{ $competition->moderators->count() }} {{ __('if you add any moderator') }}
                                        <br>
                                        {{ __('The previous list WILL BE DELETED') }}</p>
                                    <div class="social_item">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <select name="users_ids[]" class="form-control">
                                                        <option value="" selected>
                                                            {{ __('Keep the Moderators List') }}</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="btn btn-success add_social_more"><i
                                                        class="fas fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab 4 -->
                                <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="p4_tab">
                                    <h4 class="heading-in-tab">{{ __('Sponsors') }}</h4>
                                    <p class="text-danger">{{ __('There are') }}
                                        {{ $competition->supporters->count() }} {{ __('if you add any Sponsor') }}
                                        <br>
                                        {{ __('The previous list WILL BE DELETED') }}</p>
                                    <div class="supporters_item">
                                        <div class="mb-2 row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="supporters_names[]"
                                                        class="form-control" placeholder="Supporter Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="file" name="supporters_images[]"
                                                        class="form-control" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <div class="btn btn-success add_supporter_more"><i
                                                        class="fas fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- // Tab 4 -->

                                <!-- Tab 5 -->
                                <div class="tab-pane show fade" id="p5" role="tabpanel"
                                    aria-labelledby="p5_tab">
                                    <h4 class="heading-in-tab">{{ __('Images') }}</h4>
                                    <div class="form-group">
                                        <label for="">{{ __('Existing Photos') }}</label>
                                        <div>
                                            @foreach ($competition->images as $image)
                                                <img src="{{ asset('storage/' . $image) }}" class="w_200"
                                                    alt="">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="photo_item">
                                        <div class="mb-2 row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="file" name="images[]" class="form-control"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <div class="btn btn-success add_photo_more"><i
                                                        class="fas fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab 5 -->


                                <!-- Tab 6 -->
                                <div class="tab-pane fade" id="p6" role="tabpanel" aria-labelledby="p6_tab">
                                    <h4 class="heading-in-tab">{{ __('Prizes') }}</h4>
                                    @if ($competition->prizes->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Serial') }}</th>
                                                        <th>{{ 'Prize Position' }}</th>
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
                                                                    <img src="{{ asset('storage/' . $prize->image) }}"
                                                                        alt="" class="w_200">
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

                                    <div class="prize_item">
                                        <div class="mb-2 row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="prizes[0][position]"
                                                        class="form-control" placeholder="Position">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="prizes[0][name]" class="form-control"
                                                        placeholder="Prize Name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="file" name="prizes[0][image]"
                                                        class="form-control" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <div class="btn btn-success add_prize_more"><i
                                                        class="fas fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- // Tab 6 -->


                                <!-- Tab 7 -->
                                <div class="tab-pane fade" id="p7" role="tabpanel" aria-labelledby="p7_tab">
                                    <h4 class="heading-in-tab">{{ __('Deductions') }}</h4>
                                    <div class="additional_feature_item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for=""
                                                    class="d-block">{{ __('Deduction Type') }}</label>
                                                <select name="deduction_type" class="form-control"
                                                    id="deduction_type" style="width: 100% !important">
                                                    <option value="fixed" @selected(old('deduction_type') == 'fixed' ?? $competition->deduction->type == 'fixed')>
                                                        {{ __('Fixed') }}</option>
                                                    <option value="percent" @selected(old('deduction_type') == 'percent' ?? $competition->deduction->type == 'percent')>
                                                        {{ __('Percentage') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">{{ __('Value') }}</label>
                                                    <div class="input-group">
                                                        <input type="number" name="deduction_value"
                                                            class="form-control"
                                                            value="{{ old('deduction_value') ?? ($competition->discount_fixed > 0 ? $competition->discount_fixed : $competition->discount_percent) }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                id="deduction_unit">EGP</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- // Tab 7 -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block mb_40">{{ __('Submit') }}</button>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#deduction_type').change(function() {
                const selected = $(this).val();
                if (selected === 'fixed') {
                    $('#deduction_unit').text('EGP');
                } else if (selected === 'percent') {
                    $('#deduction_unit').text('%');
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.add_social_more', function() {
            let container = $(this).closest('.social_item');
            let row = container.find('.row').first().clone();

            // Optionally, clear the selection
            row.find('select').val('');

            // Replace the plus icon with a minus for removing
            row.find('.add_social_more')
                .removeClass('btn-success add_social_more')
                .addClass('btn-danger remove_social_more')
                .html('<i class="fas fa-minus"></i>');

            container.append(row);
        });

        // Remove added row
        $(document).on('click', '.remove_social_more', function() {
            $(this).closest('.row').remove();
        });
        // Add new supporter row
        $(document).on('click', '.add_supporter_more', function() {
            let container = $(this).closest('.supporters_item');
            let row = container.find('.row').first().clone();

            // Clear input values
            row.find('input[type="text"]').val('');
            row.find('input[type="file"]').val('');

            // Convert plus to minus for new rows
            row.find('.add_supporter_more')
                .removeClass('btn-success add_supporter_more')
                .addClass('btn-danger remove_supporter')
                .html('<i class="fas fa-minus"></i>');

            container.append(row);
        });

        // Remove supporter row
        $(document).on('click', '.remove_supporter', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('click', '.add_photo_more', function() {
            let container = $(this).closest('.photo_item');
            let row = container.find('.row').first().clone();

            // Clear file input
            row.find('input[type="file"]').val('');

            // Change plus to minus
            row.find('.add_photo_more')
                .removeClass('btn-success add_photo_more')
                .addClass('btn-danger remove_photo')
                .html('<i class="fas fa-minus"></i>');

            container.append(row);
        });

        // Remove image input
        $(document).on('click', '.remove_photo', function() {
            $(this).closest('.row').remove();
        });

        let prizeIndex = 1;

        $(document).on('click', '.add_prize_more', function() {
            let container = $('.prize_item');
            let row = container.find('.row').first().clone();

            // Reset values
            row.find('input').val('');

            // Update name attributes with new index
            row.find('input[name]').each(function() {
                let name = $(this).attr('name');
                name = name.replace(/\[\d+\]/, '[' + prizeIndex + ']');
                $(this).attr('name', name);
            });

            prizeIndex++;

            // Change add to remove
            row.find('.add_prize_more')
                .removeClass('btn-success add_prize_more')
                .addClass('btn-danger remove_prize')
                .html('<i class="fas fa-minus"></i>');

            container.append(row);
        });

        $(document).on('click', '.remove_prize', function() {
            $(this).closest('.row').remove();
        });
    </script>
</x-dashboard.main-layout>
