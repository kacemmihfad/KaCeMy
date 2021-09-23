@extends('Administration/layouts/Layout')

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
    <li><a href="">Emploi  @if($annee==11) 
               S1 
             @elseif($annee==12)
              S2 
            @elseif($annee==21)
             S3 
                  @elseif($annee==22)
            S4 
                  @elseif($annee==31)
            S5 
                  @else 
             S6 
              @endif</a></li>
    <li class="active">{{ $groupe->nom }}</li>
  </ol>
    </header>  
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('empStore') }}" method="POST">
                        @csrf
                            <table class="mainT print table" width=100%>
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
                                        <select name="L{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                                <td>---</td>
                                @for ($i = 2; $i < 5; $i++)
                                    <td>
                                        <select name="L{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                            <tr class="gradeX">
                                <th>Mardi</th>
                                @for ($i = 0; $i < 2; $i++)
                                    <td>
                                        <select name="M{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+8])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                                <td>---</td>
                                @for ($i = 2; $i < 5; $i++)
                                    <td>
                                        <select name="M{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+8])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                            <tr class="gradeX">
                                <th>Mercredi</th>
                                @for ($i = 0; $i < 2; $i++)
                                    <td>
                                        <select name="ME{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+16])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                                <td>---</td>
                                @for ($i = 2; $i < 5; $i++)
                                    <td>
                                        <select name="ME{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+16])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                            <tr class="gradeX">
                                <th>Jeudi</th>
                                @for ($i = 0; $i < 2; $i++)
                                    <td>
                                        <select name="J{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+24])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                                <td>---</td>
                                @for ($i = 2; $i < 5; $i++)
                                    <td>
                                        <select name="J{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+24])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                            <tr class="gradeX">
                                <th>Vendredi</th>
                                @for ($i = 0; $i < 2; $i++)
                                    <td>
                                        <select name="V{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+32])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                                <td>---</td>
                                @for ($i = 2; $i < 5; $i++)
                                    <td>
                                        <select name="V{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+32])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                            <tr class="gradeX">
                                <th>Samedi</th>
                                @for ($i = 0; $i < 2; $i++)
                                    <td>
                                        <select name="S{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+40])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                                <td>---</td>
                                @for ($i = 2; $i < 5; $i++)
                                    <td>
                                        <select name="S{{ $i+1 }}">
                                            <option value="0"></option>
                                            @foreach ($matieres as $g)
                                                @if($g->id==$content[$i+40])
                                                    <option value="{{ $g->id }}" selected>{{ $g->nom }}</option>
                                                @else
                                                    <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="nom" value="{{ $fileName }}">
                            <div class="don-t-print row">
                                <div class="col-sm-6">
                                    <input type="submit" class="btn btn-success" value="Enregistrer">
                                </div>
                            </div>
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

@endsection
