$(document).ready(function () {
       $('#to_date').change( function(){
           var from_date = $("#from_date").val();
           var to_date = $("#to_date").val();
           if(from_date > to_date){
              $("#to_date").val("");
              warningAlert("Please Select Valid Date.<br/>To-Date Must Be Greater Than From-Date.");   
           }
       });
       $('#from_date').change( function(){
           var from_date = $("#from_date").val();
           var to_date = $("#to_date").val();
           if(to_date != "" && from_date > to_date){
              $("#from_date").val("");
              warningAlert("Please Select Valid Date.<br/>To-Date Must Be Greater Than From-Date.");   
           }
       });
});
$(document).ready(function(){
   setInterval('updateClock()', 1000);
});
var TIMER = "2000";
var POSITION = "toast-top-right";
var ENTER_VALID_DETAILS = "Please Enter Valid Details.";
var dropdown_id = "";
/* Common Ajax Call Function */
function commonAjaxCall(postUrl,postData,callbackLoginCheck,redirectURL = "",close = "No"){
     $(".loader").css("display","block");
     var request = $.ajax({
        url: postUrl,
        type: "POST",
        data: postData,
        enctype: 'multipart/form-data',
        //dataType: "html"
      });
      request.done(function(returnData) {
        console.log(returnData);
        callbackLoginCheck(returnData,redirectURL,close);
        $(".loader").css("display","none");
      });
      request.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus );
      });
}
/* Common Ajax Call Function */

function commonCallback(returnData,redirectURL = "",close = "No"){
      console.log(returnData);
      var status = returnData.status;
      var msg = returnData.msg;
      var data = "";
      if(status == "true"){
        if(dropdown_id != ""){
            data = returnData.data;
            $("#"+dropdown_id).html(data);
            dropdown_id = "";
            return false;
        }else{
            successAlert(msg);
            if(close === "Yes"){
                setTimeout(function(){ 
                   closeWin();
                }, TIMER);
            }
            if(close === "Yes-Reload"){
                setTimeout(function(){ 
                   closeWinWithOpenerReload();
                }, TIMER);
            }
            if(redirectURL == ""){
                setTimeout(function(){ 
                   location.reload(true); 
                }, TIMER);
            }else if(redirectURL == "login"){
                var user_id = returnData.user_id;
                var user_name = returnData.user_name;
                var user_type = returnData.user_type;
                redirect("session_write.php?user_id="+user_id+"&user_name="+user_name+"&user_type="+user_type);
            }else{
                redirect(redirectURL);
            }
        //$('#popUpModal').modal('hide');
        }
      }else{
        failAlert(msg);
      }
    }

function successAlert(msg){
  toastr.success(msg, "Success", {
      timeOut: TIMER,
      positionClass: POSITION,
      containerId: POSITION,
      progressBar: !0,
      closeButton: !0
  });
}

function failAlert(msg){
  toastr.error(msg, "Fail", {
      timeOut: TIMER,
      positionClass: POSITION,
      containerId: POSITION,
      progressBar: !0,
      closeButton: !0
  });
}

function infoAlert(msg){
  toastr.info(msg, "Info", {
      timeOut: TIMER,
      positionClass: POSITION,
      containerId: POSITION,
      progressBar: !0,
      closeButton: !0
  });
}

function warningAlert(msg){
  toastr.warning(msg, "Warning", {
      timeOut: TIMER,
      positionClass: POSITION,
      containerId: POSITION,
      progressBar: !0,
      closeButton: !0
  });
}

async function redirect(URL,delay = TIMER){
    //await wait(300);
    //window.location = URL;
    setTimeout(function(){ window.location = URL; }, delay);
}

// wait ms milliseconds
function wait(ms) {
    return new Promise(r => setTimeout(r, ms));
}

File.prototype.convertToBase64 = function(callback){
    var reader = new FileReader();
    reader.onloadend = function (e) {
        callback(e.target.result, e.target.error);
    };   
    reader.readAsDataURL(this);
};

//header clock
$(document).ready(function() {
    clockUpdate();
    setInterval(clockUpdate, 1000);
  })
  
  function clockUpdate() {
    var date = new Date();
    $('.digitalClock').css({'color': '#fff', 'text-shadow': '0 0 6px #ff0'});
    function addZero(x) {
      if (x < 10) {
        return x = '0' + x;
      } else {
        return x;
      }
    }
  
    function twelveHour(x) {
      if (x > 12) {
        return x = x - 12;
      } else if (x == 0) {
        return x = 12;
      } else {
        return x;
      }
    }
  
    var h = addZero(twelveHour(date.getHours()));
    var m = addZero(date.getMinutes());
    var s = addZero(date.getSeconds());
  
    $('.digitalClock').text(h + ':' + m + ':' + s);
  }
  
  function isNumeric(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$('.number').keypress(function(event) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$('.specialCharRemove').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9- .]/g, function(str) { 
        //alert('You typed " ' + str + ' ".\n\nPlease use only letters and numbers.');
        return ''; 
    } ) );
});

$(document).on('keypress keyup blur',".allowalphabet", function (event) {
                    var key = event.keyCode;
                    if (key >= 48 && key <= 57) {
                        event.preventDefault();
                    }
                });

function closeWinWithOpenerReload() { 
    opener.location.reload();
    window.top.close();
}
function closeWin() { 
    window.top.close();
}
function liveClock(){
setInterval(function() {
    var date = new Date();
    $('#clock').html(
        date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
        );
}, 500);
}

function updateClock (){
 	var currentTime = new Date ( );
  	var currentHours = currentTime.getHours ( );
  	var currentMinutes = currentTime.getMinutes ( );
  	var currentSeconds = currentTime.getSeconds ( );

  	// Pad the minutes and seconds with leading zeros, if required
  	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  	currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  	// Choose either "AM" or "PM" as appropriate
  	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  	// Convert the hours component to 12-hour format if needed
  	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  	// Convert an hours component of "0" to "12"
  	currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  	// Compose the string for display
  	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
  	//var currentTimeString = '<i class="mbri-clock" style="padding-top: 20px !important;"></i> '+currentHours + ':' + currentMinutes + ':' + currentSeconds + ' '+ timeOfDay;
  	
   	$("#clock").html(currentTimeString);	  	
 }
 function removeDataByFunction(element){
        var delete_text = $(element).attr("delete_text");
        if(delete_text == "" || delete_text === undefined){
           delete_text = "Are You Sure To Delete This Record.?";
        }
        var key = $(element).attr("key");
        var val = $(element).attr("val");
        var function_name = $(element).attr("function_name");
        var in_id_tmp = $(element).attr("in_id_tmp");
        var out_id_tmp = $(element).attr("out_id_tmp");
        if(key == ""){
            failAlert(ENTER_VALID_DETAILS);
            return false;
        }
        if(val == ""){
            failAlert(ENTER_VALID_DETAILS);
            return false;
        }
        if(function_name == ""){
            failAlert(ENTER_VALID_DETAILS);
            return false;
        }
        //var valTxt = key +':'+ val;
        var formData = {};
        formData["case"] = function_name;
        formData[key] = val;
        if(in_id_tmp != undefined){
           formData['in_id_tmp'] = in_id_tmp;
        }
        if(out_id_tmp != undefined){
           formData['out_id_tmp'] = out_id_tmp;
        }
        deletePopUp(delete_text,formData,commonCallback);
    }
    function getPopup(element){
        var key = $(element).attr("key");
        var val = $(element).attr("val");
        var function_name = $(element).attr("function_name");
        if(key == ""){
            failAlert(ENTER_VALID_DETAILS);
            return false;
        }
        if(val == ""){
            failAlert(ENTER_VALID_DETAILS);
            return false;
        }
        if(function_name == ""){
            failAlert(ENTER_VALID_DETAILS);
            return false;
        }
        var formData = {};
        formData["case"] = function_name;
        formData[key] = val;
        getPopUp(formData);
    }
    function back(){
        window.history.back()
    }
function blankCallback(){
    
}
$(document).ready(function(){
$("#file").on('change',function(){
   var selectedFile = this.files[0];
   selectedFile.convertToBase64(function(base64){
      $('#image').val(base64);
      $('#imageUrl').show();
      $('#imageUrl').attr("src",base64);
   }) 
});
});

$(document).ready(function() {
    $('#exportDataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            //'copy', 'csv', 'excel', 'pdf'
            'csv', 'excel'
        ]
    } );
} );