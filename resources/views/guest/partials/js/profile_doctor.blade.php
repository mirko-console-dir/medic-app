<script type="application/javascript">

// Funzione di scrolling con i tasti

var scrollPosition = document.getElementById('services_pagination').scrollTop;

function goUpServices(){
  document.getElementById('services_pagination').scrollTo({
    top: scrollPosition - 200,
    behavior: 'smooth'
  });
}

function goDownServices(){
  document.getElementById('services_pagination').scrollTo({
    top: scrollPosition + 200,
    behavior: 'smooth'
  });
}

//forms appear
function appearMessage(){
  // var scrollY = window.scrollY;

  document.getElementById('form_message').style.display="block";

  document.getElementById('form_message').scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
 }


</script>
