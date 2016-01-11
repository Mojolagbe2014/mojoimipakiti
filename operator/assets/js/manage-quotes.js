$(document).ready(function(){
    $("form#CreateQuote").submit(function(e){ 
        e.stopPropagation();
        e.preventDefault();
        //var formDatas = $(this).serialize();
        var formDatas = new FormData($(this)[0]);
        var alertType = ["danger", "success", "danger", "error"];
        $.ajax({
            url: $(this).attr("action"),
            type: 'POST',
            data: formDatas,
            cache: false,
            contentType: false,
            async: false,
            success : function(data, status) {
                if(data.status != null && data.status !=1) { 
                    $("#messageBox, .messageBox").html('<div class="alert alert-'+alertType[data.status]+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+' </div>');
                }
                else if(data.status != null && data.status == 1) { 
                    $("#messageBox, .messageBox").html('<div class="alert alert-'+alertType[data.status]+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'  <img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Re-loading...</div>'); setInterval(function(){ window.location = "";}, 2000);
                }
                else $("#messageBox, .messageBox").html('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data+'</div>');
                 
            },
            processData: false
        });
        return false;
    });
    
    loadAllQuotes();
    function loadAllQuotes(){
        var dataTable = $('#quotelist').DataTable( {
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "ajax":{
                url :"../REST/manage-quotes.php", //employee-grid-data.php",// json datasource
                type: "post",  // method  , by default get
                data: {fetchQuotes:'true'},
                error: function(){  // error handling
                        $("#quotelist-error").html("");
                        $("#quotelist").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#quotelist_processing").css("display","none");

                }
            }
        } );
    }
    
    $(document).on('click', '.delete-quote', function() {
        if(confirm("Are you sure you want to delete this quote? Quote: '"+$(this).find('span').html()+"'")) deleteQuote($(this).attr('data-id'),$(this).attr('data-image'));
    });
    $(document).on('click', '.edit-quote', function() {
        if(confirm("Are you sure you want to edit this quote? Quote: '"+$(this).find('span').html()+"'")) editQuote($(this).attr('data-id'), $(this).find('span').html(), $(this).attr('data-author'), $(this).attr('data-image'));
    });
    
    function deleteQuote(id,image){
        $.ajax({
            url: "../REST/manage-quotes.php",
            type: 'POST',
            data: {deleteThisQuote: 'true', id:id, image:image},
            cache: false,
            success : function(data, status) {
                if(data.status === 1){
                    $("#messageBox, .messageBox").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+' <img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Re-loading...</div>');
                    setInterval(function(){ window.location = "";}, 2000);
                }
                else {
                    $("#messageBox, .messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>');
                }
            }
        });
    }
    
    function editQuote(id, content, author, image){//,
        $('form #addNewQuote').val('editQuote');
        $('form #multi-action-catAddEdit').text('Update Quote');
        var formVar = {id:id, content:content, author:author, image:image};
        $.each(formVar, function(key, value) { 
            if(key == 'image') { $('form #oldFile').val(value); $('form #oldFileComment').html('<img src="../media/quote/'+value+'" style="width:50px;height:50px; margin:5px">');} 
            $('form #'+key).val(value); 
        });
        
        
        $("form#CreateQuote").submit(function(e){ 
            e.stopPropagation(); 
            e.preventDefault();
            var formDatas = $(this).serialize();
            var alertType = ["danger", "success", "danger", "error"];
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                data: formDatas,
                cache: false,
                success : function(data, status) {
                    if(data.status != null && data.status !=1) { $("#messageBox, .messageBox").html('<div class="alert alert-'+alertType[data.status]+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+' </div>'); }
                    else if(data.status != null && data.status == 1) { $("#messageBox, .messageBox").html('<div class="alert alert-'+alertType[data.status]+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'  <img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Re-loading...</div>'); setInterval(function(){ window.location = "";}, 2000);}
                    else $("#messageBox, .messageBox").html('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data+' </div>');
                },
                error : function(xhr, status) {
                    erroMsg = '';
                    if(xhr.status===0){ erroMsg = 'There is a problem connecting to internet. Please review your internet connection.'; }
                    else if(xhr.status===404){ erroMsg = 'Requested page not found.'; }
                    else if(xhr.status===500){ erroMsg = 'Internal Server Error.';}
                    else if(status==='parsererror'){ erroMsg = 'Error. Parsing JSON Request failed.'; }
                    else if(status==='timeout'){  erroMsg = 'Request Time out.';}
                    else { erroMsg = 'Unknow Error.\n'+xhr.responseText;}          
                    $("#messageBox, .messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Admin details update failed. '+erroMsg+'</div>');
                }
            });
            return false;
        });
    }
});