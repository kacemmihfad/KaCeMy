@extends('Administration/layouts/Layout')

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
        function fill(nom,fil,id){
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            document.getElementById('Nom').value=nom;
            document.getElementById('filiere').value=fil;
            document.getElementById('edit').value=id;
        }
    </script>
    <header class="don-t-print page-header">
    <div align="center" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">&nbsp;</span>
              <span class="info-box-text"><strong>Les Groupes</strong></span>
              <span class="info-box-text">
              @if($an==11) 
              <small class="label pull-center bg-green">Semestre 1</small>
             @elseif($an==12)
             <small class="label pull-center bg-green">Semestre 2</small>
            @elseif($an==21)
            <small class="label pull-center bg-green">Semestre 3</small>
                  @elseif($an==22)
            <small class="label pull-center bg-green">Semestre 4</small>
                  @elseif($an==31)
            <small class="label pull-center bg-green">Semestre 5</small>
                  @else 
                  <small class="label pull-center bg-green">Semestre 6</small>
              @endif
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description"> Ajouter un nouveau Groupe
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    
    @if(session()->has('errorG'))
        <div class="don-t-print alert alert-danger alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p>{{ session()->get('errorG') }}</p>
        </div>
    @endif

    @if(session()->has('successG'))
        <div class="don-t-print alert alert-success alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <p>{{ session()->get('successG') }}</p>
        </div>
    @endif
    </header>
    <section class="content-header" id="printable">
        <form action="{{ url('semestre') }}" method="post">
            @csrf
            <div class="don-t-print row">
                <div class="col-sm-3">
                    <input class="Ser" placeholder="Rechercher..." type="text" name="nom">
                    <input type="hidden" name="an" value="{{ $an }}">
                </div>
            </div>
        </form>
        <ol class="don-t-print breadcrumb">
            <li><button onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i></button></li>
        </ol>
        </section>
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="mainT print table" width=100%>
                            <thead>
                                <form action="{{ url('saveC') }}" method="POST">
                                    @csrf
                                    <tr class="don-t-print">
                                        <td><input type="text" class="form-control" id="Nom" placeholder="Nom" required="required" name="nom" value="">
                                            <input type="hidden" name="an" value="{{ $an }}"><input id="edit" type="hidden" name="edit" value="0"></td>
                                        <td>
                                            <div class="col-sm-6">
                                                <select name="filiere" id="filiere">
                                                    @foreach ($filieres as $filiere)
                                                        <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <a href="{{ url('filiere') }}" class="btn btn-default">Autre</a>
                                        </td>
                                        <td colspan="3"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button></td>
                                    </tr>
                                </form>
                            </thead>
                            <tr>
                                <th>Nom-Classe</th>
                                <th>Filière</th>
                                <th class="don-t-print">Emplois</th>
                                <th class="don-t-print">Etudiants</th>
                                <th class="don-t-print">Action</th>
                            </tr>
                            <tbody>
                                @if ($groupes->count())
                                    @foreach ($groupes as $groupe)

                                        <tr>
                                            <td>{{ $groupe->nom }}</td>
                                            <td>{{ $groupe->filiere->nom }}</td>
                                            <td class="don-t-print"><a href="{{ url('emplois/'.$groupe->id) }}" class="btn btn-dark">Emplois</a></td>
                                            <td class="don-t-print"><a href="{{ url('etudiants/'.$groupe->id) }}" class="btn btn-dark">Etudiants</a></td>
                                            <td class="don-t-print"><button onclick="fill('{{ $groupe->nom }}','{{ $groupe->filiere->id }}','{{ $groupe->id }}');" class="btn btn-file"><i class="fa fa-pencil"></i></button>
                                                &nbsp;<a href="{{ url('Cdelete/'.$groupe->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>

                                    @endforeach
                                @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="don-t-print"></td>
                                    <td class="don-t-print"></td>
                                    <td class="don-t-print"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="don-t-print">
                            @if ($groupes->count())
                                {{ $groupes->links() }}
                            @endif
                        </div>
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
