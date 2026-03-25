const projects = [
  {
    name: "Iride Car Booking Company",
    description: "A comprehensive car rental and booking platform featuring a streamlined reservation system and real-time fleet management.",
    url: "https://iride.ng",
    picture: "assets/img/iride.png",
    stacks: ["laravel", "javascript", "php", "tailwind"]
  },
  {
    name: "Good Luck Goods E-commerce",
    description: "A dynamic online marketplace built for speed, featuring a high-performance React frontend and a robust Laravel backend for secure transactions.",
    url: "https://shop.goodlucks.co",
    picture: "https://shop.goodlucks.co/assets/hero-img-Ci7wdoPu.jpg",
    stacks: ["laravel", "react", "php"]
  },
  {
    name: "Diamond Shipping Landing Page",
    description: "A modern, high-conversion landing page for a logistics firm, optimized for mobile responsiveness and fast load times.",
    url: "https://www.diamondshipping.org.ng/",
    picture: "https://www.diamondshipping.org.ng/assets/img/hero.jpeg",
    stacks: ["html", "tailwind css"]
  },
  {
    name: "Moving Forward Oil Company",
    description: "A sleek, professional corporate landing page for an energy enterprise, focusing on clean layout and brand identity.",
    url: "", // Note: Added a placeholder for the URL if available
    picture: "assets/img/movingforward.png",
    stacks: ["html", "react", "tailwind"]
  }
]


const projectGrid = document.querySelector("#project-grid");
const filterBtns = document.querySelectorAll(".filter-btn");


const displayProjects = (projects) => {

  let projectContent = "";
  projects.forEach((project) => {

    const allStacks = project.stacks.map(stack => `
    <span class="px-2 py-1 text-[10px] font-bold tracking-wider uppercase bg-blue-800 text-white rounded">
        ${stack}
    </span>
`).join('');
    projectContent += `
                    <div
          class="group flex flex-col bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:shadow-primary/5 transition-all duration-300"
        >
          <div class="relative aspect-video overflow-hidden">
            <img
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              data-alt="Abstract code line patterns with blue glow"
              src="${project.picture}"
            />
            <div class="absolute top-3 left-3 flex gap-2">
             ${allStacks}
             
            </div>
          </div>
          <div class="p-6 flex flex-col flex-1">
            <h3
              class="text-xl font-bold mb-2 group-hover:text-primary transition-colors"
            >
              ${project.name}
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-1">
              ${project.description}
            </p>
            <div class="flex items-center gap-4 mt-4">
              <a href="${project.url}"
                class="flex-1 px-2 inline-block bg-primary text-white text-xs font-bold py-2.5 rounded-lg hover:bg-primary/90 transition-colors"
              >
                View Case Study
              </a>
              <button
                class="flex items-center justify-center w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-lg hover:text-primary transition-colors"
              >
                <span class="material-symbols-outlined text-lg">code</span>
              </button>
            </div>
          </div>
        </div>
        `;
  });

  projectGrid.innerHTML = projectContent;
}

displayProjects(projects);

// filter projects based on tags

filterBtns.forEach(btn => {
  btn.addEventListener("click", e => {
    const clickedBtn = e.currentTarget;
    const tag = clickedBtn.dataset.tag;

    // 1. Reset all buttons to the "inactive" gray state
    filterBtns.forEach(b => {
      b.classList.remove("bg-primary", "text-white", "font-semibold");
      b.classList.add("bg-slate-200", "dark:bg-slate-800", "font-medium");
    });

    // 2. Set the clicked button to the "active" blue state
    clickedBtn.classList.add("bg-primary", "text-white", "font-semibold");
    clickedBtn.classList.remove("bg-slate-200", "dark:bg-slate-800", "font-medium");

    // 3. Filter Logic
    if (tag === "allProjects") {
      displayProjects(projects);
    } else {
      const filtered = projects.filter(project => {
        // Use optional chaining (?.) and lowerCase to prevent errors
        return project.stacks?.some(stack => stack.toLowerCase() === tag.toLowerCase());
      });
      displayProjects(filtered);
    }
  });
});