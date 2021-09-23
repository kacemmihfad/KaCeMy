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
    <li class="active">Groupes</li>
  </ol>
    </header>

     
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="mainT print table" width=100%>
                            <thead>
                                <tr>
                                    <th>Nom-Groupe</th>
                                    <th>Liste d'étudiants</th> 
                                    <th class="don-t-print">Absence</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($groupes)>0)
                                    @foreach ($groupes as $groupe)

                                        <tr>
                                            <td>{{ $groupe['nom'] }}</td> 
                                            <td><a href="{{ url('etudiantes/'.$groupe['id']) }}" class="btn btn-dark"> Etudiants</td>
                                            <td class="don-t-print"><a href="{{ url('Pabsence/'.$groupe['id']) }}" class="btn btn-dark">Absence</a></td>
                                        </tr>

                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="don-t-print"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
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
