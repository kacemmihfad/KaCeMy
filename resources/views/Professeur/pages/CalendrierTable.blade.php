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
  
        <div align="center" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">&nbsp;</span>
              <span class="info-box-text"><strong> Calendrier </strong></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">Les nouveautés 
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
                        <table class="mainT print table" width=100%>
                            <thead>
                                <tr>
                                    <th>Événement</th>
                                    <th>Date du Début</th>
                                    <th>Date de la Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cal->count())
                                    @foreach($cal as $c)

                                        <tr>
                                            <td>{{ $c->evenement }}</td>
                                            <td>{{ $c->date_D }}</td>
                                            <td>{{ $c->date_F }}</td>
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
