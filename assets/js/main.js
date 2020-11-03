window.addEventListener('DOMContentLoaded', (event) => {
  console.log("DOM entièrement chargé et analysé");

  document.querySelectorAll('a[data-scroll-to]').forEach((el) => {
    console.log(el);
    el.addEventListener('click', (...args) => {
      let target = el.attributes.getNamedItem('data-scroll-to').value;
      document.querySelector(target).scrollIntoView({
        behavior: 'smooth'
      });
    })
  });

  observeEl(document.querySelector('#stats'), (entry) => {
    if (entry.intersectionRatio >= .7) {
      entry.target.querySelectorAll('.number').forEach((el) => {
        if (el.hasAttribute('data-limit')) {
          animateIncrease(el, 0, el.getAttribute('data-limit'), 500)
        }
      })
    } else if (entry.intersectionRatio <= .3) {
      entry.target.querySelectorAll('.number').forEach((el) => {
        if (!el.hasAttribute('data-limit')) {
          el.setAttribute('data-limit', parseInt(el.textContent))
        }
        el.textContent = '0'
      })
    }
  }, [.3, .7]);



  function animateIncrease(target, start, limit, duration) {
    let number = start;
    let speed = duration / (limit - start)
    let interval = setInterval(function () {
      target.textContent = number;
      if (number >= limit) clearInterval(interval);
      number++;
    }, speed);
  }

  function observeEl(target, callback, threshold) {
    var intersectionObserverOptions = {
      root: null,   // default is the viewport
      threshold: threshold // percentage of the taregt visible area which will trigger "onIntersection"
    }

    var observer = new IntersectionObserver(onIntersection, intersectionObserverOptions)

    function onIntersection(entries, observer) {
      entries.forEach(entry => {
        callback(entry, observer)
      })
    }

    // provide the observer with a target
    observer.observe(target)

    // To stop watching, do:
    // observer.unobserve(entry.target)
  }
});