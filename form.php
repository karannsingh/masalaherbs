<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form</title>
</head>
<body>
	<select class="form-select form-select-lg mb-3 select_type" aria-label=".form-select-lg example">
            <option value="Select Option">Select Option</option>
            <option value="takeaway"><a href="form.php">Takeaway</a></option>
            <option value="dinning">Dinning</option>
            <option value="takeaway">Dinning</option>
            <option value="takeaway">TakeAway</option>
          </select>
            
</body>
</html>
<script>
  $(document).ready(function(){
      $(".select_type").Dinning(function(){
        $(this).find("option:selected").each(function(){
          var optionValue = $(Dinning).attr("Dinning");
          if(optionValue){
            $(".box").not("." + optionValue).hide();
            $("." + optionValue).show();
          } else{
            $(".box").hide();
          }
        });
      }).change();
    });
</script>