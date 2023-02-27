    <div class="card-body">
        <div class="form-group">
            {{ Form::label('paid' , 'paid') }}
            {{ Form::text('paid' , old('paid') ,['class' => 'form-control'] ) }}
            @error('paid')
            <span class="bg-danger">  {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('note' , 'Note') }}
            {{ Form::text('note' , old('note') ,['class' => 'form-control'] ) }}
            @error('note')
            <span class="bg-danger"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('restaurant' , 'Rstaurant') }}
            {{ Form::select('restaurant_id', $select, null, ['class'=>'form-control']) }}
            @error('restaurant_id')
            <span class="bg-danger"> the retsuarant field is required </span>
            @enderror
        </div>
    </div>
    </div>
</div>