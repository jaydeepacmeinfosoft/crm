<script>
$("#contactLeadModalBtn").on("click",function(){
    $("#vleadType").val("contact");
    $("#ManageLead").modal("show");
});
$("#demoLeadModalBtn").on("click",function(){
    $("#vleadType").val("demo");
    $("#ManageLead").modal("show");
});
$("#quotationModalBtn").on("click",function(){
    $("#vleadType").val("quotation");
    $("#ManageLead").modal("show");
});
$("#inquiryModalBtn").on("click",function(){
    $("#vleadType").val("inquiry");
    $("#ManageLead").modal("show");
});

var leadTypeArr = "{{ json_encode($typeIds) }}";
var leadTT = JSON.parse(leadTypeArr)
console.log(leadTypeArr);
$(function() {
      $.each(leadTT, function(key, value) {
            var element = document.getElementById(value+'_lead')
            if(element){
                Sortable.create(element, {
                    animation: 150,
                    group: 'taskList',
                    onAdd: function (evt) {
                        var id = evt.item.dataset.id??"";
                        var typeId = evt.target.dataset.type??"";
                        updateLeadType(id,typeId);
                    },
                });
            }
        });
    const qualifiedLead = document.getElementById('qualified_lead'),
    demoLead = document.getElementById('demo_lead'),
    quotationLead = document.getElementById('quotation_lead'),
    inquiryLead = document.getElementById('inquiry_lead'),
    generalLead = document.getElementById('general_lead'),
    lostLead = document.getElementById('lost_lead'),
    winLead = document.getElementById('win_lead'),
    contactLead = document.getElementById('contact_lead');

    // Multiple
// --------------------------------------------------------------------
if (generalLead) {
  Sortable.create(generalLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (lostLead) {
  Sortable.create(lostLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (winLead) {
  Sortable.create(winLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (qualifiedLead) {
  Sortable.create(qualifiedLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (contactLead) {
  Sortable.create(contactLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (quotationLead) {
  Sortable.create(quotationLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (demoLead) {
  Sortable.create(demoLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}
if (inquiryLead) {
  Sortable.create(inquiryLead, {
      animation: 150,
      group: 'taskList',
      onAdd: function (/**Event*/evt) {
          var id = evt.item.dataset.id??"";
          var type = evt.target.dataset.type??"";
          updateLeadType(id,type);
      },
  });
}

});

function updateLeadType(id,typeId){
    $.ajax({
	      url:"{{ route('lead.change-lead-type')}}",
	      method:"POST",
	      data:{id:id, typeId:typeId},
          headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
	      success:function(data)
	      {
                window.location.reload();
	      }
	   });

}

</script>
