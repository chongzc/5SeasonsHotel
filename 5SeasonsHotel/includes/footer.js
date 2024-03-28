document.getElementById("menu-icon").addEventListener("click", function() {
    document.querySelector(".navigation").classList.toggle("active");
  });
  
  const backToTopButton = document.querySelector('.back-to-top');
  
  if (backToTopButton) {
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }