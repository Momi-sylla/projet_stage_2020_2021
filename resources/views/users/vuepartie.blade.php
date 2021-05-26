@extends('layouts.app')

@section('content')
<div>
    <table class="table table-striped ">
    
        <thead>
            <tr>
                <th scope="col">Parts</th>
                <th scope="col">nombre d'enseignants</th>
                <th scope="col">nombre de salles</th>
                
              
            </tr>
        </thead>
        <tbody>
            @foreach($typeparts[0] as $type)
            <tr>
            <th scope="row">{{$type->nom }}</th>
            <td scope="row">{{$type->nb_ens }}  <a href="#modifenseign" class="modifenseign" data-toggle="modal" data-id="{{ $type->id }}">&nbsp;&nbsp;modifier</a></td>
            <td scope="row">{{$type->nb_salle }}  <a href="#modifsalle" class="modifsalle" data-toggle="modal" data-id="{{  $type->id }}">&nbsp;&nbsp;modifier</a></td>
           
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    <a href="{{ route('userindex',$id)}}" class="retourenarriere" > 
            <h4> 
             <i class="material-icons" data-toggle="tooltip" title="parametres">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                </svg>
             </i>
       retour
            </h4>
    </a>
         
</div>
<div id="modifenseign" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('editnombreenseignant') }}">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Choisissez un nombre d'enseignants</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                <input id="id_part" type="hidden" class="form-control @error('name') is-invalid @enderror" name="id_part" value="">
                <div class="form-group row">
                            <label for="nb_ens" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <input id="nb_ens" type="number" name="nb_ens" required autofocus>

                                
                        </div>
                   
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="annuler">
                    <input type="submit" class="btn btn-info" name="action" value="envoyer">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="modifsalle" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('editnombresalle') }}">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Choisissez un nombre de salles</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                <input id="id_partsalle" type="hidden" class="form-control @error('name') is-invalid @enderror" name="id_partsalle" value="">
                <div class="form-group row">
                            <label for="nb_ens" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <input id="nb_salle" type="number" name="nb_salle" required autofocus>

                                
                        </div>
                   
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="annuler">
                    <input type="submit" class="btn btn-info" name="action" value="envoyer">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection