@extends('Etudiant/layouts/Layout')

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
        <h2>Absence</h2>
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
                                    <th>Date</th>
                                    <th>Module</th>
                                    <th>Séance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($absences->count())
                                    @foreach($absences as $c)

                                        <tr>
                                            <td>{{ $c->dat_abs }}</td>
                                            <td>{{ $c->matiere->nom }}</td>
                                            <td>de {{ $c->heureD }} à {{ $c->heureF }}</td>
                                        </tr>

                                    @endforeach
                                @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="don-t-print">
                            @if ($absences->count())
                                {{ $absences->links() }}
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
