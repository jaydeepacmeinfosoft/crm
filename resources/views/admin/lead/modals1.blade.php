 <!-- Edit User Modal -->
 <div class="modal fade" id="ManageLead" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="mb-4">
                    <h5 class="mb-2" id="manageLeadTitle"> {{ isset($lead)?"Edit":"Add"}} Lead</h5>
                    <hr>
                </div>

                <div class="row g-3" id="formData">
                    @if(!isset($lead) && !isset($lead->iid))
                        @include("admin.lead._form")
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->

<div class="modal fade" id="ManageActivity" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Schedule An Activity</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div id="activityData">
          @include("admin.activity._form")
        </div>
      </div>
    </div>
  </div>
  <!-- Add New Credit Card Modal -->
  <div class="modal fade bottom modal-md" id="addNewCCModal" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              <div class="mb-4">
                  <h5 class="mb-2">Mark as lost</h5>
                  <div class="row card-body a47">
                      <span class="col-md-12 a44">Wipro Deal</span>
                      <span class="col-md-12 a44">wipro,ruhi patel Contact</span>
                      <span class="col-md-3 col-3 a44"><i
                              class="fa fa-phone text-light" aria-hidden="true"
                              title="Schedule an activity">
                          </i>
                      </span>
                  </div>
              </div>
              <form id="addNewCCForm" class="row g-3" onsubmit="return false">
                  <div class="col-12">
                      <label>Lost Reason
                      </label class="form-label" for="modalAddCardName">
                      <div class="input-group input-group-merge">
                          <input id="modalAddCard" name="modalAddCard"
                              class="form-control credit-card-mask" type="text"
                              aria-describedby="modalAddCard2" />
                              <span class="input-group-text cursor-pointer p-1"
                              id="modalAddCard2"><span class="card-type"></span></span>
                      </div>
                  </div>
                  <div class="col-12">
                      <label class="form-label"
                          for="modalAddCardName">Comments</label>
                      <input type="text" id="modalAddCardName"
                          class="form-control a48" />
                  </div>

                  <hr>
                  <div class="col-12">
                      <a href="everyone.html" type="submit"
                          class="btn btn-danger me-sm-3 me-1">Mark as lost</a>


                      <button class="btn btn-label-secondary btn-reset"
                          aria-label="Close">
                          <a href="everyone.html" class="text-muted">
                              Cancel
                          </a>
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!--/ Add New Credit Card Modal -->
