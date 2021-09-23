@extends('Professeur/layouts/Layout')

@section('content')
<!-- Content Header (Page header) -->
    <style>
        @media print {
			.print{
				min-width: 150px !important;
				max-width: 150px !important;
            }
        }
    </style>
    <script>
        window.onload = function(){
            document.getElementById("debut").value = {{ $debut }};
            document.getElementById("fin").value = {{ $fin }};
        }

        function verify(id){
            var note=document.getElementById(id).value;
            var len=note.length;
            if(note.charAt(0)=='0'){
                document.getElementById(id).value=note.substring(1,len);
            }
            if(note>20){
                document.getElementById(id).value=note.substring(0,len-1);
            }
            if(note.length>5){
                document.getElementById(id).value=note.substring(0,5);
            }
        }
    </script>
    <header class="don-t-print page-header">
    <ol class="breadcrumb">
    <li><a  href="{{ url('Home') }}">Home</a></li>
    <li class="active">Absence</li>
  </ol>
    </header>

   
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="don-t-print">
                            <form action="{{ url('Pabsence/'.$groupe) }}" method="GET">

                                <div class="row">
                                    <div class="col-xs-8">
                                        <table width="100%">
                                            <tr>
                                                <td width="12%"><strong>Séance de</strong></td>
                                                <td>
                                                    <select name="HeureD" class="form-control" style="width: 100%;" id="debut">
                                                        <option value="8:30">8:30</option> 
                                                        <option value="10:30">10:15</option> 
                                                        <option disabled>--------</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="15:30">15:45</option>
                                                        <option value="17:15">17:30</option> 
                                                    </select>
                                                </td>
                                                <td><strong>à</strong></td>
                                                <td>
                                                    <select name="HeureF" class="form-control" style="width: 100%;" id="fin">
                                                        
                                                        <option value="10:30">10:00</option>
                                                        <option value="11:45">11:45</option> 
                                                        <option disabled>--------</option>
                                                        <option value="15:30">15:30</option> 
                                                        <option value="17:15">17:15</option>
                                                        <option value="19:00">19:00</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-success" style="width: 100%;"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Chercher</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        @if ($etudiants!=null)
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <form action="{{ url('saveAbsence') }}" method="POST">
                                                @csrf
                                                <table class="mainT print table" width=100%>
                                                    <thead>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Prenom</th>
                                                            <th>Absence</th>
                                                            <input type="hidden" name="debut" value="{{ $debut }}">
                                                            <input type="hidden" name="fin" value="{{ $fin }}">
                                                            <input type="hidden" name="matiere" value="{{ $prof->matiere->id }}">
                                                            <input type="hidden" name="groupe_id" value="{{ $groupe }}">
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach($etudiants as $etudiant)

                                                                <tr>
                                                                    <td>{{ $etudiant[0]->utilisateur->nom }}</td>
                                                                    <td>{{ $etudiant[0]->utilisateur->prenom }}</td>
                                                                    <td class="col-xs-3">
                                                                        <div class="form-check form-check-inline">
                                                                            @if ($etudiant[1])
                                                                                <input name="{{ $etudiant[0]->id }}" type="checkbox" class="form-check-input" id="materialInline1" checked>
                                                                            @else
                                                                                <input name="{{ $etudiant[0]->id }}" type="checkbox" class="form-check-input" id="materialInline1">
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td><button type="submit" class="don-t-print btn btn-success">Enregistrer</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </form>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                            </section>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>

@endsection
