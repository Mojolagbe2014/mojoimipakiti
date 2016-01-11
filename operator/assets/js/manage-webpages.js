$(document).ready(function(){
    $("form#CreateWebPage").submit(function(e){ 
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
    
    loadAllsWebpages();
    function loadAllsWebpages(){
        var dataTable = $('#webpagelist').DataTable( {
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "ajax":{
                url :"../REST/manage-webpages.php", //employee-grid-data.php",// json datasource
                type: "post",  // method  , by default get
                data: {fetchWebpages:'true'},
                error: function(){  // error handling
                        $("#webpagelist-error").html("");
                        $("#webpagelist").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#webpagelist_processing").css("display","none");

                }
            }
        } );
    }
    
    $(document).on('click', '.delete-webpage', function() {
        if(confirm("Are you sure you want to delete this webpage? WebPage Name: '"+$(this).attr('data-name')+"'")) deleteWebPage($(this).attr('data-id'));
    });
    $(document).on('click', '.edit-webpage', function() {
        if(confirm("Are you sure you want to edit this webpage? WebPage Name: '"+$(this).attr('data-name')+"'")) editWebPage($(this).attr('data-id'), $(this).attr('data-name'), $(this).attr('data-title'), $(this).attr('data-description'), $(this).attr('data-keywords'));
    });
    
    function deleteWebPage(id){
        $.ajax({
            url: "../REST/manage-webpages.php",
            type: 'POST',
            data: {deleteThisWebPage: 'true', id:id},
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
    
    function editWebPage(id, name, title, description, keywords){//,
        $('form #addNewWebPage').val('editWebPage');
        $('form #multi-action-catAddEdit').text('Update WebPage');
        var formVar = {id:id, name:name, title:title, description:description, keywords:keywords};
        $.each(formVar, function(key, value) {  $('form #'+key).val(value);  });
    }
});