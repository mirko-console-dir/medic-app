<script type="application/javascript">

// Animazione sulla navbar a seconda dello scroll verticale
window.addEventListener('scroll', (event) => {
  var scroll = this.scrollY;

  if (scroll >= 380) {
    document.getElementById('navbar').classList.add('fixed_top');
  } else {
    document.getElementById('navbar').classList.remove('fixed_top');
  }
})


</script>
