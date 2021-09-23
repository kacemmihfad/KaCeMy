@extends('Professeur/layouts/Layout')

@section('content')
<!-- Content Header (Page header) -->
    <style>
        @media print {
			.print{
				min-width: 5px !important;
				max-width: 5px !important;
            }
        }
    </style>
    <header class="don-t-print page-header">
    <ol class="breadcrumb">
    <li><a href="{{ url('Home') }}">Home</a></li> 
    <li class="active">Emploi</li>
  </ol>
    </header>
 
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="mainT print table table-bordered table-striped" width=100%>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="text-align:center;">8h30-10h00</th>
                                        <th style="text-align:center;">10h15-11h45</th> 
                                        <th>  </th>
                                        <th style="text-align:center;">14h00-15h30</th>
                                        <th style="text-align:center;">15h45-17h15</th>
                                        <th style="text-align:center;">17h30-19h00</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX">
                                    <th>Lundi</th>
                                    @for ($i = 0; $i < 2; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    <td>---</td>
                                    @for ($i = 2; $i < 5; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
                                <tr class="gradeX">
                                    <th>Mardi</th>
                                    @for ($i = 0; $i < 2; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+8])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    <td>---</td>
                                    @for ($i = 2; $i < 5; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+8])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
                                <tr class="gradeX">
                                    <th>Mercredi</th>
                                    @for ($i = 0; $i < 2; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+16])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    <td>---</td>
                                    @for ($i = 2; $i < 5; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+16])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
                                <tr class="gradeX">
                                    <th>Jeudi</th>
                                    @for ($i = 0; $i < 2; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+24])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    <td>---</td>
                                    @for ($i = 2; $i < 5; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+24])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
                                <tr class="gradeX">
                                    <th>Vendredi</th>
                                    @for ($i = 0; $i < 2; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+32])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    <td>---</td>
                                    @for ($i = 2; $i < 5; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+32])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
                                <tr class="gradeX">
                                    <th>Samedi</th>
                                    @for ($i = 0; $i < 2; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+40])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                    <td>---</td>
                                    @for ($i = 2; $i < 5; $i++)
                                        <td>
                                            @foreach ($groupe as $g)
                                                @if($g->id==$content[$i+40])
                                                    {{ $g->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endfor
                                </tr>
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
