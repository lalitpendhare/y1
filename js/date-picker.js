// set end date from start date

  //var start_date_key = 'start_date'; // the field key of the start date
  //var end_date_key = 'end_date'; // the field key of the end date
//
  //if (typeof(acf) != 'undefined') {
    // add an action for all datepicker fields
   // acf.add_action('date_picker_init', function($input, args, $field) {
      // get the field key for this field
      /*var key = $input.closest('.acf-field').data('key');
      // see if it's the start date field
      if (key == start_date_key) {
        // add action to start date field datepicker
        $input.datepicker().on('input change select', function(e) {
          // get the selected date
          var date = jQuery(this).datepicker('getDate');
          // add 5 days to date
          date.setDate(date.getDate()+5);
          // set end date
          jQuery('[data-key="'+end_date_key+'"] input.hasDatepicker').datepicker('setDate', date);
        });
      }*/

     /* var start_date = jQuery('.acf-field-5a212abaf776c input#acf-field_5a212abaf776c').val();
      alert(start_date);
          jQuery( '.acf-field-5a212aecf776d input.input' ).datepicker({
            minDate: start_date,
          });
    });*/
  //}


  //This is an example field key. You need to use your own

//jQuery( '.acf-field-5a212aecf776d .acf-date_picker input.input' ).datepicker( 'option', 'minDate', date.format() );


$(".start_date .acf-date-picker input.input").datepicker({
    numberOfMonths: 1,
    onSelect: function(selected) {
      $(".end_date .acf-date-picker input.input").datepicker("option","minDate", selected);
    }
});
$(".end_date .acf-date-picker input.input").datepicker({ 
    numberOfMonths: 1,
    onSelect: function(selected) {
        $(".start_date .acf-date-picker input.input").datepicker("option","maxDate", selected);
    }
});