@extends('layouts.app')

@section('title')
    Edit-Registered
@endsection

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">Uredi Rolu za Registrirane Korisnike</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">

                                        <form action="{{ url('role-register-update/'.$users->id) }}"method="POST">
                                                {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                                  <div class="form-group">
                                            <tr>
                                              <label>Ime:</label>
                                             <td>{{$users->name}} {{$users->surname}}</td>
                                                </div>

                                                <div class="form-group">
                                                      <label >Dodijeli Rolu</label>
                                                      <select name="role" class="form-group">
                                                          <option value="0">0</option>
                                                          <option value="1">1</option>
                                                      </select>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">
                                                            Ažuriraj
                                                        </button>
                                                        <a href="{{ url('/role-register') }}"  class="btn btn-secondary">Odustani</a>


                                        </form>



                                </div>

                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@endsection
