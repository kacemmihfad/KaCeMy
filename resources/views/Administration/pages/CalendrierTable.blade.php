@extends('Administration/layouts/Layout')

@section('content')

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
              <span class="info-box-text"><strong>Calendrier</strong></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description"> Ajoutez les nouveautés
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
<!-- Content Header (Page header) --> 
@if(session()->has('msg'))
    <div class="alert alert-success">
    <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
    <strong>Alert!</strong> 
   
            <p>{{ session()->get('msg') }}</p>
        </div>
    @endif

    @if(session()->has('successC'))
         
    <div class="alert alert-success">
    <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
    <strong>Alert!</strong> 
   
            <p>{{ session()->get('successC') }}</p>
        </div>
    @endif
    </header>
    

    <section class="content-header" id="printable">
        <form  action="{{ url('calendrier') }}" method="post">
            @csrf
            <div class="don-t-print row">
                <div  class="col-sm-3">
                  <input   class="Ser" placeholder="Rechercher..." type="text" name="nom">
                </div>
            </div>
        </form>
         
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row don-t-print">
                             
                        </div>
                        <table class="mainT print table" width=100%>
                            <thead>
                                <form action="saveCal" method="POST">
                                @csrf
                                <tr class="don-t-print">
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                </td>
                                                <td width=2%></td>
                                                <td width=95%>
                                                    <input name="evenement" type="text" class="form-control" id="Nom" placeholder="Nom de l'événement" required="required">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <input name="debut" type="date" class="form-control" id="debut" required="required">
                                    </td>
                                    <td>
                                        <input name="fin" type="date" class="form-control" id="fin" required="required">
                                    </td>
                                </tr>
                                </form>
                            </thead>
                            <tr>
                                <th>Événement</th>
                                <th>Date du Début</th>
                                <th>Date de la Fin</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @if ($cal->count())
                                    @foreach($cal as $c)

                                        <tr>
                                            <td>{{ $c->evenement }}</td>
                                            <td>{{ $c->date_D }}</td>
                                            <td>{{ $c->date_F }}</td>
                                            <td><a href="{{ url('deleteCal/'.$c->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>

                                    @endforeach
                                @else
                                <tr>
                                    <td></td>
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
