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
                <td></td>
     
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
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"> 
                        <i class="material-icons" data-toggle="tooltip" title="show">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
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
                    <a href="#editEmployeeModa" class="edit" data-toggle="modal" > 
                        <i class="material-icons" data-toggle="tooltip" title="show">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
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
			<form method="POST" action="{{ route('deletecontr') }}">
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
                    <input type="submit" class="btn btn-dark" name="action" value="ajouter">
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

                    <input id="argument" type="text" class="form-control @error('name') is-invalid @enderror" name="argument" value="" required autocomplete="name" autofocus>

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