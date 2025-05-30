let menu = document.querySelector(".profilmenu");
        document.querySelector(".profilbox").addEventListener("mouseenter", profilMenuGoster);
        document.querySelector(".profilbox").addEventListener("mouseleave", profilMenuGizle);
        
        function profilMenuGoster() {
           menu.style.visibility = "visible";
        }
        function profilMenuGizle() {
           menu.style.visibility = "hidden";
        };

function cikisYap() {
   Swal.fire({
      title: 'Çıkış Başarılı',
      icon: 'success',
      showConfirmButton: false
   });
   setTimeout(function() {
      window.location.href = '../php/cikis.php'; 
   }, 1500);
}