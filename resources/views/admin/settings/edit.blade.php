<x-dashboard.main-layout>

    <div class="card-body">
        <form class="my-3" action="{{ route('admins.settings.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4 shadow card t-left">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="p1_tab" data-toggle="pill" href="#p1"
                                    role="tab" aria-controls="p1" aria-selected="true">{{ __('Main Setting') }}</a>
                                <a class="nav-link" id="p2_tab" data-toggle="pill" href="#p2" role="tab"
                                    aria-controls="p2" aria-selected="false">{{ __('Profit Managment') }}</a>
                                {{-- <a class="nav-link" id="p3_tab" data-toggle="pill" href="#p3" role="tab"
                                    aria-controls="p3" aria-selected="false">{{ __('Moderators') }}</a>
                                <a class="nav-link" id="p4_tab" data-toggle="pill" href="#p4" role="tab"
                                    aria-controls="p4" aria-selected="false">{{ __('Sponsers') }}</a>
                                <a class="nav-link" id="p5_tab" data-toggle="pill" href="#p5" role="tab"
                                    aria-controls="p5" aria-selected="false">{{ __('Gallery') }}</a>
                                <a class="nav-link" id="p6_tab" data-toggle="pill" href="#p6" role="tab"
                                    aria-controls="p6" aria-selected="false">{{ __('Prizes') }}</a>
                                <a class="nav-link" id="p7_tab" data-toggle="pill" href="#p7" role="tab"
                                    aria-controls="p7" aria-selected="false">{{ __('Deductions') }}</a> --}}
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">

                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active" id="p1" role="tabpanel"
                                    aria-labelledby="p1_tab">

                                    <div class="form-group">
                                        <label for="">{{ __('Existing Logo') }}</label>
                                        <div>
                                            @isset($settings['logo'])
                                                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo"
                                                    class="img-fluid" style="max-width: 200px;">
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('Logo') }}</label>
                                        <div>
                                            <input type="file" name="logo" class="form-control" accept="image/*">
                                        </div>
                                        <small
                                            class="form-text text-muted">{{ __('Leave blank if you don\'t want to change it.') }}
                                        </small>
                                        <button type="button" class="mt-2 btn btn-outline-danger btn-sm"
                                            id="deleteImageButton">
                                            {{ __('Delete Image') }}
                                        </button>
                                    </div>
                                </div>
                                <!-- // Tab 1 -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block mb_40">{{ __('Submit') }}</button>
        </form>

    </div>

    <script>
        
    </script>
</x-dashboard.main-layout>
