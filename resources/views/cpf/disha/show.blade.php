@extends('layouts.app')

@section('content')
    
    <h2 class="my-3" > {{ $agenda->file_no }} </h2>
    <h5> {{ $agenda->subject }} </h5>
    <hr>

    @if( $agenda->merged_url )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            You have already merged this agenda. <a href="/cpf/disha/{{ $agenda->id }}/create" class="alert-link">Click here to skip merging and move to agenda creation page </a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{-- <a class="btn btn-outline-primary" href="/cpf/disha/{{ $agenda->id }}/create"> Create Agenda</a> --}}
    @endif 
    
    <div class="row">
        
        <div class="col-6">
            <h4> Files from disha </h4>
            <ul id="input" class="connectedSortable">
                @foreach ($annexures as $annexure)
                    <li class="ui-state-default" data-vsid="{{ $annexure["vsid"] }}" >
                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                        {{ $annexure["PLO_SequenceNumber"] }} - {{ $annexure["DocumentTitle"] }}
                        <a href="https://dishadocs.ongc.co.in/navigator/customViewer_read.jsp?docId={{ $annexure["docId"] }}" target="_blank" class="text-primary ml-2" >View</a>
                        {{-- <a href="https://dishadocs.ongc.co.in/fncmis/resources/PLOOS/ContentStream/{{ $annexure["docId"] }}" target="_blank" class="float-right">View</a> --}}
                        {{-- <a href="https://qafilenet.ongc.co.in/navigator/customViewer_read.jsp?docId={{ $annexure["docId"] }}" target="_blank" style="color:#3490dc" class="float-right">View</a> --}}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-6">
            <h4> Files to be Merged </h4>
            <ul id="output" class="connectedSortable">
                {{-- <li class="ui-state-default" data-vsid="0">
                    <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                    Blank Document 
                    <a href="#" class="float-right">View</a>
                </li> --}}
            </ul>
        </div>

        <div class="col-12 mb-4">
            <small> * Please drag and drop required files to the right pane for merging </small>
            <button class="btn btn-primary float-right" id="btn-sort" data-id="{{ $agenda->id }}">
                <i data-feather="loader" class="icon-btn d-none"></i>
                Start Merging
            </button>
        </div>
        
    </div>

    

@endsection