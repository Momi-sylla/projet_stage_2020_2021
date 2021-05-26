@extends('layouts.app')

@section('content')
<div>
    <table class="table table-striped ">
    
        <thead>
            <tr>
                <th scope="col">Seances</th>
                <th scope="col">Salles</th>
                <th scope="col">contraintes</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(gettype($seances_cm)=='object')
            @for ($i=0;$i< count($seances_cm);$i++)
            <tr>
                <th scope="row">{{ $parts_cm[0]->nom.strval($i+1) }}</th>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="{{ $seances_cm[$i]->id }}" >
                        <i class="material-icons" data-toggle="tooltip" title="show"></i>
                        @if(!empty($salle_se[$i]))
                            @foreach($salle_se[$i] as $sal)
                                {{ $sal["nom"] }}
                            @endforeach
                        @else
                        choisir
                        @endif
                    </a>
                </td>
     
                <td>
                    <a href="#addconstraint" class="addconstraint" data-toggle="modal" data-id="{{ $seances_cm[$i]->id }}" > 
                        <i class="material-icons" data-toggle="tooltip" title="ajouter">
                            @if(!empty($typecontseance_cm[$i][0]))
                                @foreach($typecontseance_cm[$i] as $infocont)
                                {{$infocont->nom}} { {{$infocont->arguments }}}
                                @endforeach
                            @else
                            Ajouter
                            @endif
                        </i>
                                
                    </a>
                </td>
                <td>	
                    <a href="#supp" class="deletions" data-toggle="modal" data-id="{{ $seances_cm[$i]->id }}"> 
                        <i class="material-icons" data-toggle="tooltip" title="parametres">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
                        </i>
                    </a>

                </td>
     
             </tr>
            @endfor 
            @endif

            @if(gettype($seances_td)=='object')
            @for ($i=0;$i< count($seances_td);$i++)
            <tr>
                <th scope="row">{{ $parts_td[0]->nom.strval($i+1) }}</th>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="{{ $seances_td[$i]->id }}" > 
                        <i class="material-icons" data-toggle="tooltip" title="seances">
                            @if(!empty($salle_td[$i]))
                                @foreach($salle_td[$i] as $sal)
                                    {{ $sal["nom"] }}
                                @endforeach
                            @else
                                    choisir
                            @endif
                        </i>
                     
                    </a>
                </td>
                <td> <a href="#addconstraint" class="addconstraint" data-toggle="modal" data-id="{{ $seances_td[$i]->id }}" > 
                        <i class="material-icons" data-toggle="tooltip" title="show">
                        @if(!empty($typecontseance_td[$i][0]))
                                @foreach($typecontseance_td[$i] as $infocont)
                                {{$infocont->nom}} { {{$infocont->arguments }}}
                                @endforeach
                            @else
                            Ajouter
                            @endif</td>
                <td><a href="#supp" class="deletions" data-toggle="modal" data-id="{{ $seances_td[$i]->id }}"> 
                        <i class="material-icons" data-toggle="tooltip" title="parametres">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
                        </i>
                    </a>
                </td>
     
            </tr>
            @endfor 
            @endif

            @if(gettype($seances_tp)=='object')
            @for ($i=0;$i< count($seances_tp);$i++)

            <tr>
                <th scope="row">{{ $parts_tp[0]->nom.strval($i+1) }}</th>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="{{ $seances_tp[$i]->id }}" > 
                        <i class="material-icons" data-toggle="tooltip" title="show">
                                @if(!empty($salle_tp[$i]))
                                    @foreach($salle_tp[$i] as $sal)
                                        {{ $sal["nom"] }}
                                    @endforeach
                                @else
                                    choisir
                                @endif  
                        </i>
                                
                    </a>
                </td>
                <td>
                    <a href="#addconstraint" class="addconstraint" data-toggle="modal" data-id="{{ $seances_tp[$i]->id }}" > 
                        <i class="material-icons" data-toggle="tooltip" title="show">
                        @if(!empty($typecontseance_tp[$i][0]))
                                @foreach($typecontseance_tp[$i] as $infocont)
                                {{$infocont->nom}} { {{$infocont->arguments }}}
                                @endforeach
                            @else
                            Ajouter
                            @endif
                        </i>
                                
                    </a>
                </td>
      
                <td>	
                <a href="#supp" class="deletions" data-toggle="modal" data-id="{{ $seances_tp[$i]->id }}"> 
                        <i class="material-icons" data-toggle="tooltip" title="parametres">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
                        </i>
                    </a>

                </td>
     
            </tr>
            @endfor 
            @endif

            @if(gettype($seances_ctd)=='object')
            @for ($i=0;$i< count($seances_ctd);$i++)
            <tr>
                <th scope="row">{{ $parts_ctd[0]->nom.strval($i+1) }}</th>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="{{ $seances_ctd[$i]->id }}" > <i class="material-icons" data-toggle="tooltip" title="show">
                                
                        @if(!empty($salle_ctd[$i]))
                            @foreach($salle_ctd[$i] as $sal)
                                {{ $sal["nom"] }}
                            @endforeach
                        @else
                                choisir
                        @endif     
                    </a>
                </td>
                <td>
                    <a href="#addconstraint" class="addconstraint" data-toggle="modal" data-id="{{ $seances_ctd[$i]->id }}" > 
                        <i class="material-icons" data-toggle="tooltip" title="show">
                        @if(!empty($typecontseance_ctd[$i][0]))
                                @foreach($typecontseance_ctd[$i] as $infocont)
                                {{$infocont->nom}} { {{$infocont->arguments }}}
                                @endforeach
                            @else
                            Ajouter
                            @endif
                        </i>
                                
                    </a>
                </td>
     
                <td>	
                <a href="#supp" class="deletions" data-toggle="modal" data-id="{{ $seances_ctd[$i]->id }}"> 
                        <i class="material-icons" data-toggle="tooltip" title="parametres">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
                        </i>
                    </a>

                </td>
     
            </tr>
            @endfor 
            @endif

        </tbody>
    </table>
</div>

<div>
<a href="{{ route('showparties',$id_matiere) }}" class="btn btn-primary"> 
                        <i class="material-icons" data-toggle="tooltip" title="parties">
                         Infos Sur Les Parties
                        </i>
                    </a>
</div> 
    

<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('editseancesalle') }}">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Choisissez Les Salles</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                <input id="nameseance" type="hidden" class="form-control @error('name') is-invalid @enderror" name="nameseance" value="">
                
                    @foreach ($salles as $sal)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $sal->nom }}" id="checksalle" name="namesalle[]" >
                    <label class="form-check-label" for="flexCheckChecked">
                    {{ $sal->nom }}  Capacité : {{ $sal->capacite }}
                    </label>
                    </div>
                    @endforeach	
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="annuler">
                    <input type="submit" class="btn btn-info" name="action" value="ajouter">
                    <input type="submit" class="btn btn-dark" name="action" value="remplacer">
				</div>
			</form>
		</div>
	</div>
</div>



<div id="supp" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('deletecontrmat') }}">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Suppression</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                <input id="cont" type="hidden" class="form-control @error('name') is-invalid @enderror" name="cont" value="" >
                
                 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="salles" id="supp" name="suppcont[]" > 
                    <label class="form-check-label" for="flexCheckChecked">
                    salles
                    </label>
                    <br />
                    <input class="form-check-input" type="checkbox" value="contraintes" id="supp" name="suppcont[]" />
                    <label class="form-check-label" for="flexCheckChecked">
                    Contraintes
                    </label>
                    </div>
                
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="annuler">
                    <input type="submit" class="btn btn-dark" name="action" value="valider">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="addconstraint" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="POST" action="{{ route('ajoutcontrainte') }}">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter les Contraintes</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                
                <input id="constraint" type="hidden" class="form-control @error('name') is-invalid @enderror" name="constraint" value="">
               
                <label for="typeconstr" class="col-md-4 col-form-label text-md-right">{{ __('Type de contrainte') }}</label>

                <select class="form-control" name="typeconstr">
                @foreach($typecontraintes as $type)
				    <option value="{{ $type->nom }}"> {{ $type->nom }} </option>
                @endforeach
                </select>
              
                    <label for="argument" class="col-md-4 col-form-label text-md-right">{{__('Arguments') }}</label>

                    <input id="argument" type="text" class="form-control @error('name') is-invalid @enderror" name="argument" value=""  autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror    
              
						
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="annuler">
					<input type="submit" class="btn btn-info" value="valider">
				</div>
			</form
		</div>
	</div>
</div>



@endsection