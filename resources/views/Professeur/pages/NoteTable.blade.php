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
            document.getElementById("s").value = {{ $semestre }};
            document.getElementById("c").value = {{ $class }};
            document.getElementById("e").value = {{ $exam }};
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
    <div align="center" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">&nbsp;</span>
              <span class="info-box-text"><strong>Notes</strong></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description"> Ajoutez les notes
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </header>

     
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="don-t-print">
                            <form action="{{ url('Pnote') }}" method="GET">

                                <div class="row">
                                    <div class="col-xs-4">
                                        <select name="class" class="form-control" style="width: 100%;" id="c">
                                            @foreach ($groupes as $groupe)
                                                <option value="{{ $groupe['id'] }}"> {{ $groupe['nom'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-xs-4">
                                        <select name="exam" class="form-control" style="width: 100%;" id="e">
                                            <option value="1">Examen</option>
                                            <option value="2">Controle1</option>
                                            <option value="3">Controle2</option>
                                            <option value="4">Mini-Projet</option> 
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <button type="submit" class="btn btn-success" style="width: 100%;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ajouter</button>
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
                                            <form action="{{ url('saveNote') }}" method="POST">
                                                @csrf
                                                <table class="mainT print table" width=100%>
                                                    <thead>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Prenom</th>
                                                            <th>Notes</th>
                                                            <th>Remarques</th>
                                                            <input type="hidden" name="class" value="{{ $class }}">
                                                            <input type="hidden" name="semestre" value="{{ $semestre }}">
                                                            <input type="hidden" name="exam" value="{{ $exam }}">
                                                            <input type="hidden" name="matiere" value="{{ $prof->matiere->id }}">
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach($etudiants as $etudiant)

                                                                <tr>
                                                                    <td>{{ $etudiant[0]->utilisateur->nom }}</td>
                                                                    <td>{{ $etudiant[0]->utilisateur->prenom }}</td>
                                                                    <td class="col-xs-3">
                                                                        @if($etudiant[1]!=null)
                                                                            <input onkeyup="verify('{{ $etudiant[0]->id }}');" class="form-control" type="text" name="{{ $etudiant[0]->id }}" style="width: 100%;text-align:center;" id="{{ $etudiant[0]->id }}" value="{{ $etudiant[1]->note }}" pattern="[0-2][0-9],[0-9][0-9]" title="La note doit être écrite comme 12,50" required>
                                                                        @else
                                                                            <input onkeyup="verify('{{ $etudiant[0]->id }}');" class="form-control" type="text" name="{{ $etudiant[0]->id }}" style="width: 100%;text-align:center;" id="{{ $etudiant[0]->id }}" pattern="[0-2][0-9],[0-9][0-9]" title="La note doit être écrite comme 12,50" required>
                                                                        @endif
                                                                    </td>
                                                                    <td class="col-xs-3">
                                                                        @if($etudiant[1]!=null)
                                                                            <input type="text" name="remarque{{ $etudiant[0]->id }}" class="form-control" value="{{ $etudiant[2]->remarque }}" required>
                                                                        @else
                                                                            <input type="text" name="remarque{{ $etudiant[0]->id }}" class="form-control" required>    
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
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
