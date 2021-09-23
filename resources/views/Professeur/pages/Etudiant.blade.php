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
    <header class="don-t-print page-header">
    <ol class="breadcrumb">
    <li><a  href="{{ url('Home') }}">Home</a></li>
    <li class="active">Liste des étudiants</li>
  </ol>
    </header>
 
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
 

                        @if ($etudiants!=null)
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                     
                                             
                                                <table class="mainT print table" width=100%>
                                                    <thead>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Prenom</th> 
                                                            <th>Téléphone</th>
                                                            <th>CNE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($etudiants as $etudiant)

                                                 <tr>
                                                  <td>{{ $etudiant[0]->utilisateur->nom }}</td>
                                                  <td>{{ $etudiant[0]->utilisateur->prenom }}</td>
                                                  <td>+212{{ $etudiant[0]->utilisateur->GSM }}</td>
                                                  <td>{{ $etudiant[0]->utilisateur->adresse }}</td>
                                                </tr>

                                               @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                     
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
