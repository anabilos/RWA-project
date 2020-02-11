@extends('layouts.create')
@section('velicina')
            <div class="form-group">
                {{ Form::label('name', 'Veličina') }}</br>
                @foreach($sizes as $id => $name)
                <label class="checkbox-inline">
                  <input type="checkbox"  name="si[]" value="{{ $name->id }}" >   {{ $name->name }}
                </label>
              @if($id==2)
                @break
                @endif
                  @endforeach
@endsection

            </div>
@section('kategorija')



      <div class="form-group">
          {{ Form::label('name', 'Kategorija') }}</br>
        <select name="category_id" required style="width:100%; height:40px">
        @foreach ($categories as $id => $category)
        @if($id!=4)
               <option value="{{ $category->id}}" >{{ $category->name }}</option>

        @endif
    @endforeach
  </select>
              </div>



@endsection
