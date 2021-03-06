$("document").ready(function () {

  // country name show input box 
  $("body").on("click", ".list-group-item", function () {    
    $('#save').show();
    var cName = $(this).attr("data-id");
    $("input[name=countryName]").val(cName);
  });
  // Model hide  
  $("body").on("click", ".ar-close", function () {    
    $('#ar-model').hide();
  });

  // table data show input box 
  $("body").on("dblclick", ".trData", function () {
    $('#ar-model').show();
    var countryName = $(this).attr("countryName");
    var shortName = $(this).attr("shortName");
    var code = $(this).attr("code");
    var cid = $(this).attr("cid");
    $("input[name=country_name]").val(countryName);
    $("input[name=short_name]").val(shortName);
    $("input[name=codes]").val(code);
    $("input[name=id]").val(cid);
  });

  // insert data 
  $("body").on("click", "#save", function () {
    var countryName = $("input[name=countryName]").val();
    var shortName = $("input[name=shortName]").val();
    var code = $("input[name=code]").val();
    if (countryName != '' && shortName != '' && code!= '') {
      $.ajax({
        type: "post",
        url: $("meta[name='url']").attr("content") + "api/country-insert.php",
        data: {
          countryName: countryName,
          shortName: shortName,
          code: code,
        },
        success: function (data) {
          $(".view_country").load('index.php .view_country');
          $("input[name=countryName]").val('');
          $("input[name=shortName]").val('');
          $("input[name=code]").val('');
          $("#alert-msg").html(
            `
            <div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Success!</strong> Data Insert Successfully.
						</div>
            `
          )
        },
      });
    }else {
      alert("Field is empty");
    }
  });

  // update data 
    $("body").on("click", "#update", function () {
      $('#ar-model').hide();
      var cid = $("input[name=id]").val(); 
      var countryName = $("input[name=country_name]").val();
      var shortName = $("input[name=short_name]").val();
      var code = $("input[name=codes]").val();
      if (cid!= '') {
        $.ajax({
          type: "post",
          url: $("meta[name='url']").attr("content") + "api/country-update.php",
          data: {
            countryName: countryName,
            shortName: shortName,
            code: code,
            cid: cid
          },
          success: function (data) {
            $(".view_country").load('index.php .view_country');
            $("input[name=country_name]").val('');
            $("input[name=short_name]").val('');
            $("input[name=codes]").val('');
            $("#alert-msg").html(
              `
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Data Update Successfully.
              </div>
              `
            )
          },
        });
      }else {
        alert("Field is empty");
      }
    });

  // delete data 
  $("body").on("click", "#delete", function () {
    var cid = $("input[name=id]").val(); 
    if (cid!= '') {
      $('#ar-model').hide();
      $.ajax({
        type: "post",
        url: $("meta[name='url']").attr("content") + "api/country-delete.php",
        data: {
          cid: cid
        },
        success: function (data) {
          $(".view_country").load('index.php .view_country');
          $("input[name=country_name]").val('');
          $("input[name=short_name]").val('');
          $("input[name=codes]").val(''); 
          $("#alert-msg").html(
            `
            <div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Success!</strong> Data Deleted Successfully.
						</div>
            `
          )
        },
      });
    }
  });
});
