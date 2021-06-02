@extends('user.layout.app')

@section('content')
 @endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {

    $("#btnSubmit").click(function (event) {

    event.preventDefault();

    $.ajax({
       type: "POST",
       url: "{{url('/fare')}}",
       data: $("#idForm").serialize(),

       success: function(data)
       { 
           $("#div1").show();
           $("#div2").show();
           $("#div1").html("fasi miaxloebit - R$"+data.estimated_fare+",00");
           $("#div2").html("distancia - "+data.distance+" Km(s)");
       }
     });


 

   });

});

</script>


@endsection



