$(function() {
    $( "#datas" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      dateFormat: "dd.mm.yy",
      buttonImageOnly: true,
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1
    });
    $( "#datap" ).datepicker({
              showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      dateFormat: "dd.mm.yy",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1
    });
  });