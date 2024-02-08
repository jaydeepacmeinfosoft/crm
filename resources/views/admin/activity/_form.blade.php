<form method="post" id="activityForm">
    @csrf
    <input type="hidden" id="id" name="id" value="{{ $activity->id ?? '' }}">
    <input type="hidden" id="lead_id" name="lead_id" value="{{ $activity->lead_id ?? '' }}">
    <div class="modal-body">
        <div class="row">
            <div class="col mb-3">
                <label class="form-label" for="basic-default-fullname"></label>
                <input type="text" id="activity_type" value="{{ $activity->activity_type ?? (old('activity_type')?? 'Call') }}"
                    name="activity_type" value="Call" class="form-control" placeholder="call" />
                <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-info activity_type_btn" id="Call"
                            data-icon="<i class='fa fa-phone'></i>" title="phone">
                            <i class="fa fa-phone"></i>
                        </button>
                        <button type="button" class="btn btn-outline-info activity_type_btn" id="Email"
                            data-icon="<i class='fa fa-envelope'></i>" title="email">
                            <i class="fa fa-envelope"></i>
                        </button>
                        <button type="button" class="btn btn-outline-info activity_type_btn" id="Whatsapp"
                            data-icon="<i class='fa fa-whastapp'></i>" title="whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button type="button" class="btn btn-outline-info activity_type_btn" id="Meeting"
                            data-icon="<i class='fa fa-video'></i>" title="meeting">
                            <i class="fas fa-video"></i>
                        </button>


                    </div>
                </div>
            </div>
        </div>

        <div class="row d-none">
            <div class="col mb-3">
                <label for="dobSmall" class="form-label">Online Meeting</label>
                <select id="defaultSelect" name="metting" class="form-select">
                    <option value="">Default select</option>
                    @php $mettingArr = \App\Http\Helpers\CommonFunction::getMeetingType(); @endphp
                    @foreach ($mettingArr as $key => $meeting)
                        <option @if (isset($activity) && $activity->metting == $key) {{ 'selected' }} @endif
                            value="{{ $key }}">{{ $meeting }}</option>
                    @endforeach
                </select>
                <span class="text-danger errMsg" id="metting_err"></span>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-12 mb-3">
                <label for="nameSmall" class="form-label url_label">Phone </label>
                <input type="text" id="location" name="location"
                    value="{{ $activity->location ?? old('location') }}" class="form-control"
                    placeholder="Share a map or directions link" />
                <span class="text-danger errMsg" id="location_err"></span>
            </div>
            {{-- <div class="col-md-6 mb-3">
                <label for="dobSmall" class="form-label">Schedule</label>
                <input id="schedule" type="date" name="schedule"
                    value="{{ $activity->schedule ?? old('schedule') }}" onChange="setTimeCalendar()" class="form-control" />
                <span class="text-danger errMsg" id="schedule_err"></span>
            </div> --}}
        </div>
        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label class="form-label" for="activityStartDate">Start Date</label>
                <input type="text" class="form-control" id="activityStartDate" name="activityStartDate"
                    placeholder="Start Date" value="{{ $activity->activityStartDate ?? (old('activityStartDate')??date("Y-m-d H:i")) }}" />
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" for="activityEndDate">End Date</label>
                <input type="text" class="form-control" id="activityEndDate" name="activityEndDate"
                    placeholder="End Date" value="{{ $activity->activityEndDate ?? (old('activityEndDate')??date("Y-m-d H:i")) }}" />
            </div>
        </div>
        <div class="row g-2 meetingDiv d-none">
            <div class="col mb-3 ">
                <label for="dobSmall" class="form-label">Online Meeting</label>
                <select id="metting" name="metting" class="form-select">
                    <option value="">Default select</option>
                    @php $mettingArr = \App\Http\Helpers\CommonFunction::getMeetingType(); @endphp
                    @foreach ($mettingArr as $key => $meeting)
                        <option @if (isset($activity) && $activity->metting == $key) {{ 'selected' }} @endif
                            value="{{ $key }}">{{ $meeting }}</option>
                    @endforeach
                </select>
                <span class="text-danger errMsg" id="metting_err"></span>
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
                <label for="dobSmall" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2">{{ $activity->description ?? old('description') }}</textarea>
                <span class="text-danger errMsg" id="description_err"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer mx-auto modal-footer-custom">
        <button type="submit" class="btn btn-primary" id="savedata">Submit</button>
    </div>
</form>
@push('script')
    <script>
        
        var start;
        var end;
        var calendar;
        var events = [];
        var activityType;
        $(function() {
            loadFlatPicker();
            loadCalendar();
            $(document).on('click', '.activity_type_btn', function() {
                $(".meetingDiv").addClass("d-none");
                $("#activity_type").val($(this).attr("id"));
                activityType = $(this).attr("id");
                $("#location").val("");
                if (activityType == "Call") {
                    $(".url_label").text("Phone");
                    $("#location").attr("Placeholder", "Enter Your Phone no");
                }
                if (activityType == "Whatsapp") {
                    $(".url_label").text("Email");
                    $("#location").attr("Placeholder", "Enter Your Whatsappv no");
                }
                if (activityType == "Email") {
                    $(".url_label").text("Email");
                    $("#location").attr("Placeholder", "Enter Your Email");
                }
                if (activityType == "Meeting") {
                    $(".url_label").text("Meeting Link");
                    $("#location").attr("Placeholder", "Enter Meeting Link");
                    $("#metting").val("");
                    $(".meetingDiv").removeClass("d-none");
                }
                loadCalendar();
            });
        });

        function loadCalendar() {
            var activityType = $('#activity_type').val();
            var icon;
            if (activityType == "Call") {
                icon = '<i class="fa fa-phone"></i>';
            }
            if (activityType == "Whatsapp") {
                icon = '<i class="fa fa-Whatsapp"></i>';
            }
            if (activityType == "Email") {
                icon = '<i class="fa fa-envelope"></i>';
            }
            if (activityType == "Meeting") {
                $(".meetingDiv").removeClass("d-none");
                icon = '<i class="fa fa-video"></i>';
            }

            const calendarEl = document.getElementById('activity_calendar');
            start = $("#activityStartDate").val();
            end = $("#activityEndDate").val();
            events = [{
                id: 1,
                url: '',
                title: activityType,
                start: start,
                end: end,
                allDay: false,
                textColor: "#fff",
            }, ];
            calendar = new Calendar(calendarEl, {
                // height: 500,
                events: events,
                headerToolbar: {
                    // center: 'title',
                    end: 'prev,next,nextYear'
                },
                plugins: [
                    dayGridPlugin,
                    timeGridPlugin,
                    interactionPlugin,
                ],
                initialView: 'timeGridDay',
                initialDate: start,
                selectable: true,
                eventDidMount: function(info) {
                    console.log(info.event);
                    var element = info.el;
                    console.log(element);
                    if (info.event.textColor) {
                        info.el.style.color = info.event.textColor;
                    }
                    if (info.event != '' && typeof info.event._def !== "undefined" && info.event._def.title) {
                        let icon = document.createElement("i");
                        if (activityType == "Call") {
                            //icon = '<i class="fa fa-phone"></i>';
                            icon.classList.add('fa', 'fa-phone', "me-1");
                        }
                        if (activityType == "Whatsapp") {
                            //icon = '<i class="fa fa-Whatsapp"></i>';
                            icon.classList.add('fab', 'fa-whatsapp', "me-1");
                        }
                        if (activityType == "Email") {
                            //icon = '<i class="fa fa-envelope"></i>';
                            icon.classList.add('fa', 'fa-envelope', "me-1");
                        }
                        if (activityType == "Meeting") {
                            $(".meetingDiv").removeClass("d-none");
                            //icon = '<i class="fa fa-video"></i>';
                            icon.classList.add('fa', 'fa-video', "me-1");
                        }


                        eTitle = info.event._def.title;
                        // info.event._def.title = icon+" "+eTitle;
                        console.log(eTitle, info.event._def.title);
                        $(element).closest(".fc-event").find(".fc-event-title").remove("i");
                        $(element).closest(".fc-event").find(".fc-event-title").prepend(icon)
                    }
                }
            })
            calendar.render()
        }

        function loadFlatPicker(start, end) {
            $("#activityStartDate").flatpickr({
                enableTime: true,
                altFormat: 'Y-m-dTH:i:S',
                defaultDate: start ?? new Date(),
                onReady: function(selectedDates, dateStr, instance) {
                    if (instance.isMobile) {
                        instance.mobileInput.setAttribute('step', null);
                    }
                },
                onClose: function(seldates, datestr) {
                    // self.flat = self.flatpickrInit();
                    loadCalendar()
                }
            });
            $("#activityEndDate").flatpickr({
                enableTime: true,
                altFormat: 'Y-m-dTH:i:S',
                defaultDate: end ?? new Date(),
                onReady: function(selectedDates, dateStr, instance) {
                    if (instance.isMobile) {
                        instance.mobileInput.setAttribute('step', null);
                    }
                },
                onClose: function(seldates, datestr) {
                    // self.flat = self.flatpickrInit();
                    loadCalendar()
                }
            });
        }

        function setTimeCalendarRender() {
            calendar.render()
        }

        $(document).on('submit', '#activityForm', function(event) {
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
                        console.log("data.responseJSON.errorss: ", data.responseJSON.message);
                        $.each(data.responseJSON.message, function(key, value) {
                            var errMsg = "";
                            $.each(value, function(k, v) {
                                console.log(v);
                                errMsg += "<h6 class='text-danger'>" + v + "</h6>";
                            });
                            console.log("#" + key + "_err", " ", errMsg);
                            $("#" + key + "_err").html(errMsg);
                        });
                    }

                }
            });
        });
    </script>
@endpush
