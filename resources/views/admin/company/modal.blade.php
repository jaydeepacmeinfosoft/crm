<div class="modal fade" id="company_model" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="mb-4">
                    <h5 class="mb-2" id="modal_title">Add Company</h5>
                    <hr>
                </div>
                <div class="row g-3" id="companyData">
                    @include("admin.company._form")
                </div>
            </div>
        </div>
    </div>
