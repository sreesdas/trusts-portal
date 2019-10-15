@if($agenda->agenda_url) 
    <a href="/webviewer/?portal=cpf&id={{ $agenda->id }}&document=agenda" class="btn btn-sm btn-outline-primary" target="_blank" >Agenda</a> 
@else
    <a href="#" class="btn btn-sm btn-light disabled">Agenda</a>
@endif

@if($agenda->brief_url) 
    <a href="/webviewer/?portal=cpf&id={{ $agenda->id }}&document=brief" class="btn btn-sm btn-outline-primary" target="_blank">Presentation</a>
@else 
    <a href="#" class="btn btn-sm btn-light disabled">Brief</a>
@endif

@if($agenda->presentation_url) 
    <a href="/webviewer/?portal=cpf&id={{ $agenda->id }}&document=presentation" class="btn btn-sm btn-outline-primary" target="_blank">Presentation</a>
@else 
    <a href="#" class="btn btn-sm btn-light disabled">Presentation</a>
@endif

@if( Auth::user()->isAdmin('cpf') )
    @if($agenda->notesheet_url) 
        <a href="/webviewer/?portal=cpf&id={{ $agenda->id }}&document=notesheet" class="btn btn-sm btn-outline-primary" target="_blank">Notesheet</a>
    @else 
        <a href="#" class="btn btn-sm btn-light disabled">Notesheet</a>
    @endif
@endif