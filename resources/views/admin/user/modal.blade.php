<div class="modal fade" id="userManageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="mb-4">
                    <h5 class="mb-2" id="user_modal_title">Edit User</h5>
                    <hr>
                </div>
                <div class="row g-3" id="userData">
                    @include("admin.user._form")
                </div>
            </div>
        </div>
    </div>
