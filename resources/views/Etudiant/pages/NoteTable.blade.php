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
    <script>
        window.onload = function(){
            document.getElementById("s").value = {{ $semestre }};
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
        <h2>Les Notes</h2>
    </header>

     
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                         
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                                <table class="mainT print table" width=100%>
                                                    <thead>
                                                        <tr>
                                                            <th>Module</th>
                                                            <th>Examen</th>
                                                            <th>Controle 1</th>
                                                            <th>Controle 2</th>
                                                            <th>Mini-projet</th> 
                                                            <th>Remarque</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                    @for($i=0;$i<count($ex1);$i++)

<tr>
    <td width=10%>
        @if ($ex1[$i]["note"])
            @if ($rem)
                <br>
            @endif
        @endif
        {{ $ex1[$i]["mat"]->nom }}
    </td>
    <td width=18%>
       15,50
    </td>
    <td width=18%>
        -
    </td>
    <td width=18%>
       -
    </td>
    <td width=18%>
       -
    </td>
    <td width=18%>
      bien
    </td>
</tr>
@endfor
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
