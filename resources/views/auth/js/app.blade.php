<script type="text/javascript">
  let intViewportHeight = window.innerHeight;
  let appHeight = document.getElementById('app').offsetHeight;


  if(appHeight < 300  && appHeight < intViewportHeight){
    document.getElementById('layout_auth').style.height = "100%";
  } else if (appHeight < intViewportHeight) {
      document.getElementById('layout_auth').style.height = "100vh";
  }else{
    document.getElementById('layout_auth').style.height = "100%";
  }
</script>
