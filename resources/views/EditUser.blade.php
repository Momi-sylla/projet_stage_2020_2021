@extends('layouts.app')

@section('content')
    
    
    <div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('update',$user->id) }}">
           
            	@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Zone d'édition</h4>
					
				</div>
				<div class="modal-body">					
					<div class="form-group">
					
					<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
	
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				<button type="submit" class="btn btn-primary">
                                    {{ __('valider') }}
                                </button>
				</div>
			</form >
		</div>
	</div>
</div>

@endsection