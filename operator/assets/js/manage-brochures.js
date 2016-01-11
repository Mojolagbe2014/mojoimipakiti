$(document).ready(function(){
    $("form#CreateBrochure").submit(function(e){ 
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
    
    loadAllCoursesBrochures();
    function loadAllCoursesBrochures(){
        var dataTable = $('#coursebrochurelist').DataTable( {
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "ajax":{
                url :"../REST/manage-brochures.php", //employee-grid-data.php",// json datasource
                type: "post",  // method  , by default get
                data: {fetchBrochures:'true'},
                error: function(){  // error handling
                        $("#coursebrochurelist-error").html("");
                        $("#coursebrochurelist").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#coursebrochurelist_processing").css("display","none");

                }
            }
        } );
    }
    
    $(document).on('click', '.delete-brochure', function() {
        if(confirm("Are you sure you want to delete this brochure? Brochure Name: '"+$(this).attr('data-name')+"'")) deleteCourseBrochure($(this).attr('data-id'),$(this).attr('data-document'));
    });
    $(document).on('click', '.edit-brochure', function() {
        if(confirm("Are you sure you want to edit this brochure? Brochure Name: '"+$(this).attr('data-name')+"'")) editCourseBrochure($(this).attr('data-id'), $(this).attr('data-name'), $(this).attr('data-document'));
    });
    
    function deleteCourseBrochure(id,document){
        $.ajax({
            url: "../REST/manage-brochures.php",
            type: 'POST',
            data: {deleteThisBrochure: 'true', id:id, document:document},
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
    
    function editCourseBrochure(id, name, document){//,
        $('form #addNewBrochure').val('editCourseBrochure');
        $('form #multi-action-catAddEdit').text('Update Brochure');
        var formVar = {id:id, name:name, document:document};
        $.each(formVar, function(key, value) { 
            if(key == 'document') { $('form #oldFile').val(value); $('form #oldFileComment').html('<a href="../media/brochure/'+value+'">Download Current Brochure</a>');} 
            $('form #'+key).val(value); 
        });
    }
});