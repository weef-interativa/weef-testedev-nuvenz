(function ($) {

  $(document).ready(function () {

    $("#searchsubmit").click(function (e) {

        e.preventDefault();

        handle_blog_filter();
    
    });

    $("#load_more_button").click(function (e) {

        e.preventDefault();

        const old_value = jQuery("#pagination_counter").val();

        jQuery("#pagination_counter").val((3 + parseInt(old_value)) + "");

        handle_blog_filter();
    
    });

  });

})(jQuery);

function handle_blog_filter() {
  
    var data = {
      action: "blog_filter",
      s: jQuery("#txt_search_name").val(),
      category: jQuery("#dd_search_category").val(),
      pagination_counter: jQuery("#pagination_counter").val(),
    };

    jQuery.ajax({
      url: custom_script_object.ajax_url,
      type: "get",
      data: data,
      success: function (response) {
        if (response.success) {

          jQuery("#data_json_blogs").html(response.data.html);


        } else {

          console.error(response);

        }
      }, // end success;
      error: function (error) {

        console.error(error);

      }, // end error;

    }); // end ajax;

}
