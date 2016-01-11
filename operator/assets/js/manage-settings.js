$(document).ready(function(){
    $("form#CreateSetting").submit(function(e){ 
        e.stopPropagation();
        e.preventDefault();
        //var formDatas = $(this).serialize();
        var formDatas = new FormData($(this)[0]);
        formDatas.append('value', CKEDITOR.instances['value'].getData());
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
    
    loadAllsSettings();
    function loadAllsSettings(){
        var dataTable = $('#settinglist').DataTable( {
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "ajax":{
                url :"../REST/manage-settings.php", //employee-grid-data.php",// json datasource
                type: "post",  // method  , by default get
                data: {fetchSettings:'true'},
                error: function(){  // error handling
                        $("#settinglist-error").html("");
                        $("#settinglist").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#settinglist_processing").css("display","none");

                }
            }
        } );
    }
    
    $(document).on('click', '.delete-setting', function() {
        if(confirm("Are you sure you want to delete this setting? Setting Name: '"+$(this).attr('data-name')+"'")) deleteSetting($(this).attr('data-name'));
    });
    $(document).on('click', '.edit-setting', function() {
        if(confirm("Are you sure you want to edit this setting? Setting Name: '"+$(this).attr('data-name')+"'")) editSetting($(this).attr('data-name'), $(this).find('span#JQDTvalueholder').html());
    });
    
    function deleteSetting(name){
        $.ajax({
            url: "../REST/manage-settings.php",
            type: 'POST',
            data: {deleteThisSetting: 'true', name:name},
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
    
    function editSetting(name, value){//,
        $('form #addNewSetting').val('editSetting');
        $('form #multi-action-catAddEdit').text('Update Setting');
        var formVar = {name:name, value:value, name2:name};
        $.each(formVar, function(key, value) {  $('form #'+key).val(value);  });
        CKEDITOR.instances['value'].setData(value);
    }
});