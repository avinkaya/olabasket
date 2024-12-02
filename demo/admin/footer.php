<div class="app-footer">
                <div class="footer-bottom pt-3 d-flex flex-column flex-sm-row align-items-center">
<!--                    <a class="btn btn-primary text-white btn-rounded" href="<?= ROOT; ?>" target="_blank">Go To Website</a>-->
                    <img class="logo" src="./upload/logo.png" alt="" style="width: 100px;">
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="m-0">&copy; <?= date('Y'); ?> <?= PROJECT_NAME; ?> SOFTWARE</p>
                            <p class="m-0 text-center">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
    <script>
function deletePopUp(msg,formData,callback){
    if(confirm(msg)){
      commonAjaxCall('<?= API_URL; ?>',formData,callback);
    }     
}
function getPopUp(formData){
    commonAjaxCall('<?= API_URL; ?>',formData,callbackPopUp);
}
function callbackPopUp(returnData){
    $("#popUpHtmlCommon").html(returnData.data);
    var status = returnData.status;
    var msg = returnData.msg;
    if(status == "true"){
        $("#popUpHtmlCommon").html(returnData.data);
        $("#popUpTitleCommon").html(returnData.title);
        $("#popUpModalCommon").modal("show");
        $('#popUpTable').DataTable({
		
	});
    }else{
        failAlert(msg);
    }
}
</script>
<!-- #START# Modal Vertically Centered -->
                                    <div class="modal fade" id="popUpModalCommon" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="popUpTitleCommon"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="popUpHtmlCommon">
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- #END# Modal Vertically Centered -->
                                <?php
                                ob_end_flush();
                                ?>