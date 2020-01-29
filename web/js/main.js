let content = document.querySelector('main')
getPage('index.php?page=main')
function getPage(url) {
fetch(url)
  .then(response => response.text())
  .then(result => content.innerHTML=result)
}
