<div class="row">
    <div class="col-lg-6">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control demo', 'placeholder' => 'enter name']) !!}
    </div>
    <div class="col-lg-6">
        {!! Form::label('value', 'Value') !!}
        {!! Form::number('value', null, ['class' => 'form-control demo', 'placeholder' => 'enter value']) !!}
    </div>

    <div class="col-lg-12 mt-4">
        {!! Form::label('Status', 'Status') !!}
        {!! Form::select('status', [1 => 'Active', 2 => 'Inactive'], null, [
            'class' => 'form-select demo',
            'placeholder' => 'select status',
        ]) !!}
    </div>
</div>
