<div class="row">
    <div class="col-lg-6">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'blog title...']) !!}
        @error('title')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>
    <div class="col-lg-6">
        {!! Form::label('designation', 'Designation') !!}
        {!! Form::text('designation', null, [
            'class' => 'form-control form-control-sm',
            'placeholder' => 'designation...',
        ]) !!}
        @error('designation')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>

    <div class="col-lg-6 mt-4">
        {!! Form::label('date', 'Experience year') !!}
        <input type="text" name="datefilter" value="" class="form-control form-control-sm"
            placeholder="'experience..." />
    </div>

    <div class="col-lg-12 mt-4">
        {!! Form::label('description', 'description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'id' => 'desciption']) !!}
        @error('description')
            <p class="text-danger position-absolute"><small>{{ $message }}</small></p>
        @enderror
    </div>
</div>
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#desciption'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script type="text/javascript">
        $(function() {

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>
@endpush
