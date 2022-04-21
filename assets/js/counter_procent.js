const counter = function(elem, delay, num) {
    for(let currentIndex=0; currentIndex<=num; currentIndex+=100) {
      (function(index) {
        setTimeout(function() {
          elem.textContent = index;
          if(index == num) {
            num++;
            setInterval(function(){
              elem.textContent = num;
              num++;
            }, 3000)
          }
        }, delay*index);
      })(currentIndex);
    }
  }
  const counterNumber = document.getElementById('count_procent')[0];
  counter(counterNumber, 0.08, 190000);