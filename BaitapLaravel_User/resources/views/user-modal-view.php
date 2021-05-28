<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <input type="hidden" id="user_id">
            <h4 class="modal-title">Insert/Update User</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <!-- <label for="User" class="col-form-label">User:<span class="error ">(必須)</span></label>
                    <input type="text" class="form-control" name="user" id="user" onfocus="clearError(this)"> -->
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                                User  <span class="error ">(必須)</span>
                        </div>
                        </div>
                        <div class="c-section-box__body">
                            <input type="text" class="form-control" name="user" value="" onfocus="clearError(this)">
                        </div>
                </div>
                <p class="error" style="display:none" id="error_user"> </p>
                <div class="form-group">
                     <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            UserName  <span class="error">(必須)</span>
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control" name="username" value="" onfocus="clearError(this)">
                    </div>
                </div>
                <p class="error" style="display:none" id="error_username"> </p>
                <div class="form-group">
                     <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            Email  <span class="error">(必須)</span>
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control" placeholder="@Email.com" name="email" value="" onfocus="clearError(this)">
                    </div>
                </div>
                <p class="error" style="display:none" id="error_email"> </p>
                <div class="form-group">
                     <div class="c-section-box__head">
                        <div class="c-section-box__title">
                             Address
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text"  class="form-control" name="address" value="" onfocus="clearError(this)">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="insert_update_User()">Save changes</button>
        </div>
    </div>