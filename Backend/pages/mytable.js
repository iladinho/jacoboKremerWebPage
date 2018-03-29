var dataSet = [];
$(document).ready(function() { 
       $.ajax({
              url: "articulos.php",
              method: "POST",
              dataType: "json",
              success: function(data){
                    var datas = [];
                    $.each(data,function(){
                        $.each(this,function(key,value){
                            datas.push(value);
                        });
                        dataSet.push(datas);
                        datas = [];
                    });

                    //ARTICLES TABLE CREATION
/*-------------------------------------------------------------------------------------------------------------*/
                    var table = $('#example').DataTable({
                        data: dataSet,
                        responsive:true,
                    });

                    //Get article id on clicking row
                    $('#example tbody').on('click', 'tr', function () {
                        alert(table.row(this).data()[0]);
                    } );

                    // Apply the search
                    table.columns().eq(0).each(function (colIdx) {
                        $('input', table.column(colIdx).footer()).on('keyup change', function () {
                            table.column (colIdx)
                            .search (this.value, true, false)
                            .draw ();
                        } );
                    } );
                    
            
                    // Setup - add a text input to each footer cell
                    $('#example tfoot th').each( function () {
                        var title = $(this).text();
                        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                    } );
                
/*-------------------------------------------------------------------------------------------------------------*/
                }
        });
});


        // function redirection(){  
        
        //  window.location ="articulos.html";
        
        //  }