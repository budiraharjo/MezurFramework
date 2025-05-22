document.addEventListener('DOMContentLoaded', function () {
  console.log('%cWelcome to Mezur Framework 🚀', 'color: orange; font-weight: bold; font-size: 16px');

  const btn = document.querySelector('.btn-primary');
  if (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      alert('Thanks for trying Mezur Framework!');
    });
  }
});
