
  var controladorTiempo = "";

  $("#SearchText").on("keyup", function() {
    clearTimeout(controladorTiempo);
    controladorTiempo = setTimeout(BuscarUserCaja, 250);
});

function BuscarUserCaja(){
        var valor = document.getElementById('SearchText').value;
        if(valor!=""){
          console.log(valor);
          // document.getElementById('bloques').style.display = "";
          // document.getElementById('bloques').disabled =false;

          $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "BuscarUser",
                data: {
                     "_token":"{{ csrf_token() }}",//pass the CSRF_TOKEN()
                     "Nombre": valor,
                    
                },
                success: function(data) {

                  
                       //console.log(data.Users);
                     addOptions('User',data.Users);
                    

                }
            });

        }else{
         
            console.log('campo vacio ');

        }
}

    function addOptions(domElement, array) {
 var select = document.getElementsByName(domElement)[0];
 var option = document.createElement("option");
 var option2 = document.createElement("option");
 select.innerHTML='';
 option.text='....';
 select.add(option);
 option2.text='NO REGISTRADO';
 option2.value=0;
 select.add(option2);
 for (value in array) {
  var option = document.createElement("option");
  option.value=array[value].id;
  option.text = array[value].name +" "+array[value].surname+"--"+array[value].email ;
  select.add(option);
 }

}
