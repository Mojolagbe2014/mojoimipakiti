$(document).ready(function(){
    $( "#startDate" ).datepicker({ 
        dateFormat: "yy-mm-dd",appendText: "(yyyy-mm-dd)", changeMonth: true, changeYear: true,
        onClose: function(){ $('#endDate').datepicker( "option", "minDate", new Date($(this).datepicker( "getDate" )) ); }
    });
    $( "#endDate" ).datepicker({ 
        dateFormat: "yy-mm-dd",appendText: "(yyyy-mm-dd)", changeMonth: true, minDate:new Date($('#startDate').val()), changeYear: true
    });
    
    $.ajax({
        url: "../REST/fetch-categories.php",
        type: 'POST',
        cache: false,
        success : function(data, status) {
            $('#category').empty();
            if(data.status === 0 ){ 
                $("#messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Category loading error. '+data.msg+'</div>');
            }
            if(data.status === 2 ){ 
                $("#messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>No category available</div>');
                 $('#category').append('<option value="">-- No category available --</option>');
            }
            else if(data.status ===1 && data.info.length > 0){
                $('#category').append('<option value="">-- Select a category.. --</option>');
                $.each(data.info, function(i, item) {
                    $('#category').append('<option value="'+item.id+'">'+item.name+'</option>');
                });
            } 

        }
    });
    loadAllRegisteredCourses();
    function loadAllRegisteredCourses(){
        var dataTable = $('#courseslist').DataTable( {
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "ajax":{
                url :"../REST/manage-courses.php", //employee-grid-data.php",// json datasource
                type: "post",  // method  , by default get
                data: {fetchCourses:'true'},
                error: function(){  // error handling
                        $("#courseslist-error").html("");
                        $("#courseslist").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#courseslist_processing").css("display","none");

                }
            }
        } );
        
    }
    var currentStatus, featuredStatus;
    
    $(document).on('click', '.activate-course', function() {
        currentStatus = 'Activate'; if(parseInt($(this).attr('data-status')) == 1) currentStatus = "De-activate";
        if(confirm("Are you sure you want to "+currentStatus+" this course? Course Name: '"+$(this).attr('data-name')+"'")) activeCourse($(this).attr('data-id'),$(this).attr('data-status'));
    });
    $(document).on('click', '.delete-course', function() {
        if(confirm("Are you sure you want to delete this course ["+$(this).attr('data-name')+"]? Course media ['"+$(this).attr('data-media')+"'] will be deleted too.")) deleteCourse($(this).attr('data-id'),$(this).attr('data-media'),$(this).attr('data-image'));
    });
    $(document).on('click', '.edit-course', function() {
        if(confirm("Are you sure you want to edit this course ["+$(this).attr('data-name')+"] details?")) editCourse($(this).attr('data-id'), $(this).attr('data-name'), $(this).attr('data-short-name'), $(this).attr('data-category'), $(this).attr('data-start-date'), $(this).attr('data-end-date'), $(this).attr('data-code'), $(this).find('span#JQDTdescriptionholder').html(), $(this).attr('data-media'), $(this).attr('data-amount'), $(this).attr('data-image'));
    });
    $(document).on('click', '.make-featured-course', function() {
        featuredStatus = 'Made Featured'; if(parseInt($(this).attr('data-featured')) == 1) featuredStatus = "Removed as featured";
        if(confirm("Are you sure you want to make this course ["+$(this).attr('data-name')+"] featured course on home page?")) makeFeaturedCourse($(this).attr('data-id'), $(this).attr('data-featured'));
    });
    
    function deleteCourse(id, media, image){
        $.ajax({
            url: "../REST/manage-courses.php",
            type: 'POST',
            data: {deleteThisCourse: 'true', id:id, media: media, image:image},
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
    
    function activeCourse(id, status){
        $.ajax({
            url: "../REST/manage-courses.php",
            type: 'GET',
            data: {activeCourse: 'true', id:id, status:status},
            cache: false,
            success : function(data, status) {
                if(data.status === 1){
                    $("#messageBox, .messageBox").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Course Successfully '+currentStatus+'d! <img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Reloading ...</div>');
                    setInterval(function(){ window.location = "";}, 2000);
                }
                else {
                    $("#messageBox, .messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Course Activation Failed. '+data.msg+'</div>');
                }
            }
        });
    }
    
    function makeFeaturedCourse(id, featured){
        $.ajax({
            url: "../REST/manage-courses.php",
            type: 'GET',
            data: {makeFeaturedCourse: 'true', id:id, featured:featured},
            cache: false,
            success : function(data, status) {
                if(data.status === 1){
                    $("#messageBox, .messageBox").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Course Successfully '+featuredStatus+' Course! <img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Reloading ...</div>');
                    setInterval(function(){ window.location = "";}, 2000);
                }
                else {
                    $("#messageBox, .messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Course Featuring Failed. '+data.msg+'</div>');
                }
            }
        });
    }
    
    function editCourse(id, name, shortName, category, startDate, endDate, code, description, media, amount, image){//,
        var formVar = {id:id, name:name, shortName:shortName, category:category, startDate:startDate, endDate:endDate, code:code, description:description, media:media, amount:amount, image:image };
        $.each(formVar, function(key, value) { 
            if(key == 'media') { $('form #oldFile').val(value); $('form #oldFileComment').text(value).css('color','red');} 
            else if(key == 'image') { $('form #oldImage').val(value); $('form #oldImageComment').html('<img src="../media/course-image/'+value+'" style="width:50px;height:50px; margin:5px">');}
            else $('form #'+key).val(value);  
        });
        $('#hiddenUpdateForm').removeClass('hidden');
        CKEDITOR.instances['description'].setData(description);
        $("form#UpdateCourse").submit(function(e){ 
            e.stopPropagation(); 
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            var alertType = ["danger", "success", "danger", "error"];
            $.ajax({
            url: $(this).attr("action"),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            async: false,
            success : function(data, status) {
                $("#hiddenUpdateForm").addClass('hidden');
                if(data.status === 1) {
                    $("#messageBox, .messageBox").html('<div class="alert alert-'+alertType[data.status]+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+' <img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Reloading ...</div>');
                    setInterval(function(){ window.location = "";}, 2000);
                }
                else if(data.status === 2 || data.status === 3 || data.status ===0 ) $("#messageBox").html('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>');
                else $("#messageBox, .messageBox").html('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>');
            },
            error : function(xhr, status) {
                erroMsg = '';
                if(xhr.status===0){ erroMsg = 'There is a problem connecting to internet. Please review your internet connection.'; }
                else if(xhr.status===404){ erroMsg = 'Requested page not found.'; }
                else if(xhr.status===500){ erroMsg = 'Internal Server Error.';}
                else if(status==='parsererror'){ erroMsg = 'Error. Parsing JSON Request failed.'; }
                else if(status==='timeout'){  erroMsg = 'Request Time out.';}
                else { erroMsg = 'Unknow Error.\n'+xhr.responseText;}          
                $("#messageBox, .messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Failed. '+erroMsg+'</div>');
            },
            processData: false
        });
            return false;
        });
        $('#cancelEdit').click(function(){ $("#hiddenUpdateForm").addClass('hidden'); });
    }
});