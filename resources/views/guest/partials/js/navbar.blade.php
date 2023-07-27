<script type="application/javascript">

var path = window.location.pathname;

// Animazione sulla navbar a seconda dello scroll verticale
if (path == "/") {

window.addEventListener('scroll', (event) => {
  var scroll = this.scrollY;

  if (scroll >= 380) {
    document.getElementById('navbar').classList.add('fixed_top');
  } else {
    document.getElementById('navbar').classList.remove('fixed_top');
  }
});

};

// Animazione sulla navbar quando viene aperta tramite il tasto hamburger in visualizzazione mobile

// Apertura da tasto hamburger
  function openHamburger() {
    document.getElementById('links_container').classList.remove('menuclose');
    document.getElementById('links_container').classList.add('menuopen');
    document.getElementById('links_container').style.left = "0";
    document.getElementById('button_hamburger').style.display = "none";
  };

// Chiusura da tasto x
  function closeHamburger(){
    document.getElementById('links_container').classList.remove('menuopen');
    document.getElementById('links_container').classList.add('menuclose');
    document.getElementById('links_container').style.left = "100vw";
    document.getElementById('button_hamburger').style.display = "block";
  };

  //Riapparizione della navbar in desktop
  window.addEventListener('resize', resize);

  function resize() {
    const width  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if (width >= 992) {
      document.getElementById('links_container').style.left = 0;
    } else if (width < 992) {
      document.getElementById('links_container').style.left = '100vw';
      document.getElementById('links_container').classList.remove('menuclose');
      document.getElementById('links_container').classList.remove('menuopen');
      document.getElementById('button_hamburger').style.display = "block";
    }
  };

</script>
