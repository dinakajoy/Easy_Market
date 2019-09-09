<!-- FOOTER START -->
  <footer>
    <div class="container">
      <p>Easy Traders' Blog. Copyright &copy; <?php echo date('Y'); ?></p>
    </div>
  </footer>
<!-- FOOTER END -->  

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>  
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/main.js"></script>  
    
<script>
  // When the user scrolls down 20px from the top of the document, show the button and animate scroll effect
  window.onscroll = function() {scrollFunction()};
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("myBtn").style.display = "block";
    } else {
      document.getElementById("myBtn").style.display = "none";
    }
  }
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  function topFunction() {
    $('html, body').animate({scrollTop:0}, 'slow');
  }
</script>

<script>
  function myFunction() {
    var x = "Is the browser online? " + navigator.onLine;
    document.getElementById("demo").innerHTML = x;
  }
</script>