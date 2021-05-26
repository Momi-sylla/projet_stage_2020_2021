@extends('layouts.app')

@section('content')

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2> <b>Utilisateurs</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                            <i class="bi bi-plus-circle-fill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                 <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                 </svg>
                            </i> 
                            <span>nouvel utilisateur

                            </span>
                        </a>
						
                    </a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>Nom</th>
						<th>Email</th>
						<th>Date création</th>
						<th>rôles</th>
						<th>Actions</th>
					</tr>
                </thead>
				
               
				
				
                <tbody>
				@foreach($userlists[0] as $user)
					<tr>
					
						<td>{{$user->num}}</td>
						<td>{{$user->nom}}</td>
						<td>{{$user->email }}</td>	
						<td>{{$user->date_crea }}</td>
						<td>{{ $user->name }}</td>
						
						<td>
							<a href="{{ route('edit',$user->num) }}">
									<i class="material-icons" data-toggle="tooltip" title="Edit">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
										<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
										</svg>
									</i>
							</a>
							
							<a href="#deleteuserModal" class="deleteuser" data-toggle="modal" data-id="{{ $user->num }}" >
								<i>  
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</i>
							</a>
						</td>
                    </tr>
					@endforeach
				</tbody>
			</table>
					
		</div>
	</div>
</div>

<div id="deleteuserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="Post" action="{{ route('delete')  }} ">
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Supprimer Utilisateurs</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>êtes vous sûr de vouloir supprimmer cet utilisateur ?</p>
					<p class="text-danger"><small>Cette action est irreversible</small></p>
					<input type="hidden" name="valeurusersup" id="valeurusersup" value="">
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="/VueUser">
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Nouvel Utilisateur</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
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
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E mail') }}</label>

								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
					</div>
					<div class="form-group">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				<div class="form-group">
					<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
									</div>					
				</div>
				<div class="form-group">
					<label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Rôle') }}</label>

					<select class="form-control" name="role_id">
						<option value="user">user</option>
						<option value="guest">guest</option>
					</select>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				<button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
				</div>
			</form >
		</div>
	</div>
</div>



@endsection
