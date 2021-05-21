@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><h2>{{$matiere->nom}}</h2></div>
                    @if($bool)
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Infos Séances</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nombre de séances CM</th>
                                <td>{{$cpt_cm}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nombre de séances TD</th>
                                <td>{{$cpt_td}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nombre de séances TP</th>
                                <td>{{$cpt_tp}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nombre de séances CTD</th>
                                <td>{{$cpt_ctd}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                            <i class="bi bi-plus-circle-fill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                 <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                 </svg>
                            </i> 
                            <span>Créer Des Séances

                            </span>
                        </a>
						
                    </a>						
					</div>
    </div>
   
</div>
@endif

<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action=" {{ route('show',$matiere->id)}} ">
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Nouvelle Séance</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                
				<div class="modal-body">	
                <div class="form-group">
					<div class="form-group row">

                                <input id="id_mat" type="hidden" class="form-control @error('name') is-invalid @enderror" name="id_mat" value="{{$matiere->id}}" required autocomplete="name" autofocus>

                  </div>				
					<div class="form-group">
					<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                        </div>
					</div>
					<div class="form-group">
					<div class="form-group row">
                            <label for="nb_cm" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de CM') }}</label>

                                <input id="nb_cm" type="text" class="form-control @error('name') is-invalid @enderror" name="nb_cm" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                        </div>
					</div>
                    <div class="form-group">
					<div class="form-group row">
                            <label for="nb_td" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de TD') }}</label>

                                <input id="nb_td" type="text" class="form-control @error('name') is-invalid @enderror" name="nb_td" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                        </div>
					</div>
                    <div class="form-group">
					<div class="form-group row">
                            <label for="nb_tp" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de TP') }}</label>

                                <input id="nb_tp" type="text" class="form-control @error('name') is-invalid @enderror" name="nb_tp" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                        </div>
					</div>
                    <div class="form-group">
					<div class="form-group row">
                            <label for="nb_ctd" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de CTD') }}</label>

                                <input id="nb_ctd" type="text" class="form-control @error('name') is-invalid @enderror" name="nb_ctd" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                        </div>
					</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				<button type="submit" class="btn btn-primary">
                                    {{ __('enregistrer') }}
                                </button>
				</div>
			</form >
		</div>
	</div>
</div>

@endsection