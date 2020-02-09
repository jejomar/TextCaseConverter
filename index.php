<!DOCTYPE html>
<html lang="en">
<head>
  <title>Case Converter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- custom css -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container MT" > 
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="row">
          <div class="col-md-8">
          <div class="panel-body">
            <form id="case-converter" novalidate="novalidate">
              <div class="form-group">
                <textarea name="content" id="txt-content" class="form-control required " placeholder="Enter Text here..." rows="6"></textarea>
              </div>
              <div id="btn-submit-wraper">
                <button id="all-caps" class="btn btn-primary" data-txt="All Caps">All Caps</button>
                <button id="capital-caps" data-txt="Capital Caps" class="btn btn-success">Capital Caps</button>
                <button id="small-caps" class="btn btn-info" data-txt="Small Caps">Small Caps</button>
                <button id="random-caps" class="btn btn-warning "data-txt="Randon Caps">Random Caps</button>
                <button id="btn-reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3>Result</h3>
              <div id="content-show">
                
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="assets/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    let action='';
    let content='';
    let _this= '';
    $("#btn-reset").click(function(){

       $("#case-converter").trigger('reset');
    });
    $('#all-caps , #small-caps , #random-caps , #capital-caps').on('click' , function(e){
        e.preventDefault();
        _this = $(this);
        action = $(this).data('txt');
        content = $('#txt-content').val();
        $("#case-converter").submit();
    });
    $("#case-converter").validate({
        submitHandler: function (form) { // for demo
          $.ajax({
            type:"POST",
            dataType:'json',
            url: "ajax.php?h=get",
            data:{action:action , content:content},
            cache: false,
            beforeSend:function(){
                $(_this).text("Loading...");
            },
            
            success: function(html){
              
              if (html.Success == 'true') {
                $(_this).text(action);
                $("#content-show").text(html.result);
              }
              action = content = '';
            }
          })
        }
    });
    // reset form 

    

  });
</script>
</html>
