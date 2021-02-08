

window.addEventListener('DOMContentLoaded', async (event) => {

  projects = [];
  try {
    let res = await fetch('/assets/data/projects.json')
    projects = await res.json();
  } catch (error) {
    console.log(error);
  }

  let cols = document.querySelectorAll('.works-col[data-source=projects]')

  projects.forEach((project, i) => {

    console.log(project, i);

    var container = document.createElement("div");
    container.innerHTML = `
    <a  href="${project.link}" target="_blank">
      <div class="overlay">
        <span class="label">${project.label}</span>
        <span class="name">${project.name}</span>
      </div>
    </a>
    `




    container.classList.add('works-item');
    container.style.setProperty('--aspect-ratio', '16/9');
    container.style.backgroundImage = 'url(' + project.image + ')';

    cols[i % cols.length].append(container);
  })
});