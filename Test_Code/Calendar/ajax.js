window.addEventListener('load',(e) => {
    
    e.preventDefault();
    console.log("Page fully loadee...");
    
});

fetch('https://randomuser.me/api/')
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
    document.getElementById("data").innerHTML = data.results[0].name.first;
  });