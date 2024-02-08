<form method="post" id="activityForm">
                        @csrf
        <input type="hidden" id="id" name="id" value="{{ $activity->id ?? '' }}">
        <input type="hidden" id="lead_id" name="lead_id" value="{{ $activity->lead_id ?? '' }}">
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameSmall" class="form-label">Location </label>
              <input type="text" id="location" name="location" value="{{ $activity->location ?? old('location') }}" class="form-control" placeholder="Share a map or directions link" />
              <span class="text-danger errMsg" id="location_err"></span>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="dobSmall" class="form-label">Schedule</label>
              <input id="dobSmall" type="date" name="schedule" value="{{ $activity->schedule ?? old('schedule') }}"  class="form-control" />
              <span class="text-danger errMsg" id="schedule_err"></span>
            </div>
            <div class="col mb-3">
              <label for="flatpickr-time" class="form-label">Time</label>
              <input type="text" id="flatpickr-time" class="form-control flatpickr flatpickr-input" value="{{ $activity->time ?? old('time') }}"  placeholder="HH:MM:SS" name="time">
              <span class="text-danger errMsg" id="time_err"></span>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-3">
              <label for="dobSmall" class="form-label">Online Meeting</label>
              <select id="defaultSelect" name="metting" class="form-select">
                <option value="">Default select</option>
                @php $mettingArr = \App\Http\Helpers\CommonFunction::getMeetingType(); @endphp
                @foreach($mettingArr as $key => $meeting)
                <option @if(isset($activity) && $activity->metting == $key) {{"selected"}}@endif value="{{ $key }}">{{ $meeting }}</option>
               @endforeach
              </select>
              <span class="text-danger errMsg" id="metting_err"></span>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="dobSmall" class="form-label">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="2"></textarea>
              <span class="text-danger errMsg" id="description_err"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer mx-auto modal-footer-custom">
          <button type="submit" class="btn btn-primary"  id="savedata">Submit</button>
        </div>
</form>
@push('script')
<script>
    $(function() {
        const flatpickrTime = document.querySelector('#flatpickr-time');
        if (flatpickrTime) {
            console.log("Hello");
    flatpickrTime.flatpickr({
      enableTime: true,
      noCalendar: true
    });
  }
    });
    $(document).on('submit','#activityForm',function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var url = $(this).attr("action");
            $.ajax({
                url: "{{ route('activity.store') }}",
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(result) {
                    $(".errMsg").empty();
                    if (result.status) {
                        window.location.reload();
                    }
                },
                error: function(data) {
                    if (data.responseJSON) {
                        $(".errMsg").empty();
                        $("#errMessage").removeClass("d-none");
                        console.log("data.responseJSON.errorss: ",data.responseJSON.message);
                        $.each(data.responseJSON.message, function(key, value) {
                            var errMsg = "";
                            $.each(value, function(k, v) {
                                console.log(v);
                                errMsg += "<h6 class='text-danger'>" + v + "</h6>";
                            });
                            console.log("#" + key + "_err", " ",errMsg);
                            $("#" + key + "_err").html(errMsg);
                        });
                    }

                }
            });
        });
</script>
@endpush
